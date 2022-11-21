<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::allowed()->get();

        return view('admin.post.inde', compact('posts'));
    }

    public function create()
    {

        return view('admin.post.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'posts' => auth()->user()->posts,
            'fechaHoy' => Carbon::now(),
        ]);
    }

    public function store(Request $request)
    {
        /* validacion */
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'excerp' => 'required',
        ]);

        /* return $request->all(); */
        $post = new Post;
        $post->title = $request->get('title');
        $post->url = Str::slug($post->title);/* el title se guarda como url */
        $post->body = $request->get('body');
        $post->excerp = $request->get('excerp');
        $post->published_at = Carbon::parse($request->get('published_at'));
        $post->user_id = auth()->id();
        $post->category_id = $request->get('category_id');
        $post->save();

        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu publicación ha sido creada!!');
    }

    public function edit(Post $post)
    {
        $this->authorize('edit', $post); //'view' hace referencia al metodo view de la postpolicy

        return view('admin.post.edit', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'post' => $post,
            'posts' => auth()->user()->posts,
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $this->authorize('update', $post);

        /* validacion */
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        /* return $request->all(); */
        $post->title = $request->get('title');
        $post->url = Str::slug($post->title);/* el title se guarda como url */
        $post->body = $request->get('body');
        $post->excerp = $request->get('excerp');
        $post->published_at = Carbon::parse($request->get('published_at'));
        $post->category_id = $request->get('category_id');
        $post->save();

        $post->tags()->attach($request->get('tags'));

        return back()->with('flash', 'Tu publicación ha sido actualizada!!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->tags->detach();
        $post->delete();

        return redirect()->route('admin.post.index')->with('flash', 'la publicación ha sido eliminada');
    }
}
