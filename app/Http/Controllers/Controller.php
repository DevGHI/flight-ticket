<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    function register(Request $request){
        $name=$request->name;
        $email=$request->email;
        $password=$request->password;
        $confirm_password=$request->confirm_password;

        $user=User::where('email',$email)->count();
       
        if($password!=$confirm_password){
            return [
                'status'=>'fail',
                'message'=>"Confirm Password Does not match",
                'data'=>[]
            ];
        }
        else if($user>0){
            return [
                'status'=>'fail',
                'message'=>"Email Already Exist!",
                'data'=>[]
            ];
        }
        else{
            User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password),
                'user_type'=>'user'
            ]);
            return [
                'status'=>'success',
                'message'=>"Registration Success",
                'data'=>[]
            ];
        }
    }


    public function logout()
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    // public function user_list()
    // {
    //     $users = User::orderBy('email')->get();
    //     return view('admin.ticket.user_list')->with([
    //         'users'=>$users
    //     ]);
        
    // }
}
