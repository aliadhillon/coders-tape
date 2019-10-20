<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function customerImage($photo)
    {
        if ($photo) {
            return Storage::disk('uploads')->download($photo);
        }
    }
}
