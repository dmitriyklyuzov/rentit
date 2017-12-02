<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	protected $fillable = ['title', 'type', 'street', 'apartment', 'city', 'state', 'zip', 'bedrooms', 'bathrooms', 'available', 'rented', 'price', 'cover_image', 'description', 'utilities_included'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function photos(){
    	return $this->hasMany('App\Photo');
    }

    public function getFullAddress(){
        if($this->apartment == '' || is_null($this->apartment) || empty($this->apartment)){
            $apartment = '';
        }
        else $apartment = $this->apartment . ", ";

        $address = $this->street . ", " . $apartment .  $this->city . ", " . $this->state . ", " . $this->zip;
        return $address;
    }

    public function getGoogleMapsAddress(){
        return str_replace(" ", "%20", $this->getFullAddress());
        // 1405%2071st%20St,%20Brooklyn,%20NY,%2011228
    }

    public function getCoverImage(){
        return $this->cover_image;
    }
}