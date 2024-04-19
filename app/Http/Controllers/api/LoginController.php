<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $messages = [
            'email.required'=> 'Email can`t be empty',
            'email.regex'=> 'Email Address is not valid',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be atleast 8 charcter long',   
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]{4,}\.[a-z]{2,}$/',
            'password' => 'min:8|required',
        ],$messages)->validate();
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            // successfull authentication
            $user = User::find(Auth::user()->id);
            $token = $user->createToken(env('APP_NAME', 'access_token'))->accessToken;
            // dd($token);
            return response()->json(
                [
                    'Token' => $token,
                    'status'=> 200,
                    'message' => "Login Successful",
                    'user' => $user,
                ]
            );
        }
        else
        {
            return response()->json(
                [
                    'message' => "No User Found",
                    'status'=> 201
                ]
            );
        }
    }

    public function register(StoreUserRequest $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if($user->save())
        {
            return response()->json(
                [
                    'user' => $user,
                    'success' => true,
                    'message' => "User Created Successfully",
                    'status'=> 200
                ]
            );
        }
        else
        {
            return response()->json(
                [
                    'error' => $request,
                    'success' => false,
                    'message' => "User Not Created",
                    'status'=> 201
                ]
            );
        }
    }
}
