<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = array('property_id', 'description', 'photo', 'title', 'size');

    public function album(){
    	return $this->belongsTo('App\Property');
    }
}