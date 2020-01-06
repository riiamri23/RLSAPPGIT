<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){

        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/home');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/home');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
