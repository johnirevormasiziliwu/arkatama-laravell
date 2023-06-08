<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $product = Produk::limit(3)->get();

        return view('master.home.home', compact('product'));
    }
}