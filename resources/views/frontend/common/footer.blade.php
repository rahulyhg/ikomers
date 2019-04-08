<div class="coupons m-t-50">
    <div class="coupons-grids text-center">
        <div class="w3layouts_mail_grid">

            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>KODE PROMO</h3>
                    <p></p>
                    <p>Tetap pantau situs web dan akun media sosial kami untuk mendapatkan pemberitahuan kode promo</p>
                    <p></p>
                </div>
            </div>

            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>PESANAN DENGAN TOKO ONLINE</h3>
                    <p></p>
                    <p>Dapatkan harga spesial di toko online kami di Tokopedia dan Shopee</p>
                    <p></p>
                </div>
            </div>

            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa fa-headphones" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>DUKUNGAN PELANGGAN</h3>
                    <p></p>
                    <p>Kami menyediakan dukungan pelanggan online dari Senin hingga Sabtu pukul 08.00 pagi hingga 17.00 malam</p>
                    <p></p>
                </div>
            </div>

            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>GARANSI SEUMUR HIDUP</h3>
                    <p></p>
                    <p>Kami menjamin Endless OS dalam produk apa pun dengan garansi seumur hidup</p>
                    <p></p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>

<div class="footer">
    <div class="footer_agile_inner_info_w3l">
        <div class="col-md-3 footer-left">
            <a href="index.php"><img src="{!! asset('resources/views/frontend/images/logo/endless.png') !!}" class="img-responsive" /></a>
            <p>Ikuti media sosial kami untuk melihat acara kami, informasi baru, dan promosi terbaru.</p>
            <div class="w3-address">
                <div class="w3-address-grid">
                    <div class="w3-address-left">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                    <div class="w3-address-right">
                        <a href="https://www.instagram.com/endlessindonesia/" target="_blank"><h6>Endless Indonesia</h6></a>
                    </div>
                </div>
                <div class="w3-address-grid">
                    <div class="w3-address-left">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                    <div class="w3-address-right">
                        <a href="https://web.facebook.com/EndlessIndonesia" target="_blank"><h6>Endless Computers</h6></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9 footer-right">
            <div class="sign-grds">
                <div class="col-md-4 sign-gd">
                    <h4>Information </h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('how-to-buy') }}">Cara Membeli</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                        <li><a href="{{ route('payment-confirmation') }}">Konfirmasi Pembayaran</a></li>
                        <li><a href="{{ route('home') }}">Track Order</a></li>
                    </ul>
                </div>

                <div class="col-md-4 sign-gd-two">
                    <h4>Dukungan Pelanggan</h4>
                    <div class="w3-address">
                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="w3-address-right">
                                <h6>Nomor telepon</h6>
                                <p>{{ App\Models\Setting::getAttr('phone_no') }}</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="w3-address-grid">
                            <div class="w3-address-left">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="w3-address-right">
                                <h6>Alamat email</h6>
                                <p><a href="mailto:{{ App\Models\Setting::getAttr('contact_us_email') }}"> {{ App\Models\Setting::getAttr('contact_us_email') }}</a></p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 sign-gd flickr-post">
                    <h4>Lokasi</h4>
                    <div class="w3-address-grid">
                        <div class="w3-address-left">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="w3-address-right">
                            <h6>
                                {{ App\Models\Setting::getAttr('address') }}, {{ App\Models\Setting::getAttr('city') }}, {{ App\Models\Setting::getAttr('state') }}
                            </h6>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="text-right">
            <p class="copy-right">Ketentuan Penggunaan | Rahasia Pribadi | Endless OS  Kebijakan Redistribusi</p>
        </div>
    </div>
</div>
<!-- //footer -->