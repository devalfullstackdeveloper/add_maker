<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Phpfastcache\Helper\Psr16Adapter;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use AuthenticatesUsers;

class GalleryController extends Controller
{
    
    public function redirectToInstagramProvider()
    {
        
        $appId='203316855620472';
        $redirectUri= urlencode('http://127.0.0.1:8000/index');

        return redirect()->to("https://api.instagram.com/oauth/authourize?app_id={$appId}&redirect_uri={$redirectUri}&scope=user_profile&response_type=code");
    }

    public function instagramProviderCallback(Request $request)
    {
        $code= $request->code;

        $client_id='203316855620472';
        $client_secret='b4a4b95d09d178565ba61c4c3466601d';
        $redirect_uri='http://127.0.0.1:8000/index';

        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, "");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(

            'code'=>$code,
            'client_id'=>$client_id,
            'client_secret'=>$client_secret,
            'redirect_uri'=>$redirect_uri,
            'grant_type'=>'authorization_code'
        ));

        $data=curl_exec($ch);
        $accessToken=json_decode($data)->access_token;
        $userId=json_decode($data)->user_id;

        $chs=curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.instagram.com/oauth/access_token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

        $response=curl_exec($chs);

        //get user info
        $oAuth=json_decode($response);

        //get instagram username
        $username=$oAuth->username;

        $user=['email'=>$username,'token'=>$userId, 'name'=>$username];

        $user=(object) $user;

        $data=User::where('email',$user->email)->first();
        if(is_null($data))
        {
            $users['name']=$user->name;
            $user['email']=$user->email;
            $data=User::create($user);
        }
        Auth::login($data);
        return redirect('auth/insta');


    }
}

