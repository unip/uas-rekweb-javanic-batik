<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function create(Request  $request)
    {
        try {
            $data = $request->all();
            $produk = Produk::create($data);
            return response()->json([
                'success' => true,
                'message' => 'Success create produk',
                'data' => $produk
            ]);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill create produk',
                'data' => $err->getMessage(),
            ]);
        }
    }

    public function index()
    {
        $produk = Produk::all();
        return response()->json([
            'success' => true,
            'message' => 'Success get ALL produk',
            'data' => $produk
        ]);
    }

    public function detail($id)
    {
        $produk = Produk::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Success get produk',
            'data' => $produk
        ]);
    }

    public function update(Request $req, $id)
    {
        try {
            $produk = Produk::whereId($id)->update([
                'nama_produk' => $req->input('nama_produk'),
                'kategori_id' => $req->input('kategori_id'),
                'satuan' => $req->input('satuan'),
                'harga' => $req->input('harga'),
                'qty' => $req->input('qty'),
                'status' => $req->input('status'),
                'deskripsi_produk' => $req->input('deskripsi_produk'),
            ]);
            $produk = Produk::whereId($id)->first();

            return response()->json([
                'success' => true,
                'message' => 'Success update produk',
                'data' => $produk
            ], 201);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill update produk',
                'data' => $err->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $barang = Produk::whereId($id)->first();
            $barang->delete();

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil dihapus'
            ], 200);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill delete Produk',
                'data' => $err->getMessage(),
            ]);
        }
    }
}
