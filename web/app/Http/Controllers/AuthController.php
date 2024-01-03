<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.admin.login', ['title' => 'Admin Login']);
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $res = Http::post('http://localhost:8005/login', $validated);

        if (!$res['success']) {
            return back()->with('error', $res['message']);
        }

        session(['token' => $res['data']['api_token'], 'user' => $res['data']['user']]);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $req)
    {
        $res = Http::post('http://localhost:8005/logout');

        // dd($res);

        $req->session()->flush();

        return redirect()->route('admin.login.index')->with('success', 'Anda telah keluar');
    }
}
