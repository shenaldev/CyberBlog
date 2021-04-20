<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
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
        $tags = Tag::paginate(25);

        return view('admin.tags.index')->with('page','tags')
            ->with('tags',$tags)
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
            'name' => 'required|max:244'
        ]);

        if(Tag::where('name',$request->name)->count() > 0){
            Session::flash('error','Tag Name Already Exit!');
            return redirect()->route('tag.index');
        }

        $tag = Tag::create([
            'name' => $request->name
        ]);

        Session::flash('success','Tag Has Been Created!');
        return redirect()->route('tag.index');
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
            'name' => 'required|max:244'
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->update();

        Session::flash('success','Tag Has Been Updated!');
        return redirect()->route('tag.index');
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
        $tag = Tag::find($id);
        $tag->delete();

        Session::flash('success','Tag Has Been Deleted!');
        return redirect()->route('tag.index');
    }

    /**
     * Delete Multiple Tags Funtion
     *
     */
    public function action(Request $request){
        if($request->action == 'delete'){
            $tags = $request->select_tags;

            foreach($tags as $tag){
                $DBtag = Tag::find($tag);
                $DBtag->delete();
            }

            Session::flash('success','Tags Has Been Deleted!');
            return redirect()->route('tag.index');
        }
    }
}
