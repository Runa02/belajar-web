@extends('admin.admin')
@section('title', 'Master Siswa')
@section('editsiswa')

<div class="card">
    <div class="card-body card shadow">
        <form action="{{ route('updatesiswa', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
        
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <img class="img-thumbnail" width="500" height="500" src="{{ asset('/storage/' .$data->photo) }}" alt="">
                <div class="col-md-12">
                    <label for="photo">Foto</label>
                    <input class="form-control" value="{{ $data->photo }}" name="photo" type="file" id="formFile">
                </div>
                <div class="col-md-12">
                    <label for="name">Nama</label>
                    <input class="form-control" value="{{ $data->name }}" name="name" type="text" placeholder="Masukkan Nama Kamu"></input>
                </div>
                    <div class="col-md-12">
                        <label for="about">About</label>
                        <textarea class="form-control" name="about" type="text" placeholder="About You">{{ $data->about }}</textarea>
                    </div>
                <div class="card-body">
                    <div class="button">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('indexsiswa') }}" class="btn btn-danger" role="button" aria-pressed="true">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection