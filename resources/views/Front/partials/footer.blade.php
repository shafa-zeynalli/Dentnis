<footer class="footerMain">
    <div class="top-footer">
        <h2>Diş Estetiği ile ilgili sorunlarınız mı var?</h2>
        <a>Contact us</a>
    </div>
    <div class="bottom-footer">
        <div class="upper">
            <div class="logo-part">
                <img src="https://dentnis.com/wp-content/uploads/2023/02/dentnis-logo-white-1.png" alt="">
                <div class="address">
                    <p class="address-line">Adres: Valikonağı Caddesi, Narin Apartmanı</p>
                    <p class="phone-number">Telefon: +90 (212) 246 09 03</p>
                    <p class="email">Mail: info@dentnis.com</p>
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
            <p>© 2024 Tüm hakları www.dentnis.com’a aittir.</p>
            <p>Dentnis.com'da yer alan tüm içerikler sadece kullanıcıyı bilgilendirmek amacı ile sunulmuş olup tıbbi
                tedavi anlamında tavsiye niteliği taşımamaktadır.</p>
        </div>
    </div>
</footer>
