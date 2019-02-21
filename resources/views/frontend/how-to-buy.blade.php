@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
  <div class="container dottedline-bheim">
      <h3 style="text-transform: unset;">How <span>to Buy </span></h3>
      <!--/w3_short-->
      <div class="services-breadcrumb">
          <div class="agile_inner_breadcrumb">
              <ul class="w3_short">
                  <li><a href="index.html">Home</a><i>|</i></li>
                  <li>How to Buy</li>
              </ul>
          </div>
      </div>
      <!--//w3_short-->
  </div>
</div>

<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-t-40 text-center">
                <img src="{{ asset('resources/views/frontend/images/ic_browse.png') }}" width="86" alt="ic_browse">
                <h3 class="m-t-20 product-attr">Browse & Choose</h3>
                <p class="m-t-10">Jelajahi Toko Online kami dan pilih produk yang kamu inginkan.</p>
            </div>
            <div class="col-md-12 m-t-40 text-center">
                <img src="{{ asset('resources/views/frontend/images/ic_checkout.png') }}" width="86" alt="ic_browse">
                <h3 class="m-t-20 product-attr">Checkout</h3>
                <p class="m-t-10">Saat kamu sudah menemukan produk pilihanmu, klik "Tambahkan ke Keranjang". <br>
                    Untuk kembali melihat keranjang belanja mu, klik “Keranjang Belanja”.<br>
                    Dan klik “Checkout” saat kamu sudah selesai berbelanja.</p>
            </div>
            <div class="col-md-12 m-t-40 text-center">
                <img src="{{ asset('resources/views/frontend/images/ic_form.png') }}" width="86" alt="ic_browse">
                <h3 class="m-t-20 product-attr">Isi Data Dirimu</h3>
                <p class="m-t-10">Kamu wajib mengisi data pribadi dan data pengiriman saat kamu membuat pesanan.<br>
                    Ketika kamu sudah selesai mengisi data-data tersebut, klik “Proses Order”.</p>
            </div>
            <div class="col-md-12 m-t-40 text-center">
                <img src="{{ asset('resources/views/frontend/images/ic_payment.png') }}" width="86" alt="ic_browse">
                <h3 class="m-t-20 product-attr">Pembayaran dan Konfirmasi</h3>
                <p class="m-t-10">Pilih metode pembayaranmu: <br>
                    Bank Transfer, Visa/ Mastercard, PayPal, Kredivo or Akulaku<br>
                    Di halaman ini kamu juga bisa memilih opsi pengiriman. <br>
                    Selanjutnya, konfirmasi pembayaranmu dengan klik “Konfirmasi Pembayaran” <br>
                    dalam 48 jam setelah pesanan dibuat.</p>
            </div>
            <div class="col-md-12 m-t-40 text-center">
                <img src="{{ asset('resources/views/frontend/images/ic_complete_buy.png') }}" width="86" alt="ic_browse">
                <h3 class="m-t-20 product-attr">Pemesanan Selesai!</h3>
                <p class="m-t-10">Sekarang kamu tinggal menunggu barang pesananmu sampai.<br>
                    Jangan lupa bagikan pengalamanmu saat menggunakan Endless di media sosial mu,<br>
                   gunakan tagar #WithEndlessICan!</p>
            </div>
        </div>
    </div>
</div>
<!--//contact-->
@endsection