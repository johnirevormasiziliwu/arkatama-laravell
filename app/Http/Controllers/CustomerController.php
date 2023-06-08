<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::with('order')->get();
        return view('master.customer.customer', compact('customer'));
    }

    public function create()
    {
        return view('master.customer.customer_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'email' => 'required',
            'alamat' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $customer = Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect('/customer')->with('sukses', 'Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('master.customer.customer_edit', compact('customer'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'email' => 'required',
            'alamat' => 'required',
        ]);
 
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $customer = Customer::find($request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect('/customer')->with('sukses', 'Data Berhasil Diupdate!');;
    }
    
    public function delete($id)
    {
        $customer = Customer::find($id)->delete();
        return redirect('/customer')->with('sukses', 'Data Berhasil Dihapus!');;
    }
}