<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;
use App\Setting;
use App\Category;
use App\IndexCategory;

class SettingController extends Controller
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
        return view('admin.settings.index')->with('page','settings');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,[
            'site_name' => 'required|max:244',
            'description' => 'required|max:244',
            'keywords' => 'required|max:244',
            'email' => 'required|email|max:244',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'facebook' => 'max:244',
            'twitter' => 'max:244',
            'instagram' => 'max:244',
            'reddit' => 'max:244',
        ]);

        $site_name = Setting::where('option','site_name')->first();
        $description = Setting::where('option','description')->first();
        $keywords = Setting::where('option','keywords')->first();
        $email = Setting::where('option','email')->first();
        $logo = Setting::where('option','logo')->first();
        $facebook = Setting::where('option','facebook')->first();
        $twitter = Setting::where('option','twitter')->first();
        $instagram = Setting::where('option','instagram')->first();
        $reddit = Setting::where('option','reddit')->first();
        $guestLike = Setting::where('option','guest_likes')->first();
        $guestComments = Setting::where('option','guest_comments')->first();

        $site_name->value = $request->site_name;
        $description->value = $request->description;
        $keywords->value = $request->keywords;
        $email->value = $request->email;

        $site_name->update();
        $description->update();
        $keywords->update();
        $email->update();

        if($request->hasFile('logo')){
            $current_logo = $logo->value;
            File::delete($current_logo);

            $image = $request->logo;
            $logo_name = $image->getClientOriginalName();
            $image->move('img/',$logo_name);

            $logo->value = "img/".$logo_name;
            $logo->update();
        }

        if($request->facebook != null){
            $facebook->value = $request->facebook;
            $facebook->update();
        }

        if($request->twitter != null){
            $twitter->value = $request->twitter;
            $twitter->update();
        }

        if($request->instagram != null){
            $instagram->value = $request->instagram;
            $instagram->update();
        }

        if($request->reddit != null){
            $reddit->value = $request->reddit;
            $reddit->update();
        }
        /**
         * Guest Users Likes And Comments Enabled Or Disabled
         *
         */

        if($request->guest_likes){
            $guestLike->value = $request->guest_likes;
        }else{
            $guestLike->value = 0;
        }
        $guestLike->update();

        if($request->guest_comments){
            $guestComments->value = $request->guest_comments;
        }else{
            $guestComments->value = 0;
        }
        $guestComments->update();

        Session::flash('success','Settings Has Been Updated!');
        return redirect()->route('settings.index');

    }

    /**
     *
     * Home Page Settings Index Page
     *
     */
    public function homeSettings(){

        return view('admin.settings.homepage')->with('page','settings')
            ->with('subPage','settings-home')
            ->with('categories',Category::all())
            ;
    }


    /**
     * Update Settings Table Post Limit And Category Post Limit On Homepage
     * Update Homepage Display Category List
     */
    public function homeSettingsUpdate(Request $request){

        $this->validate($request,[
            'home_post_limit' => 'required|integer|max:100',
            'post_limit' => 'required|integer|max:100',
            'id' => 'required'
        ]);

        $home_post_limit = Setting::where('option','home_post_limit')->first();
        $post_limit = Setting::where('option','post_limit')->first();

        $home_post_limit->value = $request->home_post_limit;
        $post_limit->value = $request->post_limit;
        $home_post_limit->update();
        $post_limit->update();

        // Set All The In_Home Values To 0
        $indexCategories = IndexCategory::all();
        foreach($indexCategories as $index){
            $index->in_home = 0;
            $index->update();
        }

        $idArray = $request->id;
        foreach($idArray as $id){
            $indexCategory = IndexCategory::find($id);
            $indexCategory->in_home = 1;
            $indexCategory->update();
        }


        Session::flash('success','Settings Has Been Updated');
        return redirect()->route('settings.home');
    }

}
