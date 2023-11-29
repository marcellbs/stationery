@extends('layout.main')

@section('content')
<div class="container">
  <div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
        <li class="breadcrumb-item active">{{ $title . ' ' .$produk['nama_produk'] }}</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body table-responsive mt-4">
          <table class="table table-bordered">
            <tr>
              <td>Nama Produk</td>
              <td class="text-center">:</td>
              <td class="fw-bold">{{ $produk['nama_produk'] }}</td>
            </tr>
            <tr>
              <td>Harga</td>
              <td class="text-center">:</td>
              <td>{{ 'Rp. ' . $produk['harga'] }}</td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td class="text-center">:</td>
              <td>{{ $produk['kategori']['nama_kategori'] }}</td>
            </tr>
            <tr>
              <td>Status</td>
              <td class="text-center">:</td>
              <td>
                @if($produk['status']['nama_status'] == 'bisa dijual')
                  <span class="badge rounded-pill text-bg-success">{{ $produk['status']['nama_status'] }}</span>
                @else
                <span class="badge rounded-pill text-bg-danger">{{ $produk['status']['nama_status'] }}</span>
                @endif
              </td>
            </tr>
          </table>
          <div class="d-flex">
            <a href="{{ route('produk.index') }}" class="btn btn-outline-primary ms-auto ">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection