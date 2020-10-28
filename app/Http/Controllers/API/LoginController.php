<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\User;

class LoginController extends Controller
{
    public function login()
    {

        $email = request('email');
        $password = request('password');

        $validator = Validator::make(
            [
                'email' => $email,
                'password' => $password,
            ],
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if ($validator->passes()) {

            if ($user = Auth::attempt(['email' => $email, 'password' => $password])) {

                $user = Auth::user();
                return response()->json(array(
                    'status' => 'SUCCESS',
                    'message' => 'User Logged In Successfuly!',
                    'data' =>  $user,
                ), $this->successStatus);
            } else {
                return response()->json(['status' => 'Error', 'message' => 'Email or Password incorrect'], 401);
            }
        } else {

            foreach ($validator->errors()->all() as $value) {
                return response()->json(['status' => 'Validation Failed', 'message' => $value]);
            }
        }
    }
    public function register()
    {

        $fullname =  request('fullname');
        $email = request('email');
        $password = request('password');
        
        $validator = Validator::make(
            [

                'fullname' => $fullname,
                'email' => $email,
                'password' => $password
            ],
            [
                'fullname' => 'required',
                'email' => 'required|email',
                'password' => 'required'

            ]
        );

        if ($validator->passes()) {

            $is_exsists = DB::table('users')->where('email' , $email)->first();

            if ($is_exsists == null) {

                $user = User::Create([
                    'fullname' => $fullname,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'api_token' => Str::random(60),
                    
                ]);
                return response()->json(array(
                    'status' => 'SUCCESS',
                    'message' => '',
                    'data' => $user
                ), $this->successStatus);
            }
            else {
                return response()->json(['ERROR' => 'Email Exists', 'message' => 'This Email Address is already taken!']);
            }
            

            
        } else {

            foreach ($validator->errors()->all() as $value) {
                return response()->json(['status' => 'Validation Failed', 'message' => $value]);
            }
        }
    }
}
