@extends('Layouts.admin')

@section('content')
    <h2>Contacts</h2>
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
            <th>Full Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Phone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->full_name }}</td>
                <td>{{ $contact->email}}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->phone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
