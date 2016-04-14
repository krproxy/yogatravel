<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\YogaPoint;

class HomeController extends Controller
{
    public function Map()
    {
        $currentPage = 'Map';

        $markerXML = '<markers>';
        foreach (YogaPoint::all() as $yogaPoint) {//var_dump($yogaPoint->pointImages);

//            $image = !empty($yogaPoint->pointImages[0]) ? $yogaPoint->pointImages[0]->name : "default.svg";

            $image = !empty($yogaPoint->attaches->first()->filename) ? $yogaPoint->attaches->first()->filename : "default.svg";

            $avatar = !empty(User::findOrNew($yogaPoint->user_id)->avatar) ? User::findOrNew($yogaPoint->user_id)->avatar : "/img/Avatars/photo_default.svg";

            $markerXML .= '<marker description="' . $this->parseToXML($yogaPoint->description)
                . '" address="' . $this->parseToXML($yogaPoint->address)
                . '" image="' . $image
                . '" date="' . $yogaPoint->created_at->toDateString()
                . '" author="' . $this->parseToXML(User::findOrNew($yogaPoint->user_id)->name)
                . '" authorId="' . $yogaPoint->user_id
                . '" serviceId="' . $yogaPoint->id
                . '" avatar="' . $avatar
                . '" lat="' . $yogaPoint->latitude
                . '" lng="' . $yogaPoint->longitude
                . '" type="' . $yogaPoint->type
                . '" />';
        }

        $markerXML .= '</markers>';

        /**
         *
         */

        $checkInnCount = count(YogaPoint::all()->where('type', 'checkInn'));
        $teaServiceCount = count(YogaPoint::all()->where('type', 'teaService'));
        $couchServiceCount = count(YogaPoint::all()->where('type', 'couchService'));
        $walkServicesCount = count(YogaPoint::all()->where('type', 'walkServices'));

        $Lat = !empty(\Input::get('Lat')) ? \Input::get('Lat') : 50.4501;
        $Lng = !empty(\Input::get('Lng')) ? \Input::get('Lng') : 30.523400000000038;

        return view('Map', compact('currentPage', 'markerXML', 'checkInnCount', 'teaServiceCount', 'couchServiceCount', 'walkServicesCount', 'Lat', 'Lng'));
    }

    private function parseToXML($xmlStr)
    {
        $xmlStr = str_replace('<', '&lt;', $xmlStr);
        $xmlStr = str_replace('>', '&gt;', $xmlStr);
        $xmlStr = str_replace('"', '&quot;', $xmlStr);
        $xmlStr = str_replace("'", '&#39;', $xmlStr);
        $xmlStr = str_replace("&", '&amp;', $xmlStr);
        // убираем перенос строки
        $xmlStr = preg_replace("/(\r\n|\n|\r)/", "", $xmlStr);

        return $xmlStr;
    }

}
