<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::get();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil diambil!',
            'data' => $produk,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'harga' => 'integer',
            'file' => 'mimes:jpeg,jpg,png',
        ]);
 
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Cek apakah upload file
        if ($request->hasFile('file')) {
            $name = $request->file('file');
            $fileName = 'Produk_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/gambar', $request->file('file'), $fileName);
        }

        $produk = Produk::create([    
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'file' => $fileName,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil disimpan',
            'data' => $produk
        ]);;
    }
}