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
                'display_name' => $data['display_name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'],
                'role' => 'member',
                'status' => 'aktif'
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Success create user',
                'data' => $user
            ]);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill create user',
                'data' => $err->getMessage(),
            ]);
        }
    }

    public function index()
    {
        $user = User::all();

        return response()->json([
            'success' => true,
            'message' => 'Success get ALL user',
            'data' => $user
        ]);
    }

    public function detail($id)
    {
        $user = User::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Success get user',
            'data' => $user
        ]);
    }

    public function update(Request $req, $id)
    {
        try {

            $user = User::whereId($id)->update([
                'display_name' => $req->input('display_name'),
                'role' => $req->input('role'),
                'status' => $req->input('status')
            ]);
            $user = User::whereId($id)->first();

            return response()->json([
                'success' => true,
                'message' => 'Success update user',
                'data' => $user
            ], 201);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill update user',
                'data' => $err->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $user = User::whereId($id)->first();
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ], 200);
        } catch (Exception $err) {
            return response()->json([
                'success' => false,
                'message' => 'Faill delete user',
                'data' => $err->getMessage(),
            ]);
        }
    }
}
