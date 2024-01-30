<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            // 'email' => 'required|email:dns',
            'email' => 'required|',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email harus diisi',
        ]);
        // $credentials =  $request->only('email','password');
            // Jika login berhasil
            if (Auth::attempt($credentials)){
                // Lakukan pengecekan level
                $user = Auth::user();
                if($user->level == 'admin'){
                    $request->session()->regenerate(); //pake regenerate session supaya terhindar serangan yang memanfaatkan session, taso lupa apa dpe nama serangan
                    return redirect()->intended('admin');
                }
                elseif($user->level == 'super_admin'){
                    $request->session()->regenerate(); //pake regenerate session supaya terhindar serangan yang memanfaatkan session, taso lupa apa dpe nama serangan
                    return redirect()->intended('admin');
                }


                // Jika tidak semua maka akan dikembalikan ke halaman route
                toast('Login Gagal','error');
                return redirect()->intended('login');
        } else
        // Jika tidak login maka kembalikan ke halaman login
        toast('Login Gagal','error');
        return back()->with('gagal', 'Login Gagal');
    }

    public function logout(Request $request){
        Auth::logout($request);
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        $request->session()->flash('berhasil', 'Anda Berhasil Keluar');
        toast('Anda berhasil keluar','success');
        return redirect()->route('login');
    
    }

    public function register(){
        return view('auth.register');
    }

    public function register_store(Request $request){
        // dd($request);
        $validator = Validator::make ($request->all(),[
            'level' => 'required|in:admin',
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
        ],
        [
            'fullname.required' => 'Nama harus diisi',
            'fullname.max' => 'Nama maksimal 255 karakter',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 255 karakter',
            'password.required' => 'Password harus diisi',
            'level.required' => 'Level Admin harus diisi',
            'level.in' => 'Level Admin harus diisi',
        ]);


        // Kalo error kase alert error
             if($validator->fails()){
                return back()->with('toast_error', $validator->errors()->all()[0])->withInput()->withErrors($validator);
             }
      
        // Validasi
        $validatedData = $validator->validate();

      
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData );

 

        // $request->session()->flash('success','Registrasi berhasil');
        return redirect()->back()->withSuccess('Registrasi berhasil');
    }
    
}
