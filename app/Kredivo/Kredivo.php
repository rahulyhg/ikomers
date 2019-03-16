<?php

namespace App\Kredivo;

/*
------------------------------------
Bikinan Asep Sholihin 2019-03-01 
asep.sholihin11@gmail.com
------------------------------------
*/

class Kredivo
{
    //For Testing
    const BASESANBOXURL = 'https://sandbox.kredivo.com/kredivo';

    //For Production
    const BASEPRODUCTIONURL = 'https://api.kredivo.com/kredivo';

    //API Version Kredivo
    const VERSION = 'v2';

    //For handle checkout page from kredivo
    const CHECKOUTENDPOINT = 'checkout_url';

    //For handle payment types available
    const PAYMENTTYPESENDPOINT = 'payments';

    //For confirm payment
    const CONFIRMENDPOINT = 'update';

    public function __construct()
    {
        $this->isProduction = config('kredivo.env_prodction');
        $this->serverKey    = config('kredivo.api_key');
    }

    public function getCheckoutUrl()
    {
        return $this->wrapUrl(self::CHECKOUTENDPOINT);
    }

    public function getPaymentTypesUrl()
    {
        return $this->wrapUrl(self::PAYMENTTYPESENDPOINT);
    }

    public function getConfirmUrl()
    {
        return $this->wrapUrl(self::CONFIRMENDPOINT);
    }

    private function wrapUrl($endpoint)
    {
        return sprintf('%s/%s/%s', $this->isProduction ? self::BASEPRODUCTIONURL : self::BASESANBOXURL, self::VERSION, $endpoint);
    }
}
