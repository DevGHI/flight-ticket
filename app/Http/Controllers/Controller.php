<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function login(Request $request){
       $email=$request->email;
       $password=$request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user=Auth::user();
            $token = $user->createToken('flight');
            return [
                'status'=>'success',
                'message'=>"Login Successful",
                'data'=>[
                    'user'=>$user,
                    'token'=>'Bearer '.$token->plainTextToken
                ]
            ];
        }
        else{
            return [
                'status'=>'fail',
                'message'=>"Invalid Email or Password",
                'data'=>[]
            ];
        }
    }


    // public function user_list()
    // {
    //     $users = User::orderBy('email')->get();
    //     return view('admin.ticket.user_list')->with([
    //         'users'=>$users
    //     ]);
        
    // }
}
