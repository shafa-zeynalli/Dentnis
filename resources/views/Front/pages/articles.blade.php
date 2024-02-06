@extends('Layouts.front')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
    <div class="all">
        <div class="under-nav">
            <div class="content">
                <div class="top-title">
                    {{__("Makaleler")}}
                </div>
                <div class="bottom-title">
                    <div class="bottom-left"><a href="">{{__("Anasayfa")}}</a></div>
                    <div class="icon"> ></div>
                    <div class="bottom-right"><a href="">{{__("Makaleler")}}</a></div>
                </div>
            </div>
        </div>


        <div class="container-article">
            <div class="all-article">
                @if(isset($blogs))
                @foreach($blogs as $item)
                    <div class="card">
                        <img src="{{Storage::url( $item->image)}}" class="card-img-top"
                             alt="...">
                        <div class="card-body">
                            @foreach ($item->translations as $data)
                            <h3 class="card-title">{{ $data->title }}</h3>
                            <p class="card-text"><span>
{{--                                    <p>{!! Str::limit(strip_tags($item->description), 200) !!}</p>--}}
                                    {!!  Str::limit(strip_tags( $data->description),  100) !!}
                                </span>
                            </p>
                            <a href="{{ url("$item->slug") }}" class="btn btn-primary">{{__("Devamını oku")}}</a>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @endif
{{--                    <div class="col">--}}
{{--                        @if(isset($blog))--}}
{{--                            <div class="image">--}}
{{--                                <img src="{{ $blog->image }}" alt="">--}}
{{--                            </div>--}}

{{--                            <div class="content">--}}
{{--                                @foreach ($blog->translations as $item)--}}
{{--                                    <h2>{{ $item->title }}</h2>--}}
{{--                                    <p>{!!  substr($item->description, 0, 200) !!}{{ strlen($item->description) > 200 ? '[...]' : '' }}</p>--}}
{{--                                @endforeach--}}
{{--                                <a href="{{ url("$blog->slug") }}">{{__("Devamını oku")}}</a>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}

            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/articles.css')}}">
@endpush
