<?php

namespace App\Kredivo;

use GuzzleHttp\Client;
use App\Kredivo\Kredivo;
use Illuminate\Http\Request;

/*
------------------------------------
Bikinan Asep Sholihin 2019-03-01 
asep.sholihin11@gmail.com
------------------------------------
*/

class Api
{

    private $client;
    private $kredivo;
    
    //Api Constructor
    public function __construct()
    {
        $isProduction = config('kredivo.env_prodction');
        $serverKey    = config('kredivo.api_key');

        $this->client  = new Client();
        $this->kredivo = new Kredivo($isProduction, $serverKey);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function checkout()
    {
        $data = session()->get('data');
        $data['server_key'] = $this->kredivo->serverKey;
        //dd($data);
        return $this->postResponse($this->kredivo->getCheckoutUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function paymentTypes($data)
    {
        $data['server_key'] = $this->kredivo->serverKey;
        return $this->postResponse($this->kredivo->getPaymentTypesUrl(), $data);
    }

    /**
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function confirm($data)
    {
        return $this->getResponse($this->kredivo->getConfirmUrl(), $data);
    }

    /**
     * @param $url
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function postResponse($url, $data)
    {
        $response = $this->client->post($url, [
            'json' => $data,
        ]);
        $url = json_decode($response->getBody()->getContents());
        dd($url);
        return redirect($url->redirect_url);
    }


    /**
     * @param $url
     * @param $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function getResponse($url, $data)
    {
        $response = $this->client->get($url, [
            'query' => $data,
        ]);

        $url = json_decode($response->getBody()->getContents());
        return redirect($url->redirect_url);
    }
}
