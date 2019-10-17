<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }
}
