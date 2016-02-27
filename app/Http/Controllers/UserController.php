<?php

namespace opinion\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use opinion\Http\Requests;
use opinion\Http\Controllers\Controller;
use opinion\proposal;
use opinion\User;
use opinion\Http\Controllers\Auth\AuthController;
class UserController extends Controller
{

    public function create()
    {
        return view('auth.create');
    }

    public function showUser()
    {
        $user=Auth::user();

        $proposals = proposal::where('author_id', '=', $user->id)->get();

        return view('user.profile',['user'=> $user, 'proposals'=>$proposals]);
    }

    public function newUser(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' =>  'required',
            'userName' =>  'required',
        ]);

        if ($validator->fails()) {

            return redirect()
                ->route('auth_new_path')
                ->withErrors($validator)
                ->withInput();
        }else
            {
                User::create([
                    'name' => $request->get('userName'),
                    'email' => $request->get('email'),
                    'password' => bcrypt($request->get('password')),
                ]);
               // return redirect()->intended('/', 'user');
                $userdata = array(
                    'email'      => $request->get('email'),
                    'password'      => bcrypt($request->get('password'))
                );

                if ( auth()->attempt($request->only(['email', 'password']) )){

                    return redirect()->route('home_path');
                }else{

                    return redirect()->route('auth_show_path');

                }
                /*

            return redirect()->route('auth_store_path',$req);*/ //revisar el envio de la variable



        }

    }
}
