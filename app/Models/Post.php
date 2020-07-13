<?php

namespace App\Models;

use App\Models\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['cat_id','user_id','comment_id','title','description','photo'];

    public function category(){
        return $this->belongsTo(Category::Class,'cat_id');
    }

    public function user(){
        return $this->belongsTo(User::Class,'user_id');
    }
}
