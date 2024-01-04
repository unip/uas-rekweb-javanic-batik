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

            if ($request->file('foto') != null) {
                $this->validate($request, ['foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);

                $user = (object) ['foto' => ""];

                $original_filename = $request->file('foto')->getClientOriginalName();
                $original_filename_arr = explode('.', $original_filename);
                $file_ext = end($original_filename_arr);
                $destination_path = './upload/kategori/';
                $image = 'C-' . time() . '.' . $file_ext;

                $request->file('foto')->move($destination_path, $image);
                $user->image = '/upload/kategori/' . $image;

                $kategori = Kategori::create([
                    'nama_kategori' => $request->input('nama_kategori'),
                    'deskripsi_kategori' => $request->input('deskripsi_kategori'),
                    'status' => $request->input('status'),
                    'foto' => $user->image,
                    'kode_kategori' => $request->input('kode_kategori'),
                ]);
            } else {
                $kategori = Kategori::create([
                    'nama_kategori' => $request->input('nama_kategori'),
                    'deskripsi_kategori' => $request->input('deskripsi_kategori'),
                    'status' => $request->input('status'),
                    'kode_kategori' => $request->input('kode_kategori'),
                ]);
            }

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

            $this->validate($request, ['foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);

            $user = (object) ['foto' => ""];

            $original_filename = $request->file('foto')->getClientOriginalName();
            $original_filename_arr = explode('.', $original_filename);
            $file_ext = end($original_filename_arr);
            $destination_path = './upload/kategori/';
            $image = 'U-' . time() . '.' . $file_ext;

            $request->file('foto')->move($destination_path, $image);
            $user->image = '/upload/kategori/' . $image;

            Kategori::whereId($id)->update([
                'nama_kategori' => $request->input('nama_kategori'),
                'deskripsi_kategori' => $request->input('deskripsi_kategori'),
                'status' => $request->input('status'),
                'foto' => $user->image
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
