<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();

        return view('master.product.product', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.product.product_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        Produk::create([    
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'file' => $fileName,
        ]);

        return redirect('/produk')->with('Sukses!', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('master.product.product_edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
        
        $produk = Produk::where('id', $request->id)->first();

        // Cek apakah upload file
        if ($request->hasFile('file')) {

            // Menghapus file lama dari storage
            $delete = Storage::delete('public/gambar/' . $produk->file);

            // Upload file baru dengan format nama ditentukan
            $name = $request->file('file');
            $fileName = 'Produk_' . time() . '.' . $name->getClientOriginalExtension();
            $path = Storage::putFileAs('public/gambar', $request->file('file'), $fileName);

            // Update file di database
            $produk->update([
                'file' => $fileName,
            ]);
        }

        // Update Data di database
        $produk->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
        ]);

        return redirect('/produk')->with('Sukses!', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::where('id', $id)->first();

        // Menghapus file lama dari storage
        $delete = Storage::delete('public/gambar/' . $produk->file);
        // Delete data dari database 
        $produk->delete();

        return redirect('/produk')->with('Sukses!', 'Data Berhasil Dihapus');
    }
}