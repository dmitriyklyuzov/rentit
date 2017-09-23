<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Property;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $user_id = $user->id;
        $properties = Property::where('user_id', $user_id)->get();
        return view('pages.dashboard')->with(['user' => $user, 'properties' => $properties]);
    }
}
