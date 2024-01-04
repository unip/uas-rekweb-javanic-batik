<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Http::withToken(session('token'))->get('http://localhost:8005/kategori');

        $data = [
            'title' => 'Kategori Produk',
            'categories' => collect($categories['data']),
        ];

        return view('pages.admin.kategori.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Buat Kategori Baru',
        ];

        return view('pages.admin.kategori.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
            'deskripsi_kategori' => 'nullable',
            'status' => 'nullable',
            'foto' => 'nullable',
        ]);

        // dd($validated);

        $res = Http::withToken(session('token'))->post('http://localhost:8005/kategori', $validated);

        // dd($res->json());

        if (!$res->json()['success']) {
            return back()->with('error', 'Gagal membuat kategori');
        }

        return redirect()->route('admin.categories.index')->with('success', 'Berhasil membuat kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Http::withToken(session('token'))->get('http://localhost:8005/kategori/detail/' . $id);

        if (!$kategori->json()['success']) {
            return redirect()->route('admin.categories.index')->with('error', 'Gagal membuka kategori');
        }

        $data = [
            'title' => 'Update Kategori Produk',
            'kategori' => $kategori->json()['data'],
        ];

        return view('pages.admin.kategori.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
            'deskripsi_kategori' => 'nullable',
            'status' => 'nullable',
            'foto' => 'nullable',
        ]);

        $kategori = Http::withToken(session('token'))->get('http://localhost:8005/kategori/update/' . $id, $validated);

        dd($kategori->json());

        if (!$kategori->json()['success']) {
            return back()->with('error', 'Gagal update kategori');
        }

        return redirect()->route('admin.categories.index')->with('success', 'Berhasil membuat kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Http::withToken(session('token'))->put('http://localhost:8005/kategori/delete/' . $id);

        if (!$res->json()['success']) {
            return back()->with('error', 'Gagal menghapus kategori');
        }

        return back()->with('success', 'Sukses menghapus kategori');
    }
}
