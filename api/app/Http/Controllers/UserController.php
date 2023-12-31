<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{



    public function create(Request  $request)
    {
        $data = $request->all();
        $user = User::create($data);

        return response()->json($user);
    }

    public function index()
    {
        $user = User::all();

        return response()->json($user);
    }

    public function detail($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $req, $id)
    {
        $user = User::whereId($id)->update([
            'name' => $req->input('name'),
            'alamat' => $req->input('alamat')
        ]);

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate',
                'data' => $user
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
        $kategori = User::whereId($id)->first();
        $kategori->delete();

        if ($kategori) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ], 200);
        }
    }
}
