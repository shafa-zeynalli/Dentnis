@extends('Front.Layouts.front')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <div class="single-page">
        @foreach($blogItem as $blog)
            <div class="top">
                <div>
                    <p>Makaleler</p>
                    @foreach($blog->translations as $item)
                        <h1>{{$item->title}}</h1>
                    @endforeach
                </div>

                {{--            <img src="{{asset('assets/front/images/purple-background.png')}}" alt="">--}}
                <img src="{{$blog->image}}" alt="">
            </div>

            <div class="container">
                @foreach($blog->translations as $item)
                    <p>{{$item->description}}</p>
                @endforeach
            </div>
        @endforeach

        <div class="others-section">
            <h1>Other articles</h1>
            <div class="cols">
                @foreach($blogs as $blog)
                    <a href="{{$blog->slug}}">
                    <div class="col-1">
                        <img src="{{$blog->image}}" alt="">
                        @foreach($blog->translations as $item)
                            <p class="article-title">{{$item->title}}</p>
                        @endforeach
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/front/css/singlepage.css')}}">
@endpush
