@extends('Layouts.admin')

@section('content')
    <h2>Edit Slider Image</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.slider.edits',['slider'=>$slider->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group py-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" id="summernote">
                    @error('image')
                    <span class="text-danger">{{ $message }} </span>
                    @enderror
                </div>


                <button class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>

@endsection
