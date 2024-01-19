@extends('Front.Layouts.front')

@section('content')
    <div class="all">
        <div class="navall" >
            <div class="subhover">
                <h1 class="title" style="font-size: 16px">Hakkımızda</h1>
                <a href="" style="font-size: 16px; color: white; margin-right:20px;text-decoration: none">Anasayfa</a>
                <span style="font-size: 16px;margin-right:15px ">></span>
                <span style="font-size: 16px">Hakkımızda</span>
            </div>
        </div>
        <div class="wraparrall">
            <div class="wrapperall ">
                <h2 class="about">Hakkımızda</h2>
                <p>Hakkımızda; Bizim için sağlıklı ve estetik bir gülümsemeye sahip olmanız çok önemlidir.</p>
                <p>"Gülümsemeniz iç güzelliğinizin bir tezahürüdür.&nbsp;Bu güzelliği ortaya çıkarma hedefiyle Estetik Diş Hekimi <a href="https://www.instagram.com/doktornarin/"><strong>Dt. Abdulkadir Narin</strong></a> ve ekibi 2011 yılında DentNis İmplantoloji ve Estetik Diş Kliniğini kurmuştur. Bu hedef doğrultusunda;</p>

                <ul>
                    <li><a data-mil="67" href="https://dentnis.com/hollywood-smile-hollywood-gulusu/"><strong>Hollywood smile ile Gülüş Tasarımı</strong></a><strong>,</strong></li>
                    <li><a data-mil="67" href="https://dentnis.com/bonding-nedir/"><strong>Bonding estetik diş ve diş hekimliği uygulamaları,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/dis-estetigi-ile-genclesmek-mumkun/"><strong>İmplant diş estetiği uygulamalari,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/bir-gunde-implant/"><strong>Bir günde implant ve diş protezi,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/implant-tedavisi/"><strong>Estetik implant diş rehabilitasyonlari,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/laminate-veneer-nisantasi-istanbul/"><strong>Lamina, lamine ve lamineyt yaprak dişler,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/zirkonyum-dis-kaplama-tedavisi/"><strong>Zirkonyum diş tedavileri,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/dis-beyazlatma/"><strong>Diş beyazlatma ve bleaching,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/pembe-estetik/"><strong>Pembe estetik uygulamaları,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/ortodonti-nedir-tedavi-yontemleri-nelerdir/"><strong>Estetik ortodontik tedaviler,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/kozmetik-dis-hekimligi-nedir-tedavileri-nelerdir/"><strong>Koruyucu diş hekimliği uygulamaları ve estetik dolgu tedavileri,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/agiz-dis-ve-cene-cerrahisi/"><strong>Çene cerrahisi ve periyodontal cerrahi tedavileri,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/all-on-four-implant/"><strong>Kemik noksanlığı, diş – çene kemik augmentasyonları,</strong></a></li>
                    <li><a data-mil="67" href="https://dentnis.com/masseter-botoks/"><strong>Dental botoks gibi en iyi estetik diş tedavilerini uyguluyoruz.</strong></a></li>
                </ul>
                <p>Güzelliğe olan aşk ve tutku içinde her bir vakaya ideal çözümler sunma ve uygulama fırsatını bize veren değerli hastalarımıza minnettarız."</p>
                <p><a href="https://www.youtube.com/watch?v=IhZR5_vYY6g">DentNis'te bir günümüz.</a></p>
            </div>

            <swiper-container class="mySwiper" navigation="true" pagination="true" keyboard="true" mousewheel="true"
                              css-mode="true">
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-5-e1678089864887.webp" alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-4.webp" alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-4.webp" alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-1.webp" alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-3.webp" alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-2.webp" alt=""></swiper-slide>
                <swiper-slide><img src="https://dentnis.com/wp-content/uploads/2023/01/abdulkadir-narin-image-1.webp" alt=""></swiper-slide>
            </swiper-container>

            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        </div>
        <div class="iframe">
            <iframe src="https://www.youtube.com/embed/GkXLn7nbYxs" frameborder="0" width="100%" height="400"></iframe>
        </div>
    </div>
        @endsection

        @push('styles')
            <link rel="stylesheet" href="{{asset('assets/front/css/about.css')}}">
        @endpush
        @push('script')
            <link rel="stylesheet" href="{{asset('assets/front/js/about.js')}}">
    @endpush
