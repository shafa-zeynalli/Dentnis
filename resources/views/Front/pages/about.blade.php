@extends('Layouts.front')

@section('content')
    <div class="all">
        <div class="navall">
            <div class="subhover">
                <h1 class="title" style="font-size: 16px">{{__("Hakkımızda")}}</h1>
                <a href=""
                   style="font-size: 16px; color: white; margin-right:20px;text-decoration: none">{{__("Anasayfa")}}</a>
                <span style="font-size: 16px;margin-right:15px ">></span>
                <span style="font-size: 16px">{{__("Hakkımızda")}}</span>
            </div>
        </div>
        <div class="wraparrall">

            <swiper-container class="mySwiper" navigation="true" pagination="true" keyboard="true" mousewheel="true"
                              css-mode="true">
                <swiper-slide><img
                        src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-5-e1678089864887.webp"
                        alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-4.webp"
                                   alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-4.webp"
                                   alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-1.webp"
                                   alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-3.webp"
                                   alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-2.webp"
                                   alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-1.webp"
                                   alt=""></swiper-slide>
            </swiper-container>

            @foreach($about as $item)
                @if($item->translations->isNotEmpty() && $description = $item->translations->first()->description)
                    <div> {!! $item->translations->first()->description !!} </div>
                @endif
            @endforeach

        </div>

    </div>
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/about.css')}}">
@endpush
@push('script')
    <link rel="stylesheet" href="{{asset('assets/front/js/about.js')}}">
@endpush
