<?php

namespace App\Models;


use Carbon\Carbon;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'category_id', 'excerp', 'user_id'];

    protected $dates = ['published_at']; //campo reconocido como fecha carbon

    public function category() //post->category->name
    {
        return $this->belongsTo(Category::class); // el Post actual pertenece a x categoria
    }

    public function tags() //post->category->name
    {
        return $this->belongsToMany(Tag::class); // el TAG actual pertenece a muchos post
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isPublished()
    {
        /* si no es nulo el campo publish y si es menor a la fecha actual */
        return !is_null($this->published_at) && $this->published_at < today();
    }

    /* funcion QuerySCope  */
    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->latest('published_at');
    }

    public function ScopeAllowed($query)
    {
        if (auth()->user()->can('view', $this)) {
            $posts = Post::all(); //si es admin mstramos todos los post
        } else {
            return $query->where('user_id', auth()->id()); //si no es admin solo mostramos sus post
        }
    }
    /* rutas con nombres */
    public function getRouteKeyName()
    {
        /* nombre del campo a retornar post */
        return 'url';
    }
}
