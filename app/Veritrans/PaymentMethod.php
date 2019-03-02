<?php

/*
------------------------------------
Bikinan Asep Sholihin 2019-03-01 
asep.sholihin11@gmail.com
------------------------------------
*/

namespace App\Veritrans;
use App\Exceptions\VeritransException as Exception;
use App\Veritrans\Veritrans;

class PaymentMethod {

    public function __construct()
    {   
        Veritrans::$serverKey = env('MIDTRANS_SERVER_KEY', 'default');
        Veritrans::$isProduction = env('MIDTRANS_PRODUCTION', 'false');
    }

    public static function getInfo($invoice_number) {
        $vt = new Veritrans;
        $payment_info = $vt->status($invoice_number);
        if(isset($payment_info->va_numbers)){
            $method = "
            <strong>Bank Transfer</strong>
            <table width=\"100%\">
            <tr>
                <td>Bank</td>
                <td>".strtoupper($payment_info->va_numbers[0]->bank)."</td>
            </tr>
            <tr>
                <td>Virtual Account No</td>
                <td>".$payment_info->va_numbers[0]->va_number."</td>
            </tr>
            <tr>
                <td>Batas Pembayaran</td>
                <td>".\Carbon\Carbon::parse($payment_info->transaction_time)->format('d F Y - H:i:s')."</td>
            </tr>
            </table>
            ";
        } elseif(isset($payment_info->permata_va_number)) {
            $method = "
            <strong>Bank Transfer</strong>
            <table width=\"100%\">
            <tr>
                <td>Bank</td>
                <td>Permata</td>
            </tr>
            <tr>
                <td>Virtual Account No</td>
                <td>".$payment_info->permata_va_number."</td>
            </tr>
            <tr>
                <td>Batas Pembayaran</td>
                <td>".\Carbon\Carbon::parse($payment_info->transaction_time)->format('d F Y - H:i:s')."</td>
            </tr>
            </table>
            ";
        } elseif(isset($payment_info->bill_key)) {
            $method = "
            <strong>E-Channel</strong>
            <table width=\"100%\">
            <tr>
                <td>Kode Perusahaan</td>
                <td>".$payment_info->biller_code."</td>
            </tr>
            <tr>
                <td>Kode Pembayaran</td>
                <td>".$payment_info->bill_key."</td>
            </tr>
            <tr>
                <td>Batas Pembayaran</td>
                <td>".\Carbon\Carbon::parse($payment_info->transaction_time)->format('d F Y - H:i:s')."</td>
            </tr>
            </table>
            ";
        } elseif($payment_info->payment_type == "bca_klikbca") {
            $method = "
            <strong>KlikBCA</strong>
            <table width=\"100%\">
            <tr>
                <td>Approval Code</td>
                <td>".$payment_info->approval_code."</td>
            </tr>
            <tr>
                <td>Batas Pembayaran</td>
                <td>".\Carbon\Carbon::parse($payment_info->transaction_time)->format('d F Y - H:i:s')."</td>
            </tr>
            </table>
            ";
        } elseif($payment_info->payment_type == "mandiri_clickpay") {
            $method = "
            <strong>Mandiri Clickpay</strong>
            <table width=\"100%\">
            <tr>
                <td>Approval Code</td>
                <td>".$payment_info->approval_code."</td>
            </tr>
            <tr>
                <td>Batas Pembayaran</td>
                <td>".\Carbon\Carbon::parse($payment_info->transaction_time)->format('d F Y - H:i:s')."</td>
            </tr>
            </table>
            ";
        } elseif($payment_info->payment_type == "cstore") {
            $method = "
            <strong>".ucfirst($payment_info->store)."</strong>
            <table width=\"100%\">
            <tr>
                <td>Bayar ke</td>
                <td>".ucfirst($payment_info->store)."</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>".$payment_info->payment_code."</td>
            </tr>
            <tr>
                <td>Batas Pembayaran</td>
                <td>".\Carbon\Carbon::parse($payment_info->transaction_time)->format('d F Y - H:i:s')."</td>
            </tr>
            </table>
            ";
        }

        return $method;
    }
    
}