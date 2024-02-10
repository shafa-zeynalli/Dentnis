@extends('Layouts.admin')

@section('content')
    <h2>About Menu</h2>
    @if($rowCount < 3)
     <a href="{{ route('admin.about_menu.create') }}" class="btn btn-success mb-3">Add About Menu Item</a>
    @else
        <p class="alert text-bg-primary">If there are less than 3 quote items, you can add a new one</p>
    @endif
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

    <div class="mt-5">
        @foreach(config('app.languages') as $lang)
            @php
                $urlLang = request()->segment(count(request()->segments()));
                $backgroundClass = ($urlLang == $lang) ? 'bg-success text-white' : '';
            @endphp
            <a href="{{ route('admin.about_menu.index', ['lang' => $lang]) }}" class="border-2 border-success rounded p-2  m-1 bg-secondary {{ $backgroundClass }}">
                <span>{{ $lang }}</span>
            </a>
        @endforeach
    </div>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                @foreach($menu->translations as $item )
                    <td>{{ $item->title }}</td>
                @endforeach
                    <td>{{ $menu->slug }}</td>
                <td>
                    <a href="{{ route('admin.about_menu.edit', ['menu' => $menu->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.about_menu.destroy', ['menu' => $menu->id]) }}" method="POST" class="d-inline">
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
