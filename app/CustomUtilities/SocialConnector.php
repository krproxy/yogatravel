<?php
/**
 * Created by PhpStorm.
 * User: totorro
 * Date: 12.05.16
 * Time: 19:24
 */

namespace App\CustomUtilities;


use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class SocialConnector
{
    private $fb_app_id;
    private $fb_app_secret;
    private $facebook_group_id = 1870804253146606;

    public function __construct()
    {
        $this->fb = app(LaravelFacebookSdk::class);;
        $this->fb_app_id = env('FACEBOOK_APP_ID');
        $this->fb_app_secret = env('FACEBOOK_APP_SECRET');
    }

    public function getNews()
    {
        // получаем токен для приложения
        $token_url = "https://graph.facebook.com/oauth/access_token?" .
            "client_id={$this->fb_app_id}" .
            "&client_secret={$this->fb_app_secret}" .
            "&grant_type=client_credentials";
        $app_token = file_get_contents($token_url);

        $appToken = substr($app_token, 13);

        // формируем запрос на новости из фейсбука
        $request = $this->fb->request(
            'GET',
            '/195088197179469/feed',
            [],
            $appToken
        );

        // отправляем запрос Graph
        try {
            $response = $this->fb->getClient()->sendRequest($request);
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        // получаем наши новости
        $graphNode = $response->getGraphEdge();

        // контейнер для будущих новостей
        $posts = [];

        for ($i = 0; $i < count($graphNode); $i++) {
            /**
             * проверяем message на предмет метатегов
             */
            $tmpMsg = explode("#", $graphNode[$i]->getField('message'));
            $posts[$i]['message'] = $tmpMsg[0];
            if (count($tmpMsg) > 1) {
                for ($z = 1; $z < (count($tmpMsg) - 1); $z++) {
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

//        return view('TravelNotes', ['currentPage' => 'TravelNotes', 'posts' => $posts]);
        return $posts;
    }

    public function postNews($point)
    {
        /**
         * проверяем есть ли фесбук токен в сесии, если есть - значит постим
         */
        if (\Auth::user()->fb_access_token) {
            $linkData = [
                'link' => asset('/service/' . $point->id),
                'message' => $point->description,
            ];

            try {
                // Returns a `Facebook\FacebookResponse` object
                // проверяем может разрешено ли пользователю постить в принципе и хочет ли он постить
                if (\Auth::user()->can_fb_in_wall_posting && \Auth::user()->fb_in_wall_posting_allowed)
                    $this->fb->post('/me/feed', $linkData, \Auth::user()->fb_access_token);
                if (\Auth::user()->can_fb_in_group_posting && \Auth::user()->fb_in_group_posting_allowed)
                    $this->fb->post("/{$this->facebook_group_id}/feed", $linkData, \Auth::user()->fb_access_token);

            } catch (FacebookResponseException $e) {
//                echo 'Graph returned an error: ' . $e->getMessage();
//                exit;
            } catch (FacebookSDKException $e) {
//                echo 'Facebook SDK returned an error: ' . $e->getMessage();
//                exit;
            }
        }
    }

    public function getFbToken()
    {
        // Obtain an access token.
        try {
            $token = $this->fb->getAccessTokenFromRedirect();
        } catch (FacebookSDKException $e) {
            dd($e->getMessage());
        }

        // Access token will be null if the user denied the request
        // or if someone just hit this URL outside of the OAuth flow.
        if (!$token) {
            // Get the redirect helper
            $helper = $this->fb->getRedirectLoginHelper();

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
            $oauth_client = $this->fb->getOAuth2Client();

            // Extend the access token.
            try {
                $token = $oauth_client->getLongLivedAccessToken($token);
            } catch (FacebookSDKException $e) {
                dd($e->getMessage());
            }
        }

        $this->fb->setDefaultAccessToken($token);

        return (string)$token;
    }

}