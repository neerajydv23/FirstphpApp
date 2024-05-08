<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function homepage(){
        $catName = 'Kikee';
        $hobbies = ['Reading', 'Coding', 'Travelling'];
        return view('homepage',['catName' => $catName,'hobbies'=>$hobbies  ]);
    }

    public function aboutPage(){
        return '<h1>This is About Page</h1> <a href="/">Click here to go to Home page </a> ';
    }
}
