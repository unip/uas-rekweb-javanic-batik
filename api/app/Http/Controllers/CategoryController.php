<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Kategori;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create(Request  $request)
    {
        $data = $request->all();
        $kategori = Kategori::create($data);

        return response()->json($kategori);
    }

    public function index()
    {
        $kategori = Kategori::all();

        return response()->json($kategori);
    }

    public function detail($id)
    {
        $kategori = Kategori::find($id);
        return response()->json($kategori);
    }

    public function update(Request $req, $id)
    {
        $kategori = Kategori::whereId($id)->update([
            'nama_kategori' => $req->input('nama_kategori'),
            'kode_kategori' => $req->input('kode_kategori'),
            'deskripsi_kategori' => $req->input('deskripsi_kategori'),
            'status' => $req->input('status'),
        ]);

        if ($kategori) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate',
                'data' => $kategori
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal diupdate'
            ], 400);
        }
    }

    public function delete($id)
    {
        $kategori = Kategori::whereId($id)->first();
        $kategori->delete();

        if ($kategori) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ], 200);
        }
    }
}
