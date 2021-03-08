<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function homepage() {
        return view('welcome');
    }

    public function success() {
        return view('success');
    }

    
    public function credits() {
        return view('credits');
    }

}
