@extends('layout.main')

@section('content')
<div class="container">
  <div class="pagetitle">
    <h1><?=$title;?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active"><?=$title;?></li>
      </ol>
    </nav>
  </div>
  <div class="row mt-3">
    <div class="col-lg-12">
      {{-- alert --}}
    @if(session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! session('error') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session('success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
      <div class="card">
        <div class="card-body table-responsive mt-3">
          <a href="/produk/create" class="btn btn-sm btn-primary mb-3"><i class="bi bi-plus"></i> Tambah Data</a>
          <table class="table datatable" id="datatable">
            <thead>
              <tr class="text-center">
                <th>No.</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($produk as $item)
                @if($item['status']['nama_status'] == 'bisa dijual')
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{ $item['nama_produk'] }}</td>
                  <td>{{ 'Rp. ' . $item['harga'] }}</td>
                  <td>{{ $item['kategori']['nama_kategori'] }}</td>
                  <td class="text-center">
                    @if($item['status']['nama_status'] == 'bisa dijual')
                    <span class="badge rounded-pill text-bg-success">
                      {{ $item['status']['nama_status'] }}
                    </span>
                    @else
                    <span class="badge rounded-pill text-bg-danger">
                      {{ $item['status']['nama_status'] }}
                    </span>
                    @endif
                  </td>
                  <td>
                    <a href="{{ route('produk.show', $item['id_produk']) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('produk.edit', $item['id_produk']) }}" class="btn btn-sm btn-warning"><i class="bi bi-pen"></i></a>
                    <form action="{{ route('produk.destroy', $item['id_produk']) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah anda yakin menghapus data ini ?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                </tr>
                
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
  

  
@endsection