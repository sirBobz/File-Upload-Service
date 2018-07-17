<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\FileUpload;
use App\Transaction;

class FileUploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



     /**
     * receives validated file upload
     *
     * @return http response
     */
    public function index(FileUpload $request)
    {
        
    }
}
