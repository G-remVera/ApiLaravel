<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function articles(){

        return $this->belongsToMany('App\Article');
    }

    public function getUrlAttribute(){
        return "https://127.0.0.1:8000/api/tags/".$this->id;
    }
}
