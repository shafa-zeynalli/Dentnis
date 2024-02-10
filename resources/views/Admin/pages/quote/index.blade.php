@extends('Layouts.admin')

@section('content')
    <h2>Quotes</h2>
    @if($rowCount < 3)
     <a href="{{ route('admin.quotes.create') }}" class="btn btn-success mb-3">Add Quote Item</a>
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
            <a href="{{ route('admin.quotes.index', ['lang' => $lang]) }}" class="border-2 border-success rounded p-2  m-1 bg-secondary {{ $backgroundClass }}">
                <span>{{ $lang }}</span>
            </a>
        @endforeach
    </div>

    <table class="table mt-3">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quotes as $quote)
            <tr>
                <td>{{ $quote->id }}</td>
                <td><img src="{{ url('storage/' . $quote->image) }}" alt="Quote Item Image" width="100"></td>
                @foreach($quote->translations as $item )
                    <td>{{ $item->title }}</td>
                    <td>{!!  substr($item->description, 0, 20) !!}{{  strlen($item->description) > 20 ? '[...]' : '' }}</td>
                @endforeach
                <td>
                    <a href="{{ route('admin.quotes.edit', ['quote' => $quote->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.quotes.destroy', ['quote' => $quote->id]) }}" method="POST" class="d-inline">
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
