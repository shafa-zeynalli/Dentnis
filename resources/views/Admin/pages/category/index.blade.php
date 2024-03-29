@extends('Layouts.admin')

@section('content')
    <h2>Categories</h2>
    <a href="{{ route('admin.category.create') }}" class="btn btn-success my-3">Add Category Item</a>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    <div>
        {{--        @dd(config('app.languages'))--}}
        @foreach(config('app.languages') as $lang)
            @php
                $urlLang = request()->segment(count(request()->segments()));
                $backgroundClass = ($urlLang == $lang) ? 'bg-success text-white' : '';
            @endphp
            <a href="{{ route('admin.category.index', ['lang' => $lang]) }}" class="border-2 border-success rounded p-2  m-1 bg-secondary {{ $backgroundClass }}">
                <span>{{ $lang }}</span>
            </a>
        @endforeach
    </div>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($adminCategories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                @foreach($category->translations as $item )
                    <td>{{ $item->name ?? null}}</td>
                @endforeach
                <td>
                    <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.category.destroy', ['category' => $category->id]) }}" method="POST" class="d-inline">
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
