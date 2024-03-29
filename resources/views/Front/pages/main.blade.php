@php use Illuminate\Support\Facades\Storage; @endphp
@extends('Layouts.front')

@section('content')
    <div class="slider">
        @if ($sliders->isNotEmpty())
            <div id="image-container">
                @foreach ($sliders as $item)
                    <img src="{{ Storage::url( $item->image) }}" alt="Slider Image" class="active">
                @endforeach
            </div>
        @endif
        <div class="buttons">

            <button id="prevBtn" onclick="prevImage()"><</button>
            <button id="nextBtn" onclick="nextImage()"> ></button>
        </div>
    </div>
    @if ($quotes->isNotEmpty())
        <div class="section1">
            <h1>{{__("Estetik Diş Hekimliği")}}</h1>
            <div class="row">
                @foreach($quotes as $quote)

                    <div class="col">
                        <img src="{{Storage::url($quote->image)}}"
                             alt="">
                        @foreach($quote->translations as $item)
                            <p class="title">{{$item->title}}</p>
                            <p>{{$item->description}}</p>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    @endif
    <!-- sponsor slider start -->
    @if ($sponsors->isNotEmpty())

        <div class="containerSponsor">
            <div class="swiper mySwiper my">
                <div class="swiper-wrapper">
                    @foreach($sponsors as $sponsor)
                        <div class="swiper-slide">
                            <div class="ust-padding">
                                <div class="for-padding">
                                    <img
                                        src="{{Storage::url($sponsor->image)}}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    @endif
    <!-- sponsor slider end -->
    <!-- YouTube start-->
    <div class="youtube">
        @foreach($youtube as $item)
            <iframe src="{{$item->url}}" title="Dentnis İmplantoloji ve Estetik Diş Kliniği"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>

        @endforeach
    </div>
    <!-- YouTube end-->
    <!-- Ekibimiz start -->
    @if ($teams->isNotEmpty())

        <div class="ekibimiz-container">
            <h1>{{__("Ekibimiz")}}</h1>
            <div class="swiper-2 mySwiper my2">
                <div class="swiper-wrapper">
                    @foreach($teams as $team)
                        <div class="swiper-slide mz">
                            <div class="top-section">
                                <img src="{{Storage::url($team->image)}}">
                            </div>
                            <div class="bottom-section">
                                <h3 class="doctor-name">
                                    {{$team->title}}
                                </h3>
                                <div class="ekibimiz-line"></div>
                                @foreach($team->translations as $item)
                                    <h5 class="doctor-position">
                                        {{$item->position}}
                                    </h5>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!--Ekibimiz end-->
    <!--Estetik dis hekimligi start-->
    @if ($blogs->isNotEmpty())

        <div class="section2">
            <h2>{{__("Estetik Diş Hekimliği")}}</h2>
            <div class="container1">
                @foreach($blogs as $blog)
                    <a href="{{ url("$blog->slug") }}">
                        <div class="image-container">
                            <img src="{{Storage::url($blog->image)}}" alt="Image"
                                 style="width: 100%; height: 100%;">
                            <div class="image-overlay"></div>
                            @foreach($blog->translations as $item)
                                {{--                            @dd($blog)--}}
                                <div class="image-title">{{$item->title}}</div>
                            @endforeach
                            <div class="underline"></div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
    <!--Estetik dis hekimligi end-->
    <!--Article section start-->
    @if ($blogs->isNotEmpty())

        <div class="articles">
            <h2>{{__("Makaleler")}}</h2>
            <div class="container1">
                @for ($i = 0; $i < 3; $i++)
                    @php
                        $blog = $blogs[$i] ?? null;
                    @endphp

                    <div class="col">
                        @if(isset($blog))
                            <div class="image">
                                <img src="{{ Storage::url($blog->image )}}" alt="">
                            </div>

                            <div class="content">
                                @foreach ($blog->translations as $item)
                                    <h2>{{ $item->title }}</h2>
                                    <p>{!! Str::limit(strip_tags($item->description), 200) !!}</p>
                                 @endforeach
                                <a href="{{ url("$blog->slug") }}">{{__("Devamını oku")}}</a>
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    @endif
    <!--Article section end-->
@endsection
