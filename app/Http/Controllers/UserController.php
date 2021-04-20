<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Session;
use App\User;
use App\Profile;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(20);
        return view('admin.users.index')->with('users',$users)
            ->with('page','users')
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create')->with('page','users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'email' => 'required|max:150|email',
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'username' => 'required|max:20',
            'password' => 'required|max:30',
            'about' => 'max:244'
        ]);

        $user = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        $about = "Something About You";
        if($request->filled('about')){
            $about = $request->about;
        }

        if($request->avatar == null){
            $user = User::create($user);

            $profile = Profile::create([
                'full_name' => $request->fname ." ". $request->lname,
                'about' => $about,
                'user_id' => $user->id
            ]);

        }else{
            $avatar = $request->avatar;
            $new_avatar_name = Str::lower(time().$avatar->getClientOriginalName());
            $avatar->move('uploads/avatars',$new_avatar_name);

            $user = User::create($user);
            $profile = Profile::create([
                'avatar' => "uploads/avatars/".$new_avatar_name,
                'full_name' => $request->fname ." ". $request->lname,
                'about' => $about,
                'user_id' => $user->id
            ]);
        }

        Session::flash('success','User Has Created!');
        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.users.edit')->with('page','users')
                ->with('user',$user)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'email' => 'required|max:150|email',
            'fname' => 'required|max:100',
            'lname' => 'required|max:100',
            'username' => 'required|max:40',
            'password' => 'max:30',
            'about' => 'required|max:244',
            'facebook' => 'max:244',
            'twitter' => 'max:244',
            'instagram' => 'max:244',
            'reddit' => 'max:244'
        ]);

        $user = User::find($id);
        $current_avatar = $user->profile->avatar;

        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $new_avatar_name = time().Str::lower($avatar->getClientOriginalName());
            $avatar->move('uploads/avatars',$new_avatar_name);
            $user->profile->avatar = "uploads/avatars/".$new_avatar_name;

            /**
             * Remove Exit Image If Not It Default Image
             *
             */
            if(Str::contains($current_avatar,[env('ADMIN_DEFAULT_AVATAR_PATH'),env('USER_DEFAULT_AVATAR_PATH')]) == false){
                File::delete($current_avatar);
            }
        }

        if($request->filled('password')){
            $user->password = bcrypt($request->password);
        }

        if($request->filled('username')){

        }

        if($request->filled('about')) {
            $user->profile->about = $request->about;
        }

        $user->email = $request->email;
        $user->username = $request->username;
        $user->profile->full_name = $request->fname." ".$request->lname;
        $user->profile->facebook = $request->facebook;
        $user->profile->twitter = $request->twitter;
        $user->profile->instagram = $request->instagram;
        $user->profile->reddit = $request->reddit;
        $user->update();
        $user->profile->update();

        Session::flash('success','User Has Been Updated!');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);

        $current_avatar = $user->profile->avatar;
        if(Str::contains($current_avatar,[env('ADMIN_DEFAULT_AVATAR_PATH'),env('USER_DEFAULT_AVATAR_PATH')]) == false){
            File::delete($current_avatar);
        }

        $user->profile->delete();
        $user->delete();

        Session::flash('success','User Has Been Deleted!');
        return redirect()->route('user.index');
    }

    /**
     * Make User Admin Or Normal User
     * @param int $id
     */
    public function permission(Request $request,$id){
        $user = User::find($id);

        if($request->access == 'admin'){
        $user->admin = 1;

        }elseif($request->access == 'user'){
        $user->admin = 0;
        }

        $user->update();

        Session::flash('success','User Permission Has Updated!');
        return redirect()->route('user.index');

    }

}
