<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	protected $fillable = ['title', 'type', 'street', 'apartment', 'city', 'zip', 'bedrooms', 'bathrooms', 'available', 'rented', 'price', 'cover_image', 'description', 'utilities_included'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function photos(){
    	return $this->hasMany('App\Photo');
    }
}