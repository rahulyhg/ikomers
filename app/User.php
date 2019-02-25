<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Jobs\SendResetPasswordEmail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'customers';
	
    protected $fillable = [
        'customers_firstname', 'customers_lastname', 'email', 'password', 'email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	//use user id of admin
    protected $primaryKey = 'customers_id';
    
    public function sendPasswordResetNotification($token)
    {
        //dd(request()->email);
        $user = User::where('email', request()->email)->first();
        dispatch(new SendResetPasswordEmail($user, $token));
    }
}
