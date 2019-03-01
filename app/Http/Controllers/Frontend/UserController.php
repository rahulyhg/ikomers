<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Order;

class UserController extends Controller
{
    //
    public function __construct()

    {

        $this->middleware('auth');

    }

    public function order() {
        $auth = Auth::user();
        $orders = Order::where('customers_id', $auth->customers_id)->get();
        //dd($orders);
        return view('frontend.user.my-order', compact('orders'));
    }

    public function account() {
        $auth = Auth::user();
        $user = User::find($auth->customers_id);
        $address_book = \DB::table('address_book')->where('customers_id', $user->customers_id)->first();
        return view('frontend.user.my-account', compact('user','address_book'));
    }

    public function updateAccount(Request $request) {
        $auth = Auth::user();
        $user = User::find($auth->customers_id);
        $user->user_name            = $request->user_name;
        $user->customers_gender     = $request->entry_gender;
        $user->customers_telephone  = $request->customers_telephone;
        $user->save();

        $address_book = \DB::table('address_book')->where('customers_id', $user->customers_id)->first();
        if($address_book) {
            \DB::table('address_book')->where('customers_id', $user->customers_id)->update($request->except(['_token','user_name','customers_telephone','email']));
        } else {
            \DB::table('address_book')->insert($request->except(['_token','user_name','customers_telephone','email']));
        }
        return redirect()->back()->with('message','Your bio has been updated');
    }
}
