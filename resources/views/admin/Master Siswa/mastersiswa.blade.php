@extends('admin.admin')
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('mastersiswa')

@if(Session::has('message'))
  <div class="alert alert-danger"">
    {{ Session::get('message') }}
  </div>
@endif

<div class="card">
    <div class="card-header">
        <a href="{{ route('tambah') }}" class="btn btn-primary" role="button" aria-pressed="true">Tambah</a>
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <th>No</th>
          <th>Nama</th>
          <th>About</th>
          <th>Foto</th>
          <th>Aksi</th>
        </thead>
        @foreach ($datasiswa as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->about }}</td>
          <td><img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->photo }}" class="img-thumbnail" width="200" height="200"></td>
          <td>
            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('siswadestroy', $item->id) }}" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
</div>

<style>

</style>

@endsection

@section('style')
    <link rel="stylesheet" href="/css/cardsiswa.css">
@endsection