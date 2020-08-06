<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['title', 'slug', 'body', 'category_id', 'thumbnail'];
	
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getTakeImageAttribute()
    {
    	return "/storage/" . $this->thumbnail;
    }
}
