<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Category;
use App\IndexCategory;
use Session;

class CategoryController extends Controller
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
        $categories = Category::all();

        return view('admin.category.index')->with('page','categories')
            ->with('categories',$categories)
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
        return view('admin.category.create')->with('page','categories')
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
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'name' => 'required|max:244'
        ]);

        if(Category::where('name',$request->name)->count() > 0){
            Session::flash('error','Category Name Already Exit!');
            return redirect()->route('category.index');
        }

        $img = $request->img;
        $new_image_name = $request->name."_category.".$img->getClientOriginalExtension();
        $img->move('img/category',$new_image_name);

        $category = Category::create([
            'img' => 'img/category/'.$new_image_name,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        IndexCategory::create([
            'category_id' => $category->id,
            'in_home' => 0
        ]);

        Session::flash('success','Category Has Created !');
        return redirect()->route('category.index');

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
        $category = Category::find($id);
        return view('admin.category.edit')->with('page','categories')
            ->with('category',$category)
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
            'name' => 'required|max:44'
        ]);

        $category = Category::find($id);
        $slug = Str::slug($request->name);

        if($request->hasFile('image')){
            $current_img = $category->img;
            File::delete($current_img);

            $img = $request->image;
            $new_image_name = $slug."_category.".$img->getClientOriginalExtension();
            $img->move('img/category/',$new_image_name);
            $category->img = "img/category/".$new_image_name;
        }

        $category->name = $request->name;
        $category->slug = $slug;
        $category->update();

        Session::flash('success','Category Has Been Updated!');
        return redirect()->route('category.index');
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
        $category = Category::find($id);

        $category_img = $category->img;
        File::delete($category_img);
        $category->indexCategory->delete();
        $category->delete();

        Session::flash('success','Category Has Been Deleted!');
        return redirect()->route('category.index');
    }

    /**
     * Delete Multiple Categories From Database
     *
     */

    public function action(Request $request){
        if($request->action == 'delete'){
            $categories = $request->select_categories;

            foreach($categories as $category){
                $DBcategory = Category::find($category);
                $DBcategory->indexCategory->delete();
                $DBcategory->delete();
            }

            Session::flash('success','Categories Has Been Deleted!');
            return redirect()->route('category.index');
        }
    }
}
