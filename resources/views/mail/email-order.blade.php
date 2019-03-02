<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Endless Indonesia</title>
</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
      <tbody>
        <tr>
            <td style="vertical-align: top; padding-bottom:30px;" align="center">
                <a href="http://endlessos.co.id" target="_blank">
                  <img src="http://endlessos.co.id/resources/views/frontend/images/logo/endless.png" width="200" alt="EndlessOS" style="border:none">
                </a>
            </td>
        </tr>
      </tbody>
    </table>
    <div style="padding: 40px; background: #fff;">
      <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
        <tbody>
          <tr>
            <td>
                <p>
                    Hai {{ $order->customers_name }}
                </p>
                
                <h4>Mohon segera selesaikan pembayaran pesanan berikut</h4>

                <p>Checkout berhasil pada tanggal {{ \Carbon\Carbon::parse($order->date_purchased)->format('l, d F Y H:i') }} WIB></p>
                <p>Detail pemesanan</p>  

                <table border="0">
                  <tr>
                    <td>Nama produk</td>
                    <td></td>
                    <td>{{ $product->products_name }}</td>
                  </tr>
                  <tr>
                    <td>Qty</td>
                    <td></td>
                    <td>{{ $product->products_quantity }}</td>
                  </tr>
                  <tr>
                    <td>Pengiriman</td>
                    <td></td>
                    <td>JNE Reguler</td>
                  </tr>
                  <tr>
                    <td>Total Pembayaran</td>
                    <td></td>
                    <td>Rp {{ number_format($product->final_price) }},-</td>
                  </tr>
                  <tr>
                    <td>Batas waktu Pembayaran</td>
                    <td></td>
                    <td>{{ \Carbon\Carbon::parse($order->date_purchased)->format('l, d F Y H:i') }} 1x24 jam</td>
                  </tr>
                  <tr>
                    <td>Metode Pembayaran</td>
                    <td></td>
                    <td>transfer Bank Permata <br>
                        No Rek. 01811600888<br>
                        a/n PT Teknologi Informasi Tanpa Batas</td>
                  </tr>
                  <tr>
                    <td>Status Pembayaran</td>
                    <td></td>
                    <td>Menunggu Pembayaran</td>
                  </tr>
                  <tr>
                    <td>Invoice Pembayaran</td>
                    <td></td>
                    <td>{{ 	$order->invoice_number }}</td>
                  </tr>
                </table>
                
                <br><br>
                <i>
                    Salam Hangat<br>
                    Endless Indonesia<br><br>
                </i>

                <p>Connect with us! Follow Endless Indonesia di Facebook (https://www.facebook.com/EndlessIndonesia) atau Instagram (https://www.instagram.com/endlessindonesia/?hl=id) sekarang juga. Butuh bantuan? Email kami di support@endlessm.com</p>
                
                <sub>
                    Mohon untuk tidak membalas karena email ini dikirimkan secara otomatis oleh sistem. Tambahkan noreply@endlessos.co.id ke daftar kontak Anda agar tidak masuk ke dalam daftar spam
                </sub>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
      <p>Endless Indonesia</p>
    </div>
  </div>
</div>
</body>
</html>