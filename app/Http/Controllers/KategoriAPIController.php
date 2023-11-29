<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriAPIController extends Controller
{
    public function index(){
        $kategori = \App\Models\Kategori::all();

        return response()->json([
            'success' => true,
            'message' => 'List Kategori',
            'data' => $kategori
        ], 200);
    }
}
