<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\FileManager;

class FilemanagerController extends Controller
{
    //
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){

        $files = FileManager::files('public/images/thumb');
        $files_count = count($files);

        /**
         * Pagination Settings
         *
         */
        if(!request()->get('page')){
            $page = 1;
        }else{
            $page = request()->get('page');
        }

        $limit_pre_page = 10;
        $next_page =  $page + 1;
        $offset = ($page - 1) * $limit_pre_page;
        $imgArray = array_slice($files,$offset,$limit_pre_page); // Chunk Of Data For Page

        /**
         * Pagination
         *
         */
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator($imgArray,$files_count,$limit_pre_page);
        $paginator->withPath('filemanager');

        return view('templates.filemanager')->with('images',$paginator);
    }

    /**
     * Store Images That User Uploads
     *
     */
    public function upload(Request $request){

        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ],[
            'image.required' => 'Choose A Image File To Upload',
            'image.max' => 'Maximum File Size Is 5MB',
        ]);

       $upload = FileManager::upload('public/images/',$request->image);

       return redirect()->back();
    }

    /**
     * Delete Images
     *
     */
    public function delete(Request $request){

        $this->validate($request,[
            'img' => 'required|min:1'
        ],[
            'img.required' => 'No Image Has Selected'
        ]);

        FileManager::deleteFiles($request->img);

        return redirect()->back();
    }

    /**
     * Search For Image
     * @param $query String of name
     *
     */
    public function search($query){
        $files = FileManager::search($query,'public/images/thumb');

        if($files != 0){
            echo json_encode($files);
        }else{
            echo json_encode(0);
        }
    }
}
