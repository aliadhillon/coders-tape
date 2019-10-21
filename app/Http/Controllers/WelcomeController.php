<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {
        $file = Storage::disk('uploads')->url('sample.txt');
        dd($file);
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }
}
