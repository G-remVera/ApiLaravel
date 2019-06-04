<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','slug','content','exerpt','img','category_id','user_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getUrlAttribute(){
        return "https://127.0.0.1:8000/api/articles/".$this->id;
    }

}
