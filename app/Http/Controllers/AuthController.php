<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fileds = $request -> validate([
            "name" => "required|string",
            "email" => "required|string|unique:users,email",
            "password" => "required|string|confirmed",
            "role" => "required|integer",
        ]);

        $user = User::create([
            "name" => $fileds['name'],
            "email" => $fileds['email'],
            "password" => bcrypt($fileds['password']),
            "role" => $fileds['role'],
        ]);
        $token = $user ->createToken($request->userAgent(),[$fileds['role']])->plainTextToken;

        $response =[
            'user' => $user,
            'token' =>$token
        ];
        return response($response,201);
    }

    public function login(Request $request){
        $fileds =$request -> validate([
            "email" => "required|string",
            "password" => "required|string",
        ]);
        //check Email
        $user = User::where('email',$fileds['email'])->first();
        if(!$user || !Hash::check($fileds['password'],$user->password)){
            return response([
                'message' => 'Invalid Login',
            ],401);
        }else{
            $user ->tokens()->delete();
            $token =$user->createToken($request->userAgent(),["$user->role"])->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token,
            ];
            return response($response,200);
        }


    }

    public function logout(Request $request){
        $request -> user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logged Out',
        ],200);
    }
}
