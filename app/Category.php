<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function articles(){

        return $this->hasMany('App\Article');
    }

    public function getUrlAttribute(){
        return "https://127.0.0.1:8000/api/categories/".$this->id;
    }
}
