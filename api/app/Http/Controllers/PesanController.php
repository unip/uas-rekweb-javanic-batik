<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Exception;
use Illuminate\Http\Request;

class PesanController extends Controller
{

    public function create(Request  $request)
    {
        try {
            $data = $request->all();
            $pesan = Pesan::create($data);
            return response()->json([
                'success' => true,
                'message' => 'Success create Pesan',
                'data' => $pesan
            ]);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill create Pesan',
                'data' => $err->getMessage(),
            ]);
        }
    }

    public function index()
    {
        $pesan = Pesan::all();

        return response()->json([
            'success' => true,
            'message' => 'Success get ALL Pesan',
            'data' => $pesan
        ]);
    }

    public function detail($id)
    {
        $pesan = Pesan::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Success get Pesan',
            'data' => $pesan
        ]);
    }

    public function delete($id)
    {
        try {
            $pesan = Pesan::whereId($id)->first();
            $pesan->delete();

            return response()->json([
                'success' => true,
                'message' => 'Pesan berhasil dihapus'
            ], 200);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill delete Pesan',
                'data' => $err->getMessage(),
            ]);
        }
    }
}
