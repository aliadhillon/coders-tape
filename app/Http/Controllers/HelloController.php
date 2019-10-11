<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        $greeting = 'Hello this is from controler';
        return view('subviews.hello', compact('greeting'));
    }
}
