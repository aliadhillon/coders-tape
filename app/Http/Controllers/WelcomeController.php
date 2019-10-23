<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Alert;

class WelcomeController extends Controller
{
    public function index()
    {
        Alert::toast('This is toast alert', 'success');

        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }
}
