<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Hash;
use Validator;
use App\Models\Order;
use File;
use Illuminate\Support\Facades\Input;
use Rajaongkir;
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
        $provinces = RajaOngkir::Provinsi()->all();
        return view('frontend.user.my-account', compact('user','address_book','provinces'));
    }

    public function updateAccount(Request $request) {
        $auth = Auth::user();
        $user = User::find($auth->customers_id);

        $input = $request->except(['_token','user_name','customers_telephone','email']);

        $myVar = new AdminSiteSettingController();	
		$extensions = $myVar->imageType();
				
        //dd($input);
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
        $input['entry_state'] = RajaOngkir::Provinsi()->search('province', $name = $request->entry_state)->get()[0]['province'];
        $input['entry_city'] = RajaOngkir::Kota()->search('city_name', $name = $request->entry_city)->get()[0]['city_name'];
        $city_id = RajaOngkir::Kota()->search('city_name', $name = $request->entry_city)->get()[0]['city_id'];
        $input['entry_suburb'] = RajaOngkir::Kecamatan()->byCity($city_id)->search('subdistrict_name', $name = $request->entry_suburb)->get()[0]['subdistrict_name'];
        $user->user_name            = $request->user_name;
        $user->customers_gender     = $request->entry_gender;
        $user->customers_telephone  = $request->customers_telephone;
        $user->save();

        $address_book = \DB::table('address_book')->where('customers_id', $user->customers_id)->first();
        if($address_book) {
            \DB::table('address_book')->where('customers_id', $user->customers_id)->update($input);
        } else {
            \DB::table('address_book')->insert($input);
        }
        return redirect()->back()->with('message','Your bio has been updated');
    }
    
    public function changePassword() {
        $auth = Auth::user();
        $user = User::find($auth->customers_id);

        return view('frontend.user.change-password', compact('user'));
    }
    
    public function postChangePassword(Request $request) {
        // // custom validator
        // Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
        //     return Hash::check($value, \Auth::user()->password);
        // });
 
        // // message for custom validation
        // $messages = [
        //     'password' => 'Invalid current password.',
        // ];
 
        // // validate form
        // $validator = Validator::make(request()->all(), [
        //     'current_password'      => 'required|password',
        //     'password'              => 'required|min:6|confirmed',
        //     'password_confirmation' => 'required',
 
        // ], $messages);
 
        // // if validation fails
        // if ($validator->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validator->errors());
        // }
 
        // // update password
        // $user = User::find(Auth::id());
 
        // $user->password = bcrypt(request('password'));
        // $user->save();
        
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
             
        if(strcmp($request->current_password, $request->new_password) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        if(!(strcmp($request->new_password, $request->new_password_confirm)) == 0){
            //New password and confirm password are not same
            return redirect()->back()->with("error","New Password should be same as your confirmed password. Please retype new password.");
        }
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();
            
        return redirect()->back()->with("success","Password changed successfully !");
    }
}
