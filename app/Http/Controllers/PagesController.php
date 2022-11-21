<?php

namespace App\Http\Controllers;

use illuminate\Pagination\Paginator;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {

        $posts = Post::paginate(1);

        return view('pages.home', compact('posts'));
    }
    public function about()
    {
        return view('pages.about');
    }
    public function archive()
    {
        return view('pages.archive');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
