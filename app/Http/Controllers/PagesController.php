<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('layouts.master');
    }
    public function contact() {
        return view('layouts.contact');
    }

    public function about() {
        return view('layouts.about');
    }

}
