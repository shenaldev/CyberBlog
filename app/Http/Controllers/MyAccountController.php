<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Auth;
use App\User;
use Session;

class MyAccountController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('templates.my-account')->with('user',Auth::user());
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'full_name' => 'required|string|max:244',
            'about' => 'required|string|max:244',
            'email' => 'email|required|string|max:244',
            'facebook' => 'max:244',
            'twitter' => 'max:244',
            'instagram' => 'max:244',
            'reddit' => 'max:244',
        ]);

        $user = User::find($id);

        if($user->email != $request->email){
            $this->validate($request,[
                'email' => 'unique:users'
            ]);
            $user->email = $request->email;
            $user->update();
        }

        $user->profile->full_name = $request->full_name;
        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->twitter = $request->twitter;
        $user->profile->instagram = $request->instagram;
        $user->profile->reddit = $request->reddit;

        $user->profile->update();

        Session::flash('success','Account Has Been Updated !');
        return redirect()->route('myaccount');

    }

    public function updatePassword(Request $request,$id){

        $this->validate($request,[
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->update();

        Session::flash('success','Password Has Been Updated');
        return redirect()->route('myaccount');
    }

    public function updateAvatar(Request $request,$userID){
        if($request->hasFile('avatar')){
            $img = $request->avatar;
            $img_new_filename = time().$img->getClientOriginalName();

            /**
             * Resize Image
             */
            $imgResize = Image::make($img->getRealPath());
            $imgResize->resize(200,null,function ($constraint){
                $constraint->aspectRatio();
            });
            $imgResize->save(public_path().'/uploads/avatars/'.$img_new_filename);

            /**
             * Update Database
             */
            $user = User::find($userID);
            $user_current_avatar = $user->profile->avatar;

            if($user_current_avatar != env('USER_DEFAULT_AVATAR_PATH') || $user_current_avatar != env('ADMIN_DEFAULT_AVATAR_PATH')){
                $delete = File::delete(public_path().$user_current_avatar);
            }

            $user->profile->avatar = '/uploads/avatars/'.$img_new_filename;
            $user->profile->update();

            Session::flash('success','Avatar Has Been Updated');
            return redirect()->route('myaccount');
        }
    }

}
