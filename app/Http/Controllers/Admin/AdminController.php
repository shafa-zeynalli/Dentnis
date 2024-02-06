<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.pages.main');
    }

    public function showLoginForm(){
        return view('Admin.pages.login.index');
    }

    public function login(Request $request)
    {
        // Form verilerini doğrula
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kullanıcıyı giriş yapmaya çalış
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Başarılı bir şekilde giriş yapıldıysa
            return redirect()->route('admin.main'); // Yönlendirilecek sayfa
        }

        // Giriş başarısız ise
        return back()->withErrors([
            'email' => 'Giriş bilgileri hatalı. Lütfen tekrar deneyin.',
        ]);
    }


    public function logout()
    {
        Auth::logout();

        return redirect('admin/login');
    }

    public function showUsers()
    {
        $users=User::all();

        return view('Admin.pages.user.index',compact('users'));
    }
    public function showContactMessages()
    {
        $contacts=Contact::all();

        return view('Admin.pages.contact.index',compact('contacts'));
    }

}
