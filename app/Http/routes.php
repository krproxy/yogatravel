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


Route::get('/', function () {
    return view('welcome');
});

Route::get('home', 'UserSpaceController@Settings');

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

Route::get('TravelNotes', 'HomeController@travelNotes');

Route::get('Settings', 'UserSpaceController@Settings');
Route::post('SettingPost', 'UserSpaceController@SettingPost');

Route::get('NewCheckInn', 'UserSpaceController@newCheckInn');
Route::get('AllCheckInns', 'UserSpaceController@AllCheckInns');

Route::get('NewServicePoint', 'UserSpaceController@newServicePoint');
Route::get('AllServicePoints', 'UserSpaceController@AllServicePoints');

Route::post('NewYogaPoint', 'UserSpaceController@NewYogaPoint');

Route::get('editYogaPoint/{PointId}', function ($PointId) {
    return view('userSpace.editYogaPoint')->with('YogaPoint', YogaPoint::findOrNew($PointId));
});
Route::post('editYogaPointPost', 'UserSpaceController@editYogaPointPost');
Route::get('deleteYogaPoint/{PointId}', 'UserSpaceController@deleteYogaPoint');

Route::get('searchYogaPoints/{type?}', function ($type = 'services') {
    if (isset($type) && $type === "services") {
        $types = ['teaService', 'couchService', 'walkServices'];
    }

    return view('userSpace.searchYogaPoints', compact('type', 'types'));
});
Route::post('searchYogaPointsPost', 'UserSpaceController@searchYogaPointsPost');

Route::get('profile/{id}', 'UserSpaceController@profile');

Route::get('service/{id}', function ($id) {
    return view('service', ['service' => \App\YogaPoint::findOrNew($id)]);
});

Route::post('addComment', 'UserSpaceController@addComment');

Route::get('auth/social/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/social/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Endpoint that is redirected to after an authentication attempt
//Route::get('/facebook/callback', 'Auth\AuthController@fbLoginPost');
//Route::get('/vk/callback', 'Auth\AuthController@vkLoginPost');
Route::get('fbAccountBind', 'UserSpaceController@fbAccountBind');
Route::get('fbAccountUnbind', 'UserSpaceController@fbAccountUnbind');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
// via social networks
Route::get('auth/registerViaSocial', ['as' => 'auth/registerViaSocial', 'uses' => 'Auth\AuthController@registerViaSocial']);
Route::post('auth/registerViaSocialSet', 'Auth\AuthController@registerViaSocialSet');

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

Route::post('feedback', 'HomeController@feedback');

Route::get('eula', 'HomeController@eula');
Route::get('ConfidentialityAgreement', 'HomeController@ConfidentialityAgreement');

Route::get('New', 'HomeController@NewOnSite');

Route::get('getNews', 'HomeController@getNews');