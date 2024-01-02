<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{



    public function create(Request $request)
    {
        try {
            $data = $request->all();
            $user = User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'],
                'role' => 'member',
                'status' => 'aktif'
            ]);

            return response()->json($user);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat user',
                'data' => $err->getMessage(),
            ]);
        }
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
