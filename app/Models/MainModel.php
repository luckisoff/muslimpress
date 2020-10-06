<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainModel extends Model
{
    protected function locale(){
        return app()->getLocale();
    }

    protected function createSlug($string){

        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        
        //$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    
        return strtolower(preg_replace('/-+/', '-', $string)); // Replaces multiple hyphens with single one.
    }

    protected function getStatus($object){
        if(auth()->user()){
            if($object->where('user_id', auth()->user()->id)->first()) return true;
        }
        return false;
    }
}
