<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use BW\Vkontakte;
use Exception;
use Facebook\Exceptions\FacebookSDKException;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Laravel\Socialite\Facades\Socialite;
use Redirect;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;
use Session;
use Validator;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    private $redirectPath = 'Settings';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'instructor' => 'required|email',
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'eula' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'instructor' => $data['instructor'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'eula' => $data['eula'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param $socialProvider
     * @return Response
     */
    public function redirectToProvider($socialProvider)
    {
        return Socialite::with($socialProvider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($socialProvider)
    {
        try {
            $socialUser = Socialite::driver($socialProvider)->user();
        } catch (Exception $e) {
            return Redirect::to("auth/$socialProvider");
        }
        // если пользователь есть в базе - авторизуем и отправляем на страницу профиля
        if ($authUser = User::where('email', $socialUser->getEmail())->first()) {
            Auth::login($authUser, true);
            return Redirect::to($this->redirectPath);
        // если пользовтеля нет - отправляем на форму регистрации через соц сети
        } else {
            return redirect()->route('auth/registerViaSocial')
              ->with('name', $socialUser->getName())
              ->with('email', $socialUser->getEmail()) 
              ->with('avatar', $socialUser->getAvatar());
        }        
    }

    public function registerViaSocial()
    {
        return view('auth/registerViaSocial', [
                'name' => Session::get('name'),
                'email' => Session::get('email'),
                'avatar' => Session::get('avatar'),

            ]);
    }

    public function registerViaSocialSet(Request $request)
    {
        $this->validate($request, [
            'instructor' => 'required|email',
            'eula' => 'required'
        ]);

        $newUser = User::create([
            'instructor' => $request->instructor,
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'eula' => $request->eula
        ]);

        Auth::login($newUser, true);
        
        return Redirect::to($this->redirectPath);
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $socialUser
     * @return static
     */
    // TODO: Тестируем новый способ социальной авторизации
    private function findOrCreateUser($socialUser)
    {
        // if ($authUser = User::where('social_id', $socialUser->getId())->first()) {
        //     return $authUser;
        // }
        if ($authUser = User::where('email', $socialUser->getEmail())->first()) {
            return $authUser;
        }
        dd("Пожалуйста пройдите регистрацию на сайте - " . url('/auth/register'));

        // return User::create([
        //     'name' => $socialUser->getName(),
        //     'email' => $socialUser->getEmail(),
        //     'social_id' => $socialUser->getId(),
        //     'avatar' => $socialUser->getAvatar()
        // ]);
    }

    public function fbLoginPost(LaravelFacebookSdk $fb)
    {
        // Obtain an access token.
        try {
            $token = $fb->getAccessTokenFromRedirect();
        } catch (FacebookSDKException $e) {
            dd($e->getMessage());
        }

        // Access token will be null if the user denied the request
        // or if someone just hit this URL outside of the OAuth flow.
        if (!$token) {
            // Get the redirect helper
            $helper = $fb->getRedirectLoginHelper();

            if (!$helper->getError()) {
                abort(403, 'Unauthorized action.');
            }

            // User denied the request
            dd(
                $helper->getError(),
                $helper->getErrorCode(),
                $helper->getErrorReason(),
                $helper->getErrorDescription()
            );
        }

        if (!$token->isLongLived()) {
            // OAuth 2.0 client handler
            $oauth_client = $fb->getOAuth2Client();

            // Extend the access token.
            try {
                $token = $oauth_client->getLongLivedAccessToken($token);
            } catch (FacebookSDKException $e) {
                dd($e->getMessage());
            }
        }

        $fb->setDefaultAccessToken($token);

        // Save for later
        Session::put('fb_user_access_token', (string)$token);

        // Get basic info on the user from Facebook.
        try {
            $response = $fb->get('/me?fields=id,name,email');
        } catch (FacebookSDKException $e) {
            dd($e->getMessage());
        }

        // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
        $facebook_user = $response->getGraphUser();

        // Create the user if it does not exist or update the existing entry.
        // This will only work if you've added the SyncableGraphNodeTrait to your User model.
        $user = User::createOrUpdateGraphNode($facebook_user);

        // Log the user into Laravel
        Auth::login($user);


        return redirect('/')->with('message', 'Successfully logged in with Facebook');
    }

    public function vkLoginPost(Vkontakte $vk)
    {
        $vk->authenticate();

        $userId = $vk->getUserId();
        $userEmail = $vk->getUserEmail();

        $user = $vk->api('users.get', [
            'user_id' => $userId,
            'fields' => [
                'photo_max',
                'city',
                'sex',
            ],
        ]);
        $user[0]['email'] = $userEmail;

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser);

        return Redirect::to('home');
    }
}
