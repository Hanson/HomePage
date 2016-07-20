<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'folders' => Folder::orderBy('weight', 'DESC')->orderBy('created_at', 'DESC')->get()
        ]);
    }
}
