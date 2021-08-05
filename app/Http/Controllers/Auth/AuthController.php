<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $check = User::where('email',"=",$request->email)->first();
        if($check == null)
        {
        $data = new User();
         $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect('/login');
        
    }
    else{
        return redirect('/register')->with('msg', 'Email Already Taken');
        }
    }
    public function logout() {
        Auth::logout();
  
        return redirect('login');
      }
    
}
