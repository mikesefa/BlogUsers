<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $tags = Tag::all();

        if ($post->isPublished() || auth()->check()) {

            return view('admin.post.show', compact('tags', 'post'));
        }
        abort(404);
    }
}
