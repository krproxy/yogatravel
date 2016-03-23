<?php

namespace App\Http\Controllers;

use App\CustomUtilities\ImageResizer;
use App\PointImage;
use App\User;
use App\YogaPoint;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use PhpParser\Comment;

class UserSpaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Settings()
    {
        $myCheckInns = YogaPoint::all()
            ->where('user_id', \Auth::id())
            ->where('type', 'checkInn');

        $myServices = \DB::table('yoga_points')
            ->where('user_id', \Auth::id())
            ->whereIn('type', ['teaService', 'couchService', 'walkServices'])
            ->get();

        return view('userSpace.settings', compact('myCheckInns', 'myServices'));
    }

    public function SettingPost(Request $request)
    {
        $user = User::findOrNew(\Auth::id());
        if (isset($request->name)) $user->name = $request->name;
        if (isset($request->surname)) $user->surname = $request->surname;
        if (isset($request->shortStory)) $user->shortStory = $request->shortStory;
        if (isset($request->email)) $user->email = $request->email;

        //dd($request->file('avatar')->getError());

        if (!empty($request->file('avatar'))) {
            $imageName = \Auth::id() . '.' .
                $request->file('avatar')->getClientOriginalExtension();

            $resizer = new ImageResizer($request->file('avatar'), 1000, 1000);
            $_avatar = $resizer->Resize();

//            Image::make($request->file('avatar'))
//                ->resize(null, 1000, function ($constraint) {
//                    $constraint->aspectRatio();
//                })
//                ->save(base_path() . '/public/img/Avatars/' . $imageName);
            Image::make($_avatar)->save(base_path() . '/public/img/Avatars/' . $imageName);

            $user->avatar = "/img/Avatars/$imageName";
        }

        $user->save();

        //return view('userSpace.settings');
        return redirect('Settings');
    }

    public function NewYogaPoint(Request $request)
    {
//        dd($request);

        $point = new YogaPoint();
        $point->type = $request->type;
//        $point->name = $request->name;
        $point->description = $request->description;
        $point->address = $request->address;

        $tmpLat = $request->checkIn_lat;
        $tmpLng = $request->checkIn_lng;
        $latLangOk = false;

        do {
            /*
             * Проверяем есть ли с такими координатами уже чекин
             */
            $tmpPoint = \DB::table('yoga_points')
                ->where('latitude', $tmpLat)
                ->where('longitude', $tmpLng)
                ->get();
            if (!empty($tmpPoint)) {
                $tmpLat += (rand(-5, 5) / 1000);
                $tmpLng += (rand(-5, 5) / 1000);
            } else $latLangOk = true;
        } while (!$latLangOk);

        $point->latitude = $tmpLat;
        $point->longitude = $tmpLng;


        \Auth::user()->yogaPoints()->save($point);

        $imgNameCounter = 0;

        foreach ($request->file('images') as $image)
            if ($image) {
                $imageName = \Auth::id() . '_' . ++$imgNameCounter . '_' . time() . '.' .
                    $image->getClientOriginalExtension();

//                Image::make($image)
//                    ->resize(null, 1500, function ($constraint) {
//                        $constraint->aspectRatio();
//                    })
//                    ->save(base_path() . '/public/img/PointImages/' . $imageName);

                $resizer = new ImageResizer($image, 3000, 1500);
                $_image = $resizer->Resize();
                Image::make($_image)->save(base_path() . '/public/img/PointImages/' . $imageName);


                $pointImage = new PointImage();
                $pointImage->name = $imageName;
                $pointImage->alt = "";

                $point->pointImages()->save($pointImage);
            }

        return redirect()->action('HomeController@Map', ['Lat' => $request->checkIn_lat, 'Lng' => $request->checkIn_lng]);
    }

    public function editYogaPointPost(Request $request)
    {
        if (isset($request->pointId)) {
            $point = YogaPoint::findOrNew($request->pointId);
            $point->description = $request->description;
//            $point->address = $request->address;
//            $point->latitude = $request->checkIn_lat;
//            $point->longitude = $request->checkIn_lng;

            \Auth::user()->yogaPoints()->save($point);

        }

        return redirect()->action('HomeController@Map', ['Lat' => $point->latitude, 'Lng' => $point->longitude]);
    }

    public function deleteYogaPoint($PointId)
    {

        $point = YogaPoint::findOrNew($PointId);

        if (\Auth::id() === $point->user_id) {
            $point->delete();
        } else {
            return 'нельзя удалять не свои чекины!!!';
        }

        return redirect()->back();
    }

    public function searchYogaPointsPost(Request $request)
    {
//        dd($request);
        $users = \DB::table('users')
            ->where('name', $request->name)
            ->get(['id']);
        $usersId = [];
        foreach ($users as $user) {
            $usersId[] = $user->id;
        }
        $usersNames = '[';
        foreach (\App\User::all(['name']) as $user) {
            $usersNames .= '"' . $user->name . '"' . ',';
        }
        $usersNames .= ']';

        !isset($request->types) ? $types = ['checkInn', 'teaService', 'couchService', 'walkServices'] : $types = $request->types;
        if (!empty($request->address) && !empty($request->name)) {
            $yogaPoints = \DB::table('yoga_points')
                ->where('address', $request->address)
                ->whereIn('user_id', $usersId)
                ->whereIn('type', $types)
                ->get();
        } elseif (!empty($request->address)) {
            $yogaPoints = \DB::table('yoga_points')
                ->where('address', $request->address)
                ->whereIn('type', $types)
                ->get();
        } elseif (!empty($request->name)) {
            $yogaPoints = \DB::table('yoga_points')
                ->whereIn('user_id', $usersId)
                ->whereIn('type', $types)
                ->get();
        } else {
            $yogaPoints = \DB::table('yoga_points')
                ->whereIn('type', $types)
                ->get();
        }

        return view('userSpace.searchYogaPoints', compact('yogaPoints', 'types', 'usersNames'));
    }

    public function addComment(Request $request)
    {
        $comment = new \App\Comment();
        $comment->user_id = Auth::id();
        $comment->yoga_point_id = $request->yoga_point_id;
        $comment->text = $request->comment;

        $comment->save();

        return redirect()->back();
    }
}
