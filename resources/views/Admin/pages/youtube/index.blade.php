@extends('Layouts.admin')


@section('content')


        <h2>Youtube Videos</h2>

        <a href="{{ route('admin.youtube.create') }}" class="btn btn-success">Add Video</a>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Video</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($youtubes as $youtube)
                <tr>
                    <td>{{ $youtube->id }}</td>
                    <td>{{ $youtube->url }}</td>
                    <td>
                        <a href="{{ route('admin.youtube.edit', ['youtube' => $youtube->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.youtube.destroy', ['youtube' => $youtube->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


@endsection
