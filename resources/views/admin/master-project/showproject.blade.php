    @if ($siswas->isEmpty())
        <h6>Siswa belum mempunyai project</h6>
    @else
    @foreach ($siswas as $item)
        <div class="card">
            <div class="card-header">
                {{$item -> project_name}}
            </div>
            <div class="card-body">
                <h6>Foto Projek</h6>
                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->photo }}" class="img-thumbnail" width="200" height="200">
                <h6>Tanggal Project</h6>
                <p>{{$item->project_date}}</p>
            </div>
            <div class="card-footer">
                <form action="{{ route('project-delete', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('project.edit', $item->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <button role="button" class="btn btn-danger" ><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    @endforeach
    @endif