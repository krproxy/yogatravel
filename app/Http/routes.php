<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\YogaPoint;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;


Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
});

Route::get('YogaFriends', function () {
    return view('YogaFriends', [
        'currentPage' => 'YogaFriends',
        'teaServiceCount' => count(YogaPoint::all()->where('type', 'teaService')),
        'couchServiceCount' => count(YogaPoint::all()->where('type', 'couchService')),
        'walkServicesCount' => count(YogaPoint::all()->where('type', 'walkServices'))
    ]);
});

Route::get('StickerYogaTravel', function () {
    return view('StickerYogaTravel', ['currentPage' => 'StickerYogaTravel', 'stickers' => YogaPoint::all()->where('type', 'checkInn')]);
});

//Route::get('Map/{Lat?}/{Lng?}', 'HomeController@Map');
Route::get('Map', 'HomeController@Map');

Route::get('TravelNotes', function (BW\Vkontakte $vk, LaravelFacebookSdk $fb) {

    /**
     * тут тащим с фейсбука
     */
    $user = $vk->api('wall.get', [
        'owner_id' => '-19844587',
    ]);

//    dd($user);

    $APPLICATION_ID = "1608911852682283";
    $APPLICATION_SECRET = "7edcaed1519a79e0756bb69552bade16";

    $token_url = "https://graph.facebook.com/oauth/access_token?" .
        "client_id=" . $APPLICATION_ID .
        "&client_secret=" . $APPLICATION_SECRET .
        "&grant_type=client_credentials";
    $app_token = file_get_contents($token_url);

    $appToken = substr($app_token, 13);


    /* PHP SDK v5.0.0 */
    /* make the API call */
    $request = $fb->request(
        'GET',
        '/195088197179469/feed',
        [],
        $appToken
    );
// Send the request to Graph
    try {
        $response = $fb->getClient()->sendRequest($request);
    } catch (FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    $graphNode = $response->getGraphEdge();

//    dd($graphNode);

    $posts = [];

    for ($i = 0; $i < count($graphNode); $i++) {
        /**
         * проверяем message на предмет метатегов
         */
        $tmpMsg = explode("#", $graphNode[$i]->getField('message'));
        $posts[$i]['message'] = $tmpMsg[0];
        if (count($tmpMsg) > 1) {
            for ($z = 1; $z < (count($tmpMsg) - 1); $z++) {
                // присваивает <body text='black'>
                $tag = str_replace(",", "", $tmpMsg[$z]);
                $posts[$i]['tags'][] = $tag;
            }
        }

//        /**
//         * Вытягиваем атачи если есть
//         */
//        /* handle the result */
//        /* PHP SDK v5.0.0 */
//        /* make the API call */
//        $requestAttach = $fb->request(
//            'GET',
//            '/' . $graphNode[$i]->getField('id') . '/attachments',
//            [],
//            $appToken
//        );
//// Send the request to Graph
//        try {
//            $responseAttach = $fb->getClient()->sendRequest($requestAttach);
//        } catch (FacebookResponseException $e) {
//            // When Graph returns an error
//            echo 'Graph returned an error: ' . $e->getMessage();
//            exit;
//        } catch (FacebookSDKException $e) {
//            // When validation fails or other local issues
//            echo 'Facebook SDK returned an error: ' . $e->getMessage();
//            exit;
//        }
//
//        $graphNodeAttach = $responseAttach->getGraphEdge();
//
//        $posts[$i]['attachments'] = $graphNodeAttach;


        $posts[$i]['created_time'] = $graphNode[$i]->getField('created_time');
        $tmpId = explode("_", $graphNode[$i]->getField('id'));
        $posts[$i]['id'] = $tmpId[1];
    }

    foreach ($graphNode as $node) {
//        $posts[] = $node->getField('message');


    }

//    dd($posts);


    return view('TravelNotes', ['currentPage' => 'TravelNotes', 'posts' => $posts]);
});

Route::get('Settings', 'UserSpaceController@Settings');
Route::post('SettingPost', 'UserSpaceController@SettingPost');

Route::get('NewCheckInn', function () {
    return view('userSpace.newCheckInn');
});
Route::get('AllCheckInns', function () {
    $allCheckInns = \DB::table('yoga_points')
        ->where('user_id', \Auth::id())
        ->where('type', 'checkInn')
        ->get();
    return view('userSpace.allCheckInns', compact('allCheckInns'));
});

Route::get('NewServicePoint', function () {
    return view('userSpace.newServicePoint');
});
Route::get('AllServicePoints', function () {
    $myServices = \DB::table('yoga_points')
        ->where('user_id', \Auth::id())
        ->whereIn('type', ['teaService', 'couchService', 'walkServices'])
        ->get();
    return view('userSpace.allServicePoints', compact('myServices'));
});

Route::post('NewYogaPoint', 'UserSpaceController@NewYogaPoint');

Route::get('editYogaPoint/{PointId}', function ($PointId) {
    return view('userSpace.editYogaPoint')->with('YogaPoint', YogaPoint::findOrNew($PointId));
});
Route::post('editYogaPointPost', 'UserSpaceController@editYogaPointPost');
Route::get('deleteYogaPoint/{PointId}', 'UserSpaceController@deleteYogaPoint');

Route::get('searchYogaPoints/{type?}', function ($type = null) {
    if (isset($type) && $type === "checkInn") {
        $types = ['checkInn'];
    } elseif (isset($type) && $type === "services") {
        $types = ['teaService', 'couchService', 'walkServices'];
    } else {
        $types = [];
    }
    $usersNames = '[';
    foreach (\App\User::all(['name']) as $user) {
        $usersNames .= '"' . $user->name . '"' . ',';
    }
    $usersNames .= ']';

    return view('userSpace.searchYogaPoints', compact('types', 'usersNames'));
});
Route::post('searchYogaPointsPost', 'UserSpaceController@searchYogaPointsPost');

Route::get('profile/{id}', function ($id) {
    return view('profile', ['user' => \App\User::findOrNew($id)]);
});

Route::get('service/{id}', function ($id) {
    return view('service', ['service' => \App\YogaPoint::findOrNew($id)]);
});

Route::post('addComment', 'UserSpaceController@addComment');

Route::get('auth/social/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/social/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Endpoint that is redirected to after an authentication attempt
Route::get('/facebook/callback', 'Auth\AuthController@fbLoginPost');
Route::get('/vk/callback', 'Auth\AuthController@vkLoginPost');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create/{userId}', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

Route::post('happy', function () {
    if (Request::ajax()) { // Becuase you are uploading with ajax / dropzone
        $file = Input::file('file');

        $filePath = '/uploads/' . Auth::id();
        $destinationPath = public_path($filePath);

        $filename = $file->getClientOriginalName();
        $upload_success = Input::file('file')->move($destinationPath, $filename);
        if ($upload_success) {
//            return Response::json('success', 200);
            $value = $filePath . '/' . $filename;

            return [
                'url' => asset($value),
                'value' => $value,
                'fileName' => $value,
            ];
        } else {
            return Response::json('error', 400);

        }
    }
});

//Route::get('attaches/{date}/{filename}', function ($date,$filename) {
//    return Storage::get('attaches/'.$date.'/'.$filename);
//});

Route::get('attaches/{dateImg}/{filename}/{width}/{height}/{type?}/{anchor?}', 'ImageController@whResize');
Route::get('attaches/{dateImg}/{filename}/', 'ImageController@fullImage');

Route::post('feedback','HomeController@feedback');