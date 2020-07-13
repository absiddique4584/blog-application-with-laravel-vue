<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['cat_name'];


   // public function posts(){
   //     return $this->hasMany(Post::Class);
   // }
}
