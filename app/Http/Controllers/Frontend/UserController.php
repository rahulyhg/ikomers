<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Models\Order;
use File;
use App\Http\Controllers\Admin\AdminSiteSettingController;

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
        $user = User::find($auth->customers_id);
        //dd($orders);
        return view('frontend.user.my-order', compact('orders','user'));
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

        $myVar = new AdminSiteSettingController();	
		$extensions = $myVar->imageType();
				
		if($request->hasFile('customers_picture') and in_array($request->customers_picture->extension(), $extensions)){
			$image = $request->customers_picture;
            $fileName = time().'.'.$image->getClientOriginalName();
            File::delete($user->customers_picture);
			$image->move('resources/assets/images/user_profile/', $fileName);
            $customers_picture = 'resources/assets/images/user_profile/'.$fileName;
            $user->customers_picture    = $customers_picture;
            $user->save();
            return redirect()->back()->with('message','Your bio has been updated'); 
		}
        
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
