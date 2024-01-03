<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminDashboardController extends Controller
{
    // public $client = Http::withToken(session('token'));

    public function index()
    {
        $orders = Http::withToken(session('token'))->get('http://localhost:8005/order');
        $products = Http::withToken(session('token'))->get('http://localhost:8005/produk');

        $data = [
            'title' => 'Dashboard',
            'orders' => $orders['data'],
            'products' => $products['data'],
        ];

        return view('pages.admin.dashboard', $data);
    }
}
