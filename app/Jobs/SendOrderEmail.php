<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\EmailOrder;

class SendOrderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new EmailOrder($this->order, $this->product, $this->payment);
        try {
            Mail::to($this->order->email)->send($email);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('message', 'Something wrong, please try again.');
        }
    }
}
