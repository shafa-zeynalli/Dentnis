@extends('Layouts.admin')

@section('content')
    <h2>Edit Youtube video</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.youtube.edits',['youtube'=>$youtube->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group py-3">
                    <label>Url</label>
                    <input type="text" name="url" class="form-control" id="summernote">
                    @error('url')
                    <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>


                <button class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>

@endsection
