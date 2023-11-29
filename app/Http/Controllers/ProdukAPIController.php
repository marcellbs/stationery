<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Status;
use Illuminate\Http\Request;

class ProdukAPIController extends Controller {

  public function index(){
    $produk = Produk::with('kategori', 'status')->get();
    // $produk = Produk::with('kategori', 'status')
    //         ->whereHas('status', function ($query) {
    //             $query->where('nama_status', 'Bisa Dijual');
    //         })
    //         ->get();

    return response()->json([
      'success' => true,
      'message' => 'Daftar Produk',
      'data' => $produk
    ], 200);
  }

  public function status(){
    $status = Status::all();

    return response()->json([
      'success' => true,
      'message' => 'List Status',
      'data' => $status
    ],200);
  }

  public function store(Request $request)
  {
      $request->validate([
          'nama_produk' => 'required',
          'harga' => 'required|numeric',
          'kategori_id' => 'required',
          'status_id' => 'required'
      ]);

      // Lakukan operasi penyimpanan ke database
      $produk = new Produk();
      $produk->nama_produk = $request->nama_produk;
      $produk->harga = $request->harga;
      $produk->kategori_id = $request->kategori_id;
      $produk->status_id = $request->status_id;
      $produk->save();

      return response()->json([
          'success' => true,
          'message' => 'Produk berhasil disimpan.',
          'data' => $produk,
      ], 201);
  }

  public function show($id)
  {
      // Ambil data produk berdasarkan ID
      $produk = Produk::with('kategori', 'status')->find($id);

      // Periksa apakah produk ditemukan
      if (!$produk) {
          return response()->json([
              'success' => false,
              'message' => 'Produk tidak ditemukan.',
          ], 404); // 404 Not Found
      }

      // Jika produk ditemukan, kembalikan respon JSON dengan data produk
      return response()->json([
          'success' => true,
          'message' => 'Detail Produk',
          'data' => $produk,
      ], 200); // 200 OK
  }

  public function edit($id){

      $produk = Produk::with('kategori', 'status')->find($id);

      // Periksa apakah produk ditemukan
      if (!$produk) {
          return response()->json([
              'success' => false,
              'message' => 'Produk tidak ditemukan.',
          ], 404); 
      }

      // Kembalikan respon JSON dengan data produk untuk diedit
      return response()->json([
          'success' => true,
          'message' => 'Edit Produk',
          'data' => $produk,
      ], 200); // 200 OK
  }


  public function update(Request $request, $id){
    $dataProduk = Produk::find($id);

    if(empty($dataProduk)){
      return response()->json([
        "success" => false,
        "message" => "Data produk tidak ditemukan",
        "data" => "",
      ], 404);
    }

    $rules = [
          'nama_produk' => 'required',
          'harga' => 'required|numeric',
          'kategori_id' => 'required',
          'status_id' => 'required'
    ];

    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'message' => 'Gagal memperbarui data',
        'data' => $validator->errors()
      ], 400);
    }

    $dataProduk->nama_produk = $request->nama_produk;
    $dataProduk->harga = $request->harga;
    $dataProduk->kategori_id = $request->kategori_id;
    $dataProduk->status_id = $request->status_id;

    $dataProduk->save();

    return response()->json([
      'success' => true,
      'message' => 'Berhasil memperbarui data',
    ], 200);


  }



  public function destroy($id){
    // Temukan produk berdasarkan ID
    $produk = Produk::find($id);

    if (!$produk) {
        return response()->json([
            'success' => false,
            'message' => 'Produk tidak ditemukan.',
        ], 404);
    }

    // Hapus produk
    $produk->delete();

    return response()->json([
        'success' => true,
        'message' => 'Produk berhasil dihapus.',
    ], 200);
  }


  

}


?>