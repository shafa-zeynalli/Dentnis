<div class="header">
    <ul class="container1">
        <div class="image">
            <a href="{{route('front.main')}}">
            <img src="https://dentnis.com/wp-content/uploads/2022/06/dentnis-logo-2.svg" alt="logo">
            </a>
        </div>
        <div>
            <ul class="navbar">
{{--                @dd($categories);--}}
                @foreach ($categories as $category)
                    <li>
                        <a href=''><span> {{$category->translations->first()->name}} </span> </a>
                        <ul>
                            @foreach ($category->blogs as $blog)
                                <li>
                                    <a href="{{ url("$lang/$blog->slug") }}">{{ $blog->translations->first()->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach

                    <li>
                        <a href='{{route('front.about')}}'><span>Hakkimizda</span> </a>
                        <ul>
{{--                            @foreach ($category->blogs as $blog)--}}
{{--                                <li>--}}
{{--                                    <a href="">{{ $blog->translations->first()->title  }}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
                        </ul>
                    </li>
                    <li>
                        <a href='{{route('front.contact')}}'><span>Iletisim</span> </a>
                    </li>

                <a href="{{ url('/change-language/en') }}" class="{{ $lang == 'en' ? 'd-none' : '' }} lang"><img src="" alt="" id="en"></a>
                <a href="{{ url('/change-language/gr') }}" class="{{ $lang == 'gr' ? 'd-none' : '' }} lang"><img src="" alt="" id="gr"></a>
                <a href="{{ url('/change-language/tr') }}" class="{{ $lang== 'tr' ? 'd-none' : '' }} lang"><img alt="" src="" id="tr"></a>
            </ul>
            <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
    </ul>
</div>
