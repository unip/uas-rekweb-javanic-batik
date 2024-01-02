<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create(Request  $request)
    {
        try {
            $data = $request->all();
            $kategori = Kategori::create($data);
            return response()->json([
                'success' => true,
                'message' => 'Success create kategori',
                'data' => $kategori
            ]);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill create kategori',
                'data' => $err->getMessage(),
            ]);
        }
    }

    public function index()
    {
        $kategori = Kategori::all();

        return response()->json([
            'success' => true,
            'message' => 'Success get ALL kategori',
            'data' => $kategori
        ]);
    }

    public function detail($id)
    {
        $kategori = Kategori::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Success get kategori',
            'data' => $kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            Kategori::whereId($id)->update([
                'nama_kategori' => $request->input('nama_kategori'),
                'deskripsi_kategori' => $request->input('deskripsi_kategori'),
                'status' => $request->input('status'),
            ]);
            $kategori = Kategori::whereId($id)->first();

            return response()->json([
                'success' => true,
                'message' => 'Success update kategori',
                'data' => $kategori
            ], 201);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill update Kategori',
                'data' => $err->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $kategori = Kategori::whereId($id)->first();
            $kategori->delete();

            return response()->json([
                'success' => true,
                'message' => 'Kategori berhasil dihapus'
            ], 200);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill delete kategori',
                'data' => $err->getMessage(),
            ]);
        }
    }
}
