<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::orderBy('created_at', 'desc')->paginate(9);
        return view('home', compact('animals'));
    }
}
