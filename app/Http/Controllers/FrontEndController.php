<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\IndexCategory;
use App\Tag;
use App\Setting;
use Auth;
use App\User;

class FrontEndController extends Controller
{
    //
    public function index(){

        $trendingPosts = Post::take(3)->orderBy('id','desc')->get();
        $home_post_limit = Setting::where('option','home_post_limit')->first();
        $home_categories = IndexCategory::where('in_home',1)->get(); // Homepage Categories ID's
        $posts = array();   // Posts Lits
        $categories = array(); // Category List

        foreach($home_categories as $home_category){
            $category = Category::where('id',$home_category->category_id)->first(); // Get One Category That Shoud Be On Homepage
            array_push($categories,$category);

            $post = $category->posts()->take($home_post_limit->value)->orderBy('created_at','desc')->get(); // Get Limited Posts From That Category
            array_push($posts,$post);
        }

        return view('index')->with('trending',$trendingPosts)
                ->with('categories',$categories)
                ->with('posts',$posts)
            ;

    }

   /**
    * Display Single Blog Post
    *
    */
    public function post($slug){
        $post = Post::where('slug',$slug)->first();

        return view('templates.single-post')->with('post',$post);
    }


    /**
     * Display Limited Posts Belongs To One Category
     *
     */
    public function categoryAllPosts($category){
        $category = Category::where('slug',$category)->first();
        $post_limit = Setting::where('option','post_limit')->first();

        $posts = Post::where('category_id',$category->id)->orderBy('created_at','desc')->paginate($post_limit->value);

        return view('templates.category-posts')->with('posts',$posts)
                ->with('category',$category);
    }

    /**
     * View Loged User His Profile And Edit
     */
    public function myaccount(){
        return view('templates.my-account')->with('user',Auth::user());
    }

    /**
     * Display Authors Details And Some Posts
     */
    public function author($author){
        $post_limit = Setting::where('option','post_limit')->first();
        $author = User::where('username',$author)->first();
        $posts = Post::where('user_id',$author->id)->orderBy('created_at','desc')->paginate($post_limit->value);

        return view('templates.author')->with('posts',$posts)
                ->with('user',$author)
        ;
    }

    /**
     * Search Function
     */
    public function search(){
        $keyword = request()->get('query');
        $post_limit = Setting::where('option','post_limit')->first();
        $posts = Post::where('title','LIKE','%'.$keyword.'%')->orderBy('created_at','desc')->paginate($post_limit->value);

        return view('templates.search')->with('posts',$posts);
    }

    /**
     * Post For Tag Name
     */
    public function postsForTag($tag){
        $post_limit = Setting::where('option','post_limit')->first();
        $tag = Tag::where('name',$tag)->first();
        $posts = $tag->posts()->orderBy('created_at','desc')->paginate($post_limit->value);

        return view('templates.tag-posts')->with('posts',$posts)
                ->with('tag',$tag)
        ;
    }

    /**
     * Show All Categories
     */
    public function categories(){
        $categories = Category::all();

        return view('templates.categories')->with('categories',$categories);
    }
}
