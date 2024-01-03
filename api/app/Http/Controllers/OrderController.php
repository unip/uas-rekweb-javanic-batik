<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function create(Request  $request)
    {
        try {
            $produk_id = $request->input('produk_id');
            $produk = Produk::whereId($produk_id)->first();
            $order = new Order();
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $order->produk_id = $produk_id;
            $order->jumlah_pesanan = $request->input('jumlah');
            $order->alamat = $request->input('alamat');
            $order->nama = $request->input('nama');
            $order->no_invoice = Str::random(10);
            $order->subtotal = $produk->harga * $request->input('jumlah');
            $order->ongkir = 20000;
            $order->total = 20000 +  $order->subtotal;
            $order->save();

            return response()->json([
                'success' => true,
                'message' => 'Success create order',
                'data' => $order
            ]);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill create order',
                'data' => $err->getMessage(),
            ]);
        }
    }

    public function index()
    {
        $order = Order::all();
        return response()->json([
            'success' => true,
            'message' => 'Success get ALL Order',
            'data' => $order
        ]);
    }

    public function detail($id)
    {
        $order = Order::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Success get Order',
            'data' => $order
        ]);
    }

    public function update(Request $req, $id)
    {
        try {
            Order::whereId($id)->update([
                'nama_produk' => $req->input('nama_produk'),
                'kategori_id' => $req->input('kategori_id'),
                'satuan' => $req->input('satuan'),
                'harga' => $req->input('harga'),
                'qty' => $req->input('qty'),
                'status' => $req->input('status'),
                'deskripsi_produk' => $req->input('deskripsi_produk'),
            ]);
            $order = Order::whereId($id)->first();

            return response()->json([
                'success' => true,
                'message' => 'Success update Order',
                'data' => $order
            ], 201);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill update Order',
                'data' => $err->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $order = Order::whereId($id)->first();
            $order->delete();

            return response()->json([
                'success' => true,
                'message' => 'Order berhasil dihapus'
            ], 200);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill delete Order',
                'data' => $err->getMessage(),
            ]);
        }
    }
}
