@extends('Layouts.admin')

@section('content')
    <h2>Team Members</h2>
    <a href="{{ route('admin.teams.create') }}" class="btn btn-success mb-3">Add Team Member</a>

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
                $backgroundClass = ($urlLang == $lang) ? 'bg-success text-white' : ''; // Eğer $lang URL'in en sonundaki dilse, background rengini değiştir
            @endphp
            <a href="{{ route('admin.teams.index', ['lang' => $lang]) }}" class="border-2 border-success rounded p-2  m-1 bg-secondary {{ $backgroundClass }}">
                <span>{{ $lang }}</span>
            </a>
        @endforeach
    </div>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td><img src="{{ $team->image }}" alt="Team Member Image" width="100"></td>
                <td>{{ $team->title }}</td>
                @foreach($team->translations as $index )
                <td>{{ $index->position ?? 'null' }}</td>
                @endforeach
                <td>
                    <a href="{{ route('admin.teams.edit', ['team' => $team->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.teams.destroy', ['team' => $team->id]) }}" method="POST" class="d-inline">
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
