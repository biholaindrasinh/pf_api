<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class RegisterationController extends Controller
{
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
         $user = User::create(array(
        'name'     => 'Chris Sevilleja',
        'email'    => request('email'),
        'password' => bcrypt(request('password')),
    ));
        return response()->json($user);
    }

    public function login()
    {
    	 $userdata = array(
          'email' => request('email'),
          'password' => request('password')
        );
        if (Auth::attempt($userdata))
      	{
      		return response()->json($userdata);
      	}
      	else
      	{
     		return response()->json(['success' => 'not']);
      	}

    }
}
