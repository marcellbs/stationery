<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Http;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Http::get('http://localhost:8000/api/produk');
            $data = $response->json();

            if ($data['success'] && isset($data['data'])) {
                $produk = $data['data'];

                $data = [
                    'title' => 'Daftar Produk',
                    'produk' => $produk,
                ];
                return view('produk.index', $data);

            } else {
                return redirect()->back()->with('error', 'Format respons dari API tidak sesuai.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengambil data dari API: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $responseKategori = Http::get('http://localhost:8000/api/kategori');
            $kategori = $responseKategori->json();

            $responseStatus = Http::get('http://localhost:8000/api/status');
            $status = $responseStatus->json();

            $data = [
                'title' => 'Tambah Data Produk',
                'kategori' => $kategori['data'],
                'status' => $status['data'],
            ];

            return view('produk.create', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengambil data dari API: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
            'status_id' => 'required'
        ],[
            'nama_produk.required'=>'Nama produk wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'kategori_id.required' => 'Kategori harus diisi',
            'status_id.required' => 'Status harus diisi'
        ]);

        $responseProduk = Http::post('http://localhost:8000/api/produk', [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'status_id' => $request->status_id,
        ]);
    
        if ($responseProduk->successful()) {
            return redirect()->route('produk.index')->with('success', '<i class="bi bi-check2-all"></i> Data produk berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', '<i class="bi bi-x-circle"></i> Gagal menambahkan data produk');
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        try{
            // API untuk show data
            $responseProduk = Http::get('http://localhost:8000/api/produk/' . $produk->id_produk);
            $produk = $responseProduk->json();

            $data = [
                'produk' => $produk['data'],
                'title' => 'Detail Produk',
            ];
    
            return view('produk.show', $data);   

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengambil data dari API: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        try{
            // API edit data
            $responseProduk = Http::get('http://localhost:8000/api/produk/' . $produk->id_produk . '/edit');
            $produk = $responseProduk->json();

            // API mendapatkan data kategori
            $responseKategori = Http::get('http://localhost:8000/api/kategori');
            $kategori = $responseKategori->json();

            // API mendapatkan data status
            $responseStatus = Http::get('http://localhost:8000/api/status');
            $status = $responseStatus->json();

            $data = [
                'produk' => $produk['data'],
                'title' => 'Edit Produk',
                'kategori' => $kategori['data'],
                'status' => $status['data']
            ];
    
            return view('produk.edit', $data);
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengambil data dari API: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */

public function update(Request $request, Produk $produk)
{
    // Buat data produk yang akan dikirim ke API

    $nama_produk = $request->input("nama_produk");
    $harga = $request->input("harga");
    $kategori_id = $request->input("kategori_id");
    $status_id = $request->input("status_id");

    $param = [
        'nama_produk' => $nama_produk,
        'harga' => $harga,
        'kategori_id' => $kategori_id,
        'status_id' => $status_id,
    ];

    // Konfigurasi URL API dan endpoint yang sesuai
    $apiUrl = 'http://localhost:8000/api/produk/' . $produk->id_produk;
    $client = new Client();
    $response = $client->request('PUT', $apiUrl, [
        'headers' => [
            'Content-Type' => 'application/json'
        ],
        'body' => json_encode($param),
    ]);
    $content = $response->getBody()->getContents();
    $contentArray = json_decode($content, true);

    if ($contentArray["success"]) {
        // Produk berhasil diperbarui
        return redirect()->route('produk.index')->with('success', $contentArray['message']);
    } else {
        // Gagal memperbarui produk
        return redirect()->back()->with('error', $contentArray['message']);
    }
    
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $response = Http::delete('http://localhost:8000/api/produk/' . $produk->id_produk);

        // Check if the delete operation was successful
        if ($response->successful()) {
            return redirect()->route('produk.index')->with('success', '<i class="bi bi-check2-all"></i> Produk berhasil dihapus');
        } else {
            return redirect()->route('produk.index')->with('error', '<i class="bi bi-x-circle"></i> Produk gagal dihapus');
        }
    }
}
