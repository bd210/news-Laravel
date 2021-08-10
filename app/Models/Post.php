<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $table = "posts";
    protected $fillable = ['title', 'content', 'author_id' , 'category_id'];



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->author_id = auth()->user()->id;

        });


    }



    public static $searchable = [
        'title',
        'content'
    ];




    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function files()
    {
        return $this->belongsToMany(File::class, 'post_files', 'post_id', 'file_id');
    }



    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }



    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }



    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }



    public function approved()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }



    public function edited()
    {
        return $this->belongsTo(User::class, 'edited_by', 'id');
    }


    public function visits()
    {
        return $this->hasMany(Visit::class, 'post_id', 'id');
    }


    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_likes', 'post_id', 'user_id');
    }



}
