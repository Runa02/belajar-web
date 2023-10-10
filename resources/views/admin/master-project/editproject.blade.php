@extends('admin.admin')
@section('title', 'Edit Project')
@section('content-title', 'Edit Project - ' .$project->project_name)
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-shadow">
                    <div class="card-header">
                        <a href="{{ route('project.index') }}" class="btn btn-info">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('project-update', $project->id) }}" enctype="multipart/form-data" method="POST">
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

                            <input type="hidden" name="siswa_id" value="{{ $project->siswa->id }}">
                            <div class="form-group">
                                <label for="project_name">Project Name</label>
                                <input class="form-control" type="text" name="project_name" value="{{ $project->project_name }}">
                            </div>
                            <div class="form-group">
                                <label for="project_date">Project Date</label>
                                <input class="form-control" type="date" name="project_date" value="{{ $project->project_date }}">
                            </div>
                            <div class="form-group">
                                <label for="photo">Project Photo</label>
                                <input class="form-control" type="file" name="photo" id="formFile" value="{{ $project->photo }}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection