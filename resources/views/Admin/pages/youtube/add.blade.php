@extends('Layouts.admin')

@section('content')
    <h2>Add Slider Image</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.youtube.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group py-3">
                    <label>Url</label>
                    <input type="text" name="url" class="form-control" id="summernote">
                    @error('url')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>

@endsection
