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

                {{--                @dd($categoriesAll)--}}

                @foreach ($categoriesAll as $category)
                    <li>
                        @if ($category->translations->isNotEmpty())
                            <a href=''><span> {{$category->translations->first()->name}} </span> </a>
                        @endif


                        <ul>
                            @foreach ($category->blogs as $blog)
                                @if ($blog->translations->isNotEmpty())
                                    <li>
                                        <a href="{{ url("$blog->slug") }}">{{ $blog->translations->first()->title}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach


                <li>
                    <a href='{{route('front.about')}}'><span>{{ __('Hakkımızda') }}</span> </a>
                    <ul>
                        @foreach ($aboutMenu as $menu)
                            @if ($menu->translations->isNotEmpty())
                            <li>
                                <a href="{{$menu->slug}}">{{ $menu->translations->first()->title  }}</a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href='{{route('front.contact')}}'><span>{{ __('İletişim') }}</span> </a>
                </li>


                @foreach($languages as $language)
                    <a href='{{ url('/change-language/' . $language->lang) }}'
                       class="{{ $lang == $language->lang ? 'd-none' : '' }} lang"><img
                            src="{{ url('storage/' . $language->image) }}" alt="Language image"></a>
                @endforeach

                {{--                <a href="{{ url('/change-language/en') }}" class="{{ $lang == 'en' ? 'd-none' : '' }} lang"><img src="" alt="" id="en"></a>--}}
                {{--                <a href="{{ url('/change-language/gr') }}" class="{{ $lang == 'gr' ? 'd-none' : '' }} lang"><img src="" alt="" id="gr"></a>--}}
                {{--                <a href="{{ url('/change-language/tr') }}" class="{{ $lang== 'tr' ? 'd-none' : '' }} lang"><img alt="" src="" id="tr"></a>--}}
            </ul>
            <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
    </ul>
</div>
