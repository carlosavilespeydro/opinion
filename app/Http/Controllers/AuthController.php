<?php

namespace opinion\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use opinion\Http\Requests;
use opinion\Http\Controllers\Controller;
use opinion\proposal;
use opinion\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth');
    }
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only(['email', 'password']))) {

            return redirect()->route('auth_show_path')->withErrors('No encontramos al usuario.');

        }

        return redirect()->intended('/');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('home_path');
    }

}
