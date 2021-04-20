<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Category;
use App\User;
use App\Tag;

class DashboardController extends Controller
{
    //

    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $admin = Auth::user();

        $postCount = Post::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $tagCount = Tag::count();

        $dbRowCount = [
            'posts' => $postCount,
            'categories' => $categoryCount,
            'users' => $userCount,
            'tags' => $tagCount
        ];

        return view('admin.dashboard')
            ->with('admin',$admin)
            ->with('page','dashboard')
            ->with('dbRowCount',$dbRowCount);
        ;
    }
}
