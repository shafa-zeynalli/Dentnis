@extends('Layouts.admin')


@section('content')
    <h2>Edit Setting</h2>
    <form action="{{ route('admin.setting.edits', ['setting' => $setting->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group my-3">
            <label for="url">Top Logo:</label>
            <input type="file" name="top_image" class="form-control">
            @error("top_image")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="url">Bottom Logo:</label>
            <input type="file" name="bottom_image" class="form-control">
            @error("bottom_image")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="title">Address:</label>
            <input type="text" name="address" class="form-control" value="{{$setting->address}}">
            @error("address")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="title">Mail:</label>
            <input type="text" name="mail" class="form-control" value="{{$setting->mail}}">
            @error("mail")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group my-3">
            <label for="title">Phone:</label>
            <input type="text" name="phone" class="form-control" value="{{$setting->phone}}">
            @error("phone")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Setting</button>
    </form>
@endsection
