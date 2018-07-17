<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        $this->middleware('auth');
    }
}
