@extends('Layouts.admin')

@section('content')
    <h2>Head Doctor </h2>
    <a href="{{ route('admin.doctor.create') }}" class="btn btn-success mb-3">Add </a>

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
            <a href="{{ route('admin.doctor.index', ['lang' => $lang]) }}"
               class="border-2 border-success rounded p-2  m-1 bg-secondary {{ $backgroundClass }}">
                <span>{{ $lang }}</span>
            </a>
        @endforeach
    </div>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($abouts as $about)
            <tr>
{{--                @dd($blog)--}}

                <td>{{ $about->id }}</td>
                @foreach($about->translations as $item )
                    <td>{!! Str::limit(strip_tags($item->description),70)  !!}</td>
                @endforeach

                <td>
                    <a href="{{ route('admin.doctor.edit', ['doctor' => $about->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.doctor.destroy', ['doctor' => $about->id]) }}" method="POST"
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
