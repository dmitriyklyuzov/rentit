<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request){
    	$session = $request->session()->all();
    	$success = 'Success message';
    	$error = 'Error message';
		return view('test.index')->with(['session' => $session, 'success' => $success, 'error' => $error]);
    }
}
