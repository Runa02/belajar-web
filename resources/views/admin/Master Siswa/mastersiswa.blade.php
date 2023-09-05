@extends('admin.admin')
@section('title', 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('mastersiswa')

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
          <td>{{ $item->photo }}</td>
          <td>
            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>
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