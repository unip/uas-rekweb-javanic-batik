<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function create(Request $req)
    {
        try {

            $this->validate($req, ['foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);

            $prod = (object) ['foto' => ""];

            $original_filename = $req->file('foto')->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $destination_path = './upload/produk/';
            $image = 'C-' . time() . '.' . $file_ext;

            $req->file('foto')->move($destination_path, $image);
            $prod->image = '/upload/produk/' . $image;

            $produk = Produk::create([
                'nama_produk' => $req->input('nama_produk'),
                'kode_produk' => $req->input('kode_produk'),
                'kategori_id' => $req->input('kategori_id'),
                'satuan' => $req->input('satuan'),
                'harga' => $req->input('harga'),
                'qty' => $req->input('qty'),
                'status' => $req->input('status'),
                'deskripsi_produk' => $req->input('deskripsi_produk'),
                'foto' => $prod->image
            ]);

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

            $this->validate($req, ['foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);

            $prod = (object) ['foto' => ""];

            $original_filename = $req->file('foto')->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $destination_path = './upload/produk/';
            $image = 'C-' . time() . '.' . $file_ext;

            $req->file('foto')->move($destination_path, $image);
            $prod->image = '/upload/produk/' . $image;

            Produk::whereId($id)->update([
                'nama_produk' => $req->input('nama_produk'),
                'kategori_id' => $req->input('kategori_id'),
                'satuan' => $req->input('satuan'),
                'harga' => $req->input('harga'),
                'qty' => $req->input('qty'),
                'status' => $req->input('status'),
                'deskripsi_produk' => $req->input('deskripsi_produk'),
                'foto' => $prod->image
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
