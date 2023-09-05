@extends('admin.admin')
@section('title', 'Master Siswa')
@section('tambahsiswa')

<div class="card">
    <div class="card-body card shadow">
        <form action="{{ route('storesiswa') }}" method="post">
            @csrf
        
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Nama</label>
                    <input class="form-control" name="name" type="text" placeholder="Masukkan Nama Kamu" required>
                </div>
                <div class="col-md-6">
                    <label for="photo">Foto</label>
                    <input class="form-control" name="photo" type="file" id="formFile">
                </div>
                    <div class="col-md-12">
                        <label for="about">About</label>
                        <textarea class="form-control" name="about" type="text" placeholder="About You" required></textarea>
                    </div>
                <div class="card-body">
                    <div class="button">
                        <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                        <a href="./mastersiswa" class="btn btn-light" role="button" aria-pressed="true">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection