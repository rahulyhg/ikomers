<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\EmailContactCustomer;

class SendContactCustomerEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;

    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $email = new EmailContactCustomer($this->user);
        try {
            //Mail::to('bantuan@endlessos.co.id')->send($email);
            Mail::to('kelasbisnis2015@gmail.com')->send($email);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('message', 'Something wrong, please try again.');
        }
    }
}
