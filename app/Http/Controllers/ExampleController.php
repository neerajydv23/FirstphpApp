<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homepage(){
        return '<h1>This is Home Page</h1> <a href="/about">Click here to go to About page </a> ';
    }

    public function aboutPage(){
        return '<h1>This is About Page</h1> <a href="/">Click here to go to Home page </a> ';
    }
}
