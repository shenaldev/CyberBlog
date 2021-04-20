<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\SocialAuth;
use Socialite;
use File;
use Auth;
use Session;

class SocialAuthController extends Controller
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $id = $user->getId();
        $email = $user->getEmail();
        $fullName = $user->getName();
        $firstName = explode(' ',$fullName)[0];
        $avatar = $user->getAvatar();
        $token = $user->token;

        $dbUser = User::where('email',$email)->first();

        /**
         * If User Not Registered Create New Account
         */
        if($dbUser == null){

            //Save Avatar
            $fileContent = file_get_contents($avatar);
            File::put(public_path().'/uploads/avatars/'.$id.'.jpg', $fileContent);
            $avatarUrl = '/uploads/avatars/'.$id.'.jpg';

            //Create New User
            $newUser = User::create([
                'name' => $firstName,
                'email' => $email,
                'password' => bcrypt($firstName),
                'admin' => 0
            ]);

            $profile = Profile::create([
                'avatar' => $avatarUrl,
                'full_name' => $fullName,
                'about' => 'Something About You',
                'user_id' => $newUser->id
            ]);

            $socialAuth = SocialAuth::create([
                'user_id' => $newUser->id,
                'provider_user_id' => $id,
                'provider' => $provider,
                'access_token' => $token
            ]);

            Auth::login($newUser,true);
            Session::flash('success','You Are Successfully Loged In');
            return redirect()->route('index');

        }
        /**
         * If User Registered And SocialProviderID If Equals To DBS ID User Will Be Loged In
         *
         */
        elseif($dbUser != null && $dbUser->email == $email && $dbUser->socialAuth->provider_user_id == $id){

            $authUser = User::where('email',$email)->first();

            Auth::login($authUser,true);
            Session::flash('success','You Are Successfully Loged In');
            return redirect()->route('index');

        }
        /**
         * If User Already Registed Using Normal Email Need To Login Using Email And Password
         *
         */
        elseif($dbUser != null && $dbUser->email == $email && $dbUser->socialAuth == null){

            return redirect()->view('login')->with('error','Please Login Using Your Email And Password');

        }
    }
}
