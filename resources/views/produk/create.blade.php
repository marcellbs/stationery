@extends('layout.main')

@section('content')

<div class="container">
  <div class="pagetitle">
    <h1><?=$title;?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Produk</a></li>
        <li class="breadcrumb-item active">{{ $title }}</li>
      </ol>
    </nav>
  </div>

  {{-- form untuk tambah data --}}
  <div class="row mt-3">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body table-responsive mt-3">
          <h5>Tambah Data Produk</h5>
          <hr>
          <form action="{{ route('produk.store') }}" method="post">
            @csrf
            <div class="mb-2">
              <label for="nama_produk" class="form-label">Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" class="nama_produk form-control" placeholder="Masukkan Nama Produk">
            </div>

            <div class="mb-2">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" name="harga" id="harga" class="harga form-control" placeholder="Masukkan Harga Produk">
            </div>

            <div class="mb-2">
              <label for="kategori_id" class="form-label">Kategori</label>
              <select name="kategori_id" id="kategori_id" class="form-select kategori_id">
                <option value="" selected>-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                  <option value="{{$k['id_kategori']}}">{{$k['nama_kategori']}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-2">
              <label for="status_id" class="form-label">Status</label>
              <select name="status_id" id="status_id" class="form-select status_id">
                <option value="" selected>-- Pilih Status --</option>
                @foreach($status as $s)
                  <option value="{{$s['id_status']}}">{{ucwords($s['nama_status'])}}</option>
                @endforeach
              </select>
            </div>

            <div class="d-flex">
              <a href="{{ route('produk.index') }}" class="btn btn-outline-primary ms-auto mx-2">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection