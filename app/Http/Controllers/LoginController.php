<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('template.auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        // Debug logging
        \Log::info('Login attempt', [
            'email' => $credentials['email'],
            'password_length' => strlen($credentials['password'])
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            \Log::info('Login successful', [
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->is_role
            ]);
            
            if ($user->is_role == "Admin") {
                return redirect()->intended('admin/dashboard')->with('message_success', 'Berhasil Login');
            }
            if ($user->is_role == "Konselor") {
                return redirect()->intended('konselor/dashboard')->with('message_success', 'Berhasil Login');
            }
            if ($user->is_role == "Mahasiswa") {
                return redirect()->intended('mahasiswa/dashboard')->with('message_success', 'Berhasil Login');
            }

            return redirect()->intended('/')->with('message_success', 'Berhasil Login');
        }
        
        \Log::info('Login failed', ['email' => $credentials['email']]);
        return back()->with('message_danger', 'Login gagal, Coba Lagi');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
