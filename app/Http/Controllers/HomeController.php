<?php

namespace App\Http\Controllers;

use App\CustomUtilities\SocialConnector;
use App\Http\Requests;
use App\User;
use App\YogaPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    private $socialConnector;

    public function __construct()
    {
        $this->socialConnector = new SocialConnector();
    }

    public function Map()
    {
        $currentPage = 'Map';

        $markerXML = '<markers>';
//         foreach (YogaPoint::all() as $yogaPoint) {//var_dump($yogaPoint->pointImages);
//
// //            $image = !empty($yogaPoint->pointImages[0]) ? $yogaPoint->pointImages[0]->name : "default.svg";
//
//             $image = !empty($yogaPoint->attaches->first()->filename) ? $yogaPoint->attaches->first()->filename : "default.svg";
//
//             $avatar = !empty(User::findOrNew($yogaPoint->user_id)->avatar) ? User::findOrNew($yogaPoint->user_id)->avatar : "/img/SVG/profile_12x13.svg";
//
//             $markerXML .= '<marker description="' . $this->prepareString($yogaPoint->description)
//                 . '" address="' . $this->prepareString($yogaPoint->address)
//                 . '" image="' . $image
//                 . '" date="' . $yogaPoint->created_at->toDateString()
//                 . '" author="' . $this->prepareString(User::findOrNew($yogaPoint->user_id)->name)
//                 . '" authorId="' . $yogaPoint->user_id
//                 . '" serviceId="' . $yogaPoint->id
//                 . '" avatar="' . $avatar
//                 . '" lat="' . $yogaPoint->latitude
//                 . '" lng="' . $yogaPoint->longitude
//                 . '" type="' . $yogaPoint->type
//                 . '" />';
//         }
//
//         $markerXML .= '</markers>';

        $checkInnCount = count(YogaPoint::all()->where('type', 'checkInn'));
        $teaServiceCount = count(YogaPoint::all()->where('type', 'teaService'));
        $couchServiceCount = count(YogaPoint::all()->where('type', 'couchService'));
        $walkServicesCount = count(YogaPoint::all()->where('type', 'walkServices'));

        $Lat = !empty(\Input::get('Lat')) ? \Input::get('Lat') : 50.4501;
        $Lng = !empty(\Input::get('Lng')) ? \Input::get('Lng') : 30.523400000000038;

        return view('Map', compact('currentPage', 'markerXML', 'checkInnCount', 'teaServiceCount', 'couchServiceCount', 'walkServicesCount', 'Lat', 'Lng'));
    }

    private function prepareString($Str)
    {
        $xStr = str_replace('<', '&lt;', $Str);
        $Str = str_replace('>', '&gt;', $Str);
        $Str = str_replace('"', '&quot;', $Str);
        $Str = str_replace("'", '&#39;', $Str);
        $Str = str_replace("&", '&amp;', $Str);
        // убираем перенос строки
        $Str = preg_replace("/(\r\n|\n|\r)/", "", $Str);

        return $Str;
    }

    public function feedback(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required',
        ]);
//        dd($request);
        Mail::raw("От {$request->name}, {$request->email}. Сообщение: {$request->text}", function ($message) {
            $message->to('krproxy@gmail.com')->subject('Новое сообщение с сайта YOGATRAWEL');
        });

        return redirect()->back();
    }

    public function travelNotes()
    {
        $posts = $this->socialConnector->getNews();

        return view('TravelNotes', ['currentPage' => 'TravelNotes', 'posts' => $posts]);
    }

    public function eula()
    {
        return view('eula');
    }

    public function ConfidentialityAgreement()
    {
        return view('ConfidentialityAgreement');
    }

    public function NewOnSite()
    {
        return view('newOnSite', ['currentPage' => 'New']);
    }

    public function getNews() {
            $currentPoints = YogaPoint::orderBy('created_at', 'desc')->get();//->sortByDesc('created_at');
            $currentPoints = $currentPoints->each(function ($point, $key) {
                $author = User::find($point->user_id);
                $authorName = isset($author->name) && !empty($author->name) ? $author->name : "";
                $authorName .= isset($author->surname) && !empty($author->surname) ? " {$author->surname}" : "";
                $point->authorName = $authorName;

                $point->authorAvatar = isset($author->avatar) && !empty($author->avatar) ? $author->avatar : "/img/SVG/profile_12x13.svg";
                $point->images = $point->attaches;
            });

        return response()->json($currentPoints->toArray());
    }

    public function getMarkers()
    {
      $markers = [];
      foreach (YogaPoint::all() as $yogaPoint) {
          $image = !empty($yogaPoint->attaches->first()->filename) ? $yogaPoint->attaches->first()->filename : "default.svg";

          $avatar = !empty(User::findOrNew($yogaPoint->user_id)->avatar) ? User::findOrNew($yogaPoint->user_id)->avatar : "/img/SVG/profile_12x13.svg";

          $marker = [];
          $marker['description'] = $this->prepareString($yogaPoint->description);
          $marker['address'] = $this->prepareString($yogaPoint->address);
          $marker['image'] = $image;
          $marker['date'] = $yogaPoint->created_at->toDateString();
          $marker['author'] = $this->prepareString(User::findOrNew($yogaPoint->user_id)->name);
          $marker['authorId'] = $yogaPoint->user_id;
          $marker['serviceId'] = $yogaPoint->id;
          $marker['avatar'] = $avatar;
          $marker['lat'] = $yogaPoint->latitude;
          $marker['lng'] = $yogaPoint->longitude;
          $marker['type'] = $yogaPoint->type;

          $markers[] = $marker;
      }
      return response()->json($markers);
    }
}
