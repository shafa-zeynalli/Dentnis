@extends('Layouts.admin')


@section('content')
    <h2>Edit Tv Program Video</h2>
    <form action="{{ route('admin.program.edits', ['program' => $tv_program->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="url">YouTube URL:</label>
            <input type="text" name="url" class="form-control" value="{{ $tv_program->url }}" required>
        </div>

        <div class="form-group">
            <label for="url">Video Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $tv_program->title }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Video</button>
    </form>
@endsection
