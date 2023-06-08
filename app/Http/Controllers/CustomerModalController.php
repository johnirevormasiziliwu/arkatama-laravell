<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerModalController extends Controller
{
    public function index(Request $request)
    {
        $customer = Customer::with('order')->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'data' => $customer
            ]);
        }

        return view('master.customer_modal.customer', compact('customer'));
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
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $customer = Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $customer
        ]);
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();
        return response()->json([
            'message' => 'Data Berhasil Diambil!',
            'data'    => $customer  
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:255',
            'email' => 'required',
            'alamat' => 'required',
        ]);
 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $customer = Customer::find($request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect('/modal/customer');
    }
    
    public function delete($id)
    {
        $customer = Customer::find($id)->delete();
        return redirect('/modal/customer');
    }
}