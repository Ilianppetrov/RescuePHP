<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function getAnimals()
    {
    	$animals = Auth::user()->animals()->get();
    	return view('users.user-animals', compact('animals'));
    }
}
