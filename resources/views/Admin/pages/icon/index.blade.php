@php use Illuminate\Support\Facades\Storage; @endphp
@extends('Layouts.admin')

@section('content')
    <h2>Icons</h2>
    <a href="{{ route('admin.icon.create') }}" class="btn btn-success">Add Icon Item</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Url</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($icons as $icon)
            <tr class="align-items-center justify-content-center">
                <td>{{ $icon->id }}</td>
                <td><img src="{{Storage::url($icon->image)  }}" alt="" style="width: 50px"></td>
                <td>{{ $icon->url }}</td>
                <td>
                    <a href="{{ route('admin.icon.edit', ['icon' => $icon->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.icon.destroy', ['icon' => $icon->id]) }}" method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
