@extends('Layouts.admin')

@section('content')
    <h2>Edit Icon</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.icon.edits',['icon'=>$icon->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group py-3">
                    <label>Url</label>
                    <input type="text" name="url" class="form-control" id="summernote" value="{{$icon->url}}">
                    @error('url')
                    <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group py-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" id="summernote">
                    @error('image')
                    <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>


                <button class="btn btn-success my-3">Edit</button>
            </form>
        </div>
    </div>

@endsection
