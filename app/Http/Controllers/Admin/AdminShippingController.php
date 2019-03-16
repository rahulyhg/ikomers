<?php
/*
Project Name: IonicEcommerce
Project URI: http://ionicecommerce.com
Author: VectorCoder Team
Author URI: http://vectorcoder.com/
*/
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Validator;
use App;
use Lang;
use DB;
use App\Administrator;

//for authenitcate login data
use Auth;


//for requesting a value 
use Illuminate\Http\Request;


class AdminShippingController extends Controller
{	
	//shippingMethods
	public function shippingmethods(Request $request){
		if(session('shipping_methods_view')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
		$title = array('pageTitle' => Lang::get("labels.ShippingMethods"));		
		
		if(!empty($request->id)){
			if($request->active=='no'){
				$status = '0';
			}elseif($request->active=='yes'){
				$status = '1';
			}
			DB::table('shipping_methods')->where('shipping_methods_id', '=', $request->id)->update([
				'status'		 =>	  $status
				]);	
		}
		
		$shipping_methods = DB::table('shipping_methods')
								->paginate(10);
		
		$result['shipping_methods'] = $shipping_methods;
		
		return view("admin.shippingmethods", $title)->with('result', $result);
		}
	}

	//shippingMethods
	public function addshippingmethods(){
		if(session('shipping_methods_view')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
			$title = array('pageTitle' => Lang::get("labels.ShippingMethods"));		
			return view("admin.addshippingmethods", $title);
		}
	}
	
	//shippingMethods
	public function editshippingmethods($id){
		if(session('shipping_methods_view')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
			$title = array('pageTitle' => Lang::get("labels.ShippingMethods"));	
			$shipping_methods = DB::table('shipping_methods')->where('shipping_methods_id', $id)->first();	
			$result['shipping_methods'] = $shipping_methods;
			return view("admin.editshippingmethods", $title)->with('result', $result);;
		}
	}

	//shippingMethods
	public function addShipping(Request $request){
		if(session('shipping_methods_view')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
			DB::table('shipping_methods')->insert($request->except('_token'));
			$message = Lang::get("labels.shippingUpdateMessage");
			return redirect()->back()->withErrors([$message]);
		}
	}
	
	
	//addNewTaxRate	
	public function defaultShippingMethod(Request $request){
		if(session('shipping_methods_update')==0){
			return Lang::get("labels.You do not have to access this route");
		}else{
			
			if(session('shipping_methods_update')==0){
				return Lang::get("labels.You do not have to access this route");
			}else{
			
				DB::table('shipping_methods')->update([
						'isDefault'  		 =>   0,
						]);
						
				DB::table('shipping_methods')->where('shipping_methods_id', '=', $request->shipping_id)->update([
						'isDefault'  		 =>   1,
						]);
								
				$message = 'changed';
				return $message;
			}
		}
	}
	
	//shipping_detail
	public function shippingDetail(Request $request){
		if(session('shipping_methods_view')==0){
			return Lang::get("labels.You do not have to access this route");
		}else{
		$title = array('pageTitle' => Lang::get("labels.FlateRate"));
		$result = array();		
		$result['message'] = array();
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$result['languages'] = $myVar->getLanguages();
		
		$shppingMethods = DB::table('shipping_methods')
							->where('table_name', $request->table_name)->get();
		
		$description_data = array();		
		foreach($result['languages'] as $languages_data){
			
			$description = DB::table('shipping_description')->where([
					['language_id', '=', $languages_data->languages_id],
					['table_name', '=', $request->table_name],
				])->get();
				
			if(count($description)>0){								
				$description_data[$languages_data->languages_id]['name'] = $description[0]->name;
				$description_data[$languages_data->languages_id]['language_name'] = $languages_data->name;
				$description_data[$languages_data->languages_id]['languages_id'] = $languages_data->languages_id;										
			}else{
				$description_data[$languages_data->languages_id]['name'] = '';
				$description_data[$languages_data->languages_id]['language_name'] = $languages_data->name;
				$description_data[$languages_data->languages_id]['languages_id'] = $languages_data->languages_id;	
			}
		}
		
		$result['description'] = $description_data;	
		$result['shppingMethods'] = $shppingMethods;
		
		return view("admin.shippingDetail", $title)->with('result', $result);
		}
	}
	
	//updateShipping
	public function updateShipping(Request $request){
		if(session('shipping_methods_update')==0){
			return Lang::get("labels.You do not have to access this route");
		}else{
		$last_modified 	=   date('y-m-d h:i:s');
		DB::table('shipping_methods')->where('shipping_methods_id', '=', $request->shipping_methods_id)->update($request->except('_token'));
		
		$message = Lang::get("labels.shippingUpdateMessage");
		return redirect()->back()->withErrors([$message]);
		}
	}

	public function deleteshippingmethods(Request $request){
		if(session('shipping_methods_update')==0){
			return Lang::get("labels.You do not have to access this route");
		}else{
		DB::table('shipping_methods')->where('shipping_methods_id', '=', $request->shipping_methods_id)->delete();
		
		$message = Lang::get("labels.shippingUpdateMessage");
		return redirect()->back()->withErrors([$message]);
		}
	}
	
	
	
}
