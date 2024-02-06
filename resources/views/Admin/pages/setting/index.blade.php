@php use Illuminate\Support\Facades\Storage; @endphp
@extends('Layouts.admin')

@section('content')
    <h2>Settings</h2>

    @if($rowCount < 1)
        <a href="{{ route('admin.setting.create') }}" class="btn btn-success">Add Setting Item</a>
    @else
        <p class="alert text-bg-primary">If there are less than 2 setting items, you can add a new one</p>
    @endif

{{--    <a href="{{ route('admin.setting.create') }}" class="btn btn-success">Add Setting Item</a>--}}

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Top Logo</th>
            <th>Bottom Logo</th>
            <th>Address</th>
            <th>Mail</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($settings as $setting)
            <tr>
                <td>{{ $setting->id }}</td>
                <td><img src="{{Storage::url($setting->top_logo)}}" alt="" ></td>
                <td><img src="{{Storage::url($setting->bottom_logo)}}" alt="" class="bg-dark py-2"></td>
{{--                <td>{{ $setting->top_logo }}</td>--}}
{{--                <td>{{ $setting->bottom_logo }}</td>--}}
                <td>{{ $setting->address }}</td>
                <td>{{ $setting->mail }}</td>
                <td>{{ $setting->phone }}</td>
                <td>
                    <a href="{{ route('admin.setting.edit', ['setting' => $setting->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.setting.destroy', ['setting' => $setting->id]) }}" method="POST"
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
