<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function create(Request  $request)
    {
        $data = $request->all();
        $produk = Produk::create($data);

        return response()->json($produk);
    }

    public function index()
    {
        $produk = Produk::all();

        return response()->json($produk);
    }

    public function detail($id)
    {
        $produk = Produk::find($id);
        return response()->json($produk);
    }

    public function update(Request $req, $id)
    {
        $produk = Produk::whereId($id)->update([
            'nama_produk' => $req->input('nama_produk'),
            'kategori_id' => $req->input('kategori_id'),
            'satuan' => $req->input('satuan'),
            'harga' => $req->input('harga'),
            'qty' => $req->input('qty'),
            'status' => $req->input('status'),
            'deskripsi_produk' => $req->input('deskripsi_produk'),
        ]);

        if ($produk) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate',
                'data' => $produk
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
        $barang = Produk::whereId($id)->first();
        $barang->delete();

        if ($barang) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ], 200);
        }
    }
}
