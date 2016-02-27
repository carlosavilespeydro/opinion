<?php

namespace opinion\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use opinion\Http\Requests;
use opinion\Http\Controllers\Controller;
use opinion\proposal;

class HomeController extends Controller
{
    public function index()
    {

        //dd(Auth::user()->name);
        $proposals= proposal::with('author')->get();

        return view('home', ['proposals' => $proposals]);
    }
}
