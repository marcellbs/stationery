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

  {{-- {{ dd($produk) }} --}}
  {{-- form untuk tambah data --}}
  <div class="row mt-3">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body table-responsive mt-3">
          <h5>Edit Data Produk</h5>
          <hr>
          <form action="{{ route('produk.update', $produk['id_produk']) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-2">
              <label for="nama_produk" class="form-label">Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" class="nama_produk form-control" value="{{ $produk['nama_produk'] }}">
            </div>

            <div class="mb-2">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" name="harga" id="harga" class="harga form-control" value="{{ $produk["harga"] }}">
            </div>

            <div class="mb-2">
              <label for="kategori_id" class="form-label">Kategori</label>
              <select name="kategori_id" id="kategori_id" class="form-select kategori_id">
                <option value="" selected>-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                  <option value="{{$k['id_kategori']}}" {{ $k['id_kategori'] == $produk['kategori_id'] ? 'selected' : '' }} >{{$k['nama_kategori']}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-2">
              <label for="status_id" class="form-label">Status</label>
              <select name="status_id" id="status_id" class="form-select status_id">
                <option value="" selected>-- Pilih Status --</option>
                @foreach($status as $s)
                  <option value="{{$s['id_status']}}" {{ $s['id_status'] == $produk['status_id'] ? 'selected' : '' }} > {{ucwords($s['nama_status'])}}</option>
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