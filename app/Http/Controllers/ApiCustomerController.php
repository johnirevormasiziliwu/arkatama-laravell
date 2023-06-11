<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiCustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::get();
        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil diambil!',
            'data' => $customer,
        ]);
    }
    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'email' => 'required',
            'alamat' => 'required',
            'jk' => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()
                        ->withErrors($validator)
                        ->withInput();
        }

        $customer = Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Data berhasil disimpan',
            'data' => $customer
        ]);
    }
}