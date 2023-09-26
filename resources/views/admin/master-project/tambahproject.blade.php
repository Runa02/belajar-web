@extends('admin.admin')
@section('title', 'Tambah Project')
@section('content-title', 'Tambah Project - ' .$siswa->name)
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-shadow">
                    <div class="card-header">
                        <a href="{{ route('project.index') }}" class="btn btn-info">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('project-store', $siswa->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                            <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
                            <div class="form-group">
                                <label for="project_name">Project Name</label>
                                <input class="form-control" type="text" name="project_name" id="">
                            </div>
                            <div class="form-group">
                                <label for="project_date">Project Date</label>
                                <input class="form-control" type="date" name="project_date" id="">
                            </div>
                            <div class="form-group">
                                <label for="photo">Project Photo</label>
                                <input class="form-control" type="file" name="photo" id="formFile">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Save</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection