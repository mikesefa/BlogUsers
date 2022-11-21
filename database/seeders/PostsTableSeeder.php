<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate(); //limpiar category

        //lenar db category table con estos datos
        $category = new Category;
        $category->name = "Categoria 1";
        $category->save();

        $category = new Category;
        $category->name = "Categoria 2";
        $category->save();





        Post::truncate();  //limpiar post

        //llenar base de dato table post con estos datos
        $post = new Post;
        $post->title = "mi primer post";
        $post->url = Str::slug("mi primer post");
        $post->excerp = "contenidoo del post";
        $post->body = "cuerpo de post";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "mi segundo post";
        $post->url = Str::slug("mi segundo post");
        $post->excerp = "contenidoo del post segundo prueba de seeders";
        $post->body = "cuerpo de post";
        $post->published_at = Carbon::now()->subDays(6);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "mi tercer post";
        $post->url = Str::slug("mi tercer post");
        $post->excerp = "contenidoo del post tercero prueba de seeders y rollbacks para base de datosZ";
        $post->body = "cuerpo de post";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->user_id = 1;
        $post->save();


        $post = new Post;
        $post->title = "mi cuarto post";
        $post->url = Str::slug("mi cuarto post");
        $post->excerp = "contenidoo del post cuart prueba de seeders y rollbacks para base de datosZ";
        $post->body = "cuerpo de post cuarto";
        $post->published_at = Carbon::now()->subDays(5);
        $post->category_id = 2;
        $post->user_id = 1;
        $post->save();
    }
}
