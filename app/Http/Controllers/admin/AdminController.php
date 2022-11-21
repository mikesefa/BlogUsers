<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $posts = Post::all();

        return view('admin.dashboard', compact('posts'));
    }
}
