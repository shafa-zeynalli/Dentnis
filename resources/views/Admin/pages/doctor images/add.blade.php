@extends('Layouts.admin')

@section('content')
    <h2>Add Sponsor Image</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.sponsor.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group py-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" id="summernote">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>

@endsection
