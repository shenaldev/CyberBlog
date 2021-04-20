<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Auth;
use App\Post;
use App\Category;
use App\Tag;


class PostController extends Controller
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
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('admin.posts.index')->with('posts',$posts)
            ->with('page','posts')
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
        return view('admin.posts.create')->with('page','posts')
                ->with('categories',Category::all())
                ->with('tags',Tag::all())
        ;
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
            'title' => 'required|max:244',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required',
            'content' => 'required'
        ]);

        $image = $request->img;
        $new_image_name = time().$image->getClientOriginalName();
        $image->move('uploads/posts/',$new_image_name);

        $post = Post::create([
            'title' => $request->title,
            'img' => "uploads/posts/".$new_image_name,
            'content' => $request->content,
            'category_id' => $request->category,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title)
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
        }

        Session::flash('success','Post Created Successfully!');
        return redirect()->route('post.index');
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
        $post = Post::find($id);

        return view('admin.posts.edit')->with('page','posts')
            ->with('post',$post)
            ->with('categories',Category::all())
            ->with('tags',Tag::all())
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
        //
        $this->validate($request,[
            'title' => 'required|max:244',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required',
            'content' => 'required'
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category;
        $post->slug = Str::slug($request->title);

        if($request->hasFile('img')){
            $img = $request->img;
            $new_img_name = time().$img->getClientOriginalName();
            $img->move('/uploads/posts/',$new_image_name);

            $post->img = '/uploads/posts/'.$new_image_name;
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        $post->update();

        Session::flash('success','Post Has Been Updated');
        return redirect()->route('post.index');
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
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','Post Successfully Trashed !');

        return redirect()->route('post.index');
    }

    public function trash(){
        //
        $trash = Post::onlyTrashed()->paginate(10);
        return view('admin.posts.trash')->with('page','posts')
            ->with('posts',$trash)
        ;
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post Successfully Restored!');

        return redirect()->route('post.trash');
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post Deleted Premenently');

        return redirect()->route('post.trash');
    }

    /**
     * Post Multiple Actions
     * Delete Selected Posts
     * Trash Selected Posts And Restore
     */

    public function action(Request $request){
        // Restore Multiples Trashed Posts
        if($request->action == 'restore'){

            $postIdArray = $request->select_posts;
            foreach($postIdArray as $id){
                $post = Post::withTrashed()->where('id',$id)->first();
                $post->restore();
            }
            Session::flash('success','Posts Successfully Restored!');

            return redirect()->route('post.trash');

        }// Delete Multiple Posts
        elseif($request->action == 'trash'){

            $postIdArray = $request->select_posts;
            foreach($postIdArray as $id){
                $post = Post::find($id);
                $post->delete();
            }
            Session::flash('success','Posts Successfully Deleted!');

            return redirect()->route('post.index');

        }// Premenently delete posts
        elseif($request->action == "delete"){

            $postIdArray = $request->select_posts;
            foreach($postIdArray as $id){
                $post = Post::withTrashed()->where('id',$id)->first();
                $post->forceDelete();
            }
            Session::flash('success','Posts Permanently Deleted!');

            return redirect()->route('post.trash');
        }
    }


}
