@extends('admin.admin')
@section('title', 'Master Siswa')
@section('editsiswa')

<div class="card">
    <div class="card-body card shadow">
        <form action="{{ route('updatesiswa', $data->id) }}" method="post">
            @csrf
        
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Nama</label>
                    <input class="form-control" value="{{ $data->name }}" name="name" type="text" placeholder="Masukkan Nama Kamu"></input>
                </div>
                <div class="col-md-6">
                    <label for="photo">Foto</label>
                    <input class="form-control" value="{{ $data->photo }}" name="photo" type="file" id="formFile">
                </div>
                    <div class="col-md-12">
                        <label for="about">About</label>
                        <textarea class="form-control" name="about" type="text" placeholder="About You">{{ $data->about }}</textarea>
                    </div>
                <div class="card-body">
                    <div class="button">
                        <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                        <a href="{{ route('indexsiswa') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection