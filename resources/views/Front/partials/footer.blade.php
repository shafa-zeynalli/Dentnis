<footer class="footerMain">
    <div class="top-footer">
        <h2>{{__("Diş Estetiği ile ilgili sorunlarınız mı var?")}}</h2>
        <a href="{{route('front.contact')}}">{{__("Bize Ulaşın")}}</a>
    </div>
    <div class="bottom-footer">
        <div class="upper">
            <div class="logo-part">
                <img src="https://dentnis.com/wp-content/uploads/2023/02/dentnis-logo-white-1.png" alt="">
                <div class="address">
                    @foreach($settings as $setting)
                    <p class="address-line">{{__("Adres")}}: {{$setting->address}}</p>
                    <p class="phone-number">{{__("Telefon")}}: {{$setting->phone}}</p>
                    <p class="email">{{__("Mail")}}: {{$setting->mail}}</p>
                    @endforeach
                </div>
            </div>
            <div class="titles-part">
                <div class="column">
                    @foreach ($blogsGeneral->chunk(5) as $chunk)
                        <div class="col-3">
                            @foreach ($chunk as $blog)
                                @foreach ($blog->translations as $item)
                                    <p><a href="{{ url("$lang/$blog->slug") }}" class="footer-li">{{ $item->title }}</a></p>
                                @endforeach
                            @endforeach
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="lower">
            <p>© 2024 {{__("Tüm hakları www.dentnis.com’a aittir.")}}</p>
            <p>{{__("Dentnis.com'da yer alan tüm içerikler sadece kullanıcıyı bilgilendirmek amacı ile sunulmuş olup tıbbi
                tedavi anlamında tavsiye niteliği taşımamaktadır.")}}</p>
        </div>
    </div>
</footer>
