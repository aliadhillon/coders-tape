<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SplFileObject;

class LogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $logs = collect(scandir(storage_path('logs')))->filter(function($log){
            return substr_compare($log, '.log', -4) === 0;
        });
        $log = $logs->isNotEmpty() ? new SplFileObject(storage_path('logs/') . $logs->last()) : null ;
        
        return view('logs', compact('log'));
    }
}
