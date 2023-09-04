<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    function downloadFile($filename){
        $file = Storage::path('upload/public/' . $filename);
        return response()->download($file);
    }
}
