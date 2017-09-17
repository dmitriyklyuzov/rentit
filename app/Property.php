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
        $address = $this->street . ", " . $this->apartment . ", " . $this->city . ", " . $this->state . ", " . $this->zip;
        return $address;
    }

    public function getGoogleMapsAddress(){
    	// 1405 71st St, Brooklyn, 11228
    	$address = $this->street . ", " . $this->city . ", " . $this->state . ", " . $this->zip;
        // return "1405%2071st%20St,%20Brooklyn,%20NY,%2011228";
    	return str_replace(" ", "%20", $address);
    	// 1405%2071st%20St,%20Brooklyn,%20NY,%2011228
    }
}