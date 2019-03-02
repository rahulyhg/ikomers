<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $order;
    protected $product;
    protected $payment;

    public function __construct($order, $product, $payment)
    {
        //
        $this->order = $order;
        $this->product = $product;
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->view('mail.email-order')->with([
        'order' => $this->order, 'product' => $this->product, 'payment' => $this->payment
        ]);
    }
}
