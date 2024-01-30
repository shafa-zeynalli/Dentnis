@extends('Layouts.admin')

@section('content')
    <h2>Add Setting Item</h2>

    <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="url">Top Logo:</label>
            <input type="file" name="top_image" class="form-control">
            @error("top_image")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="url">Bottom Logo:</label>
            <input type="file" name="bottom_image" class="form-control">
            @error("bottom_image")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Address:</label>
            <input type="text" name="address" class="form-control">
            @error("address")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Mail:</label>
            <input type="text" name="mail" class="form-control">
            @error("mail")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Phone:</label>
            <input type="text" name="phone" class="form-control">
            @error("phone")
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success my-3">Add Item</button>
    </form>
@endsection
