@extends('Front.Layouts.front')

@section('content')
    <div class="slider">
        <div id="image-container">
            @foreach($sliders as $item )
                {{--                @dd($item)--}}
                @foreach($item->blogs as $blog)
                    {{--                    @dd($blog)--}}
                    <a href="{{$blog->slug}}"><img src="{{$item->image}}" alt="Image 1"
                                                   class="active"></a>
                @endforeach
            @endforeach
        </div>
        <div class="buttons">

            <button id="prevBtn" onclick="prevImage()"><</button>
            <button id="nextBtn" onclick="nextImage()"> ></button>
        </div>
    </div>
    <div class="section1">
        <h1>Estetik Diş Hekimliği</h1>
        <div class="row">
            @foreach($quotes as $quote)

                <div class="col">
                    <img src="{{$quote->image}}"
                         alt="">
                    @foreach($quote->translations as $item)
                        <p class="title">{{$item->title}}</p>
                        <p>{{$item->description}}</p>
                    @endforeach
                </div>
            @endforeach

        </div>
    </div>
    <!-- sponsor slider start -->
    <div class="containerSponsor">
        <div class="swiper mySwiper my">
            <div class="swiper-wrapper">
                @foreach($sponsors as $sponsor)
                    <div class="swiper-slide">
                        <div class="ust-padding">
                            <div class="for-padding">
                                <img
                                    src="{{$sponsor->image}}">
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
    <!-- sponsor slider end -->
    <!-- YouTube start-->
    <div class="youtube">
        @foreach($youtube as $item)
            {{$item->url}}
        @endforeach
    </div>
    <!-- YouTube end-->
    <!-- Ekibimiz start -->
    <div class="ekibimiz-container">
        <h1>Ekibimiz</h1>
        <div class="swiper-2 mySwiper my2">
            <div class="swiper-wrapper">
                @foreach($teams as $team)
                    <div class="swiper-slide mz">
                        <div class="top-section">
                            <img src="{{$team->image}}">
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
    <!--Ekibimiz end-->
    <!--Estetik dis hekimligi start-->
    <div class="section2">
        <h2>Estetik Diş Hekimliği</h2>
        <div class="container1">
            @foreach($blogs as $blog)
                <a href="{{$blog->slug}}">
                    <div class="image-container">
                        <img src="{{$blog->image}}" alt="Image"
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
            {{--            <div class="image-container">--}}
            {{--                <img--}}
            {{--                    src="https://dentnis.com/wp-content/webp-express/webp-images/uploads/2023/05/bir-gunde-implant.png.webp"--}}
            {{--                    alt="Image" style="width: 100%; height: 100%;">--}}
            {{--                <div class="image-overlay"></div>--}}
            {{--                <div class="image-title">Gülüş tasarımı</div>--}}
            {{--                <div class="underline"></div>--}}
            {{--            </div>--}}
            {{--            <div class="image-container">--}}
            {{--                <img--}}
            {{--                    src="https://dentnis.com/wp-content/webp-express/webp-images/uploads/2023/05/pembe-estetik.png.webp"--}}
            {{--                    alt="Image" style="width: 100%; height: 100%;">--}}
            {{--                <div class="image-overlay"></div>--}}
            {{--                <div class="image-title">Gülüş tasarımı</div>--}}
            {{--                <div class="underline"></div>--}}
            {{--            </div>--}}
            {{--            <div class="image-container">--}}
            {{--                <img--}}
            {{--                    src="https://dentnis.com/wp-content/webp-express/webp-images/uploads/2023/05/implant-fiyatlari-image.png.webp"--}}
            {{--                    alt="Image" style="width: 100%; height: 100%;">--}}
            {{--                <div class="image-overlay"></div>--}}
            {{--                <div class="image-title">Gülüş tasarımı</div>--}}
            {{--                <div class="underline"></div>--}}
            {{--            </div>--}}
            {{--            <div class="image-container">--}}
            {{--                <img--}}
            {{--                    src="https://dentnis.com/wp-content/webp-express/webp-images/uploads/2023/05/gulus-tasarimi-fiyatlari-image.png.webp"--}}
            {{--                    alt="Image" style="width: 100%; height: 100%;">--}}
            {{--                <div class="image-overlay"></div>--}}
            {{--                <div class="image-title">Gülüş tasarımı</div>--}}
            {{--                <div class="underline"></div>--}}
            {{--            </div>--}}
            {{--            <div class="image-container">--}}
            {{--                <img--}}
            {{--                    src="https://dentnis.com/wp-content/webp-express/webp-images/uploads/2023/05/dis-dolgusu-fiyatlari-image.png.webp"--}}
            {{--                    alt="Image" style="width: 100%; height: 100%;">--}}
            {{--                <div class="image-overlay"></div>--}}
            {{--                <div class="image-title">Gülüş tasarımı</div>--}}
            {{--                <div class="underline"></div>--}}
            {{--            </div>--}}
        </div>
    </div>
    <!--Estetik dis hekimligi end-->
    <!--Article section start-->
    <div class="articles">
        <h2>Makaleler</h2>
        <div class="container1">
            <div class="col">
                <div class="image">
                    <img
                        src="https://dentnis.com/wp-content/webp-express/webp-images/uploads/2024/01/Adsiz-tasarim-1.jpg.webp"
                        alt="">
                </div>
                <div class="content">
                    <h2>Nişantaşı Gülüş Tasarımı (Gülüş Estetiği)</h2>
                    <p>Nişantaşı gülüş tasarımı diş estetiği ve kozmetik diş hekimliği adı altında yapılan bir tedaviler
                        bütünüdür. Bu tedavi ile hasta gülüşündeki eksiklikleri, istemediği durumları, görünümünü ve
                        dişin […]</p>
                    <button>Devamını oku</button>
                </div>
            </div>
            <div class="col">
                <div class="image">
                    <img
                        src="https://dentnis.com/wp-content/webp-express/webp-images/uploads/2023/12/implant-omru-ne-kadar.jpg.webp"
                        alt=""/>
                </div>
                <div class="content">
                    <h2>Nişantaşı Gülüş Tasarımı (Gülüş Estetiği)</h2>
                    <p>Nişantaşı gülüş tasarımı diş estetiği ve kozmetik diş hekimliği adı altında yapılan bir tedaviler
                        bütünüdür. Bu tedavi ile hasta gülüşündeki eksiklikleri, istemediği durumları, görünümünü ve
                        dişin […]</p>
                    <button>Devamını oku</button>
                </div>
            </div>
            <div class="col">
                <div class="image">
                    <img
                        src="https://dentnis.com/wp-content/webp-express/webp-images/uploads/2023/11/kaplama-disim-dustu.jpg.webp"
                        alt="">
                </div>
                <div class="content">
                    <h2>Nişantaşı Gülüş Tasarımı (Gülüş Estetiği)</h2>
                    <p>Nişantaşı gülüş tasarımı diş estetiği ve kozmetik diş hekimliği adı altında yapılan bir tedaviler
                        bütünüdür. Bu tedavi ile hasta gülüşündeki eksiklikleri, istemediği durumları, görünümünü ve
                        dişin […]</p>
                    <button>Devamını oku</button>
                </div>
            </div>
        </div>
    </div>
    <!--Article section end-->
@endsection
