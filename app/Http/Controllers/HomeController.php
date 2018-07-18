<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class HomeController extends Controller
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
     * display all transactions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->get();

        return view('home', compact('transactions'));
    }


}
