@extends('Layouts.admin')

@section('content')
    <h2>Users</h2>
{{--    @if($rowCount < 1)--}}
{{--        <a href="{{ route('admin.about.create') }}" class="btn btn-success mb-3">Add About Item</a>--}}
{{--    @else--}}
{{--        <p class="alert text-bg-primary">If there are less than 2 about items, you can add a new one</p>--}}
{{--    @endif--}}
{{--    @if(session('success'))--}}
{{--        <div class="alert alert-success mt-3">--}}
{{--            {{ session('success') }}--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if(session('error'))--}}
{{--        <div class="alert alert-danger mt-3">--}}
{{--            {{ session('error') }}--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <div>--}}
{{--        --}}{{--        @dd(config('app.languages'))--}}
{{--        @foreach(config('app.languages') as $lang)--}}
{{--            @php--}}
{{--                $urlLang = request()->segment(count(request()->segments()));--}}
{{--                $backgroundClass = ($urlLang == $lang) ? 'bg-success text-white' : ''; // Eğer $lang URL'in en sonundaki dilse, background rengini değiştir--}}
{{--            @endphp--}}
{{--            <a href="{{ route('admin.about.index', ['lang' => $lang]) }}"--}}
{{--               class="border-2 border-success rounded p-2  m-1 bg-secondary {{ $backgroundClass }}">--}}
{{--                <span>{{ $lang }}</span>--}}
{{--            </a>--}}
{{--        @endforeach--}}
{{--    </div>--}}

    <table class="table mt-3">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Email</th>
{{--            <th>Actions</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email}}</td>

{{--                <td>--}}
{{--                    <a href="{{ route('admin.about.edit', ['about' => $about->id]) }}" class="btn btn-primary">Edit</a>--}}
{{--                    <form action="{{ route('admin.about.destroy', ['about' => $about->id]) }}" method="POST"--}}
{{--                          class="d-inline">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
