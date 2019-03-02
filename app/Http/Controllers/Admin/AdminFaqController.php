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
//for password encryption or hash protected
use Hash;
use App\Administrator;

//for authenitcate login data
use Auth;



//for requesting a value 
use Illuminate\Http\Request;


class AdminFaqController extends Controller
{
	public function allCategories($language_id){
		$categories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories.categories_image as image',  'categories.date_added as date_added', 'categories.last_modified as last_modified', 'categories_description.categories_name as name', 'categories.categories_slug as slug')
		->where('categories_description.language_id','=', $language_id )->where('parent_id', '0')->get();
		
		$results = array();
		$index = 0;
		foreach($categories  as $category){
			array_push($results,$category);
			
			$subCategories = DB::table('categories')
			->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
			->select('categories.categories_id as sub_id', 'categories.categories_image as sub_image',  'categories.date_added as sub_date_added', 'categories.last_modified as sub_last_modified', 'categories_description.categories_name as sub_name', 'categories.categories_slug as sub_slug')
			->where('categories_description.language_id','=', $language_id )->where('parent_id', $category->id)->get();
			$results[$index]->sub_categories = $subCategories;
			$index++;
		}	
		return($results);		
	}
	
	public function getCategories($language_id){
		
		$listingCategories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories.categories_image as image',  'categories.date_added as date_added', 'categories.last_modified as last_modified', 'categories_description.categories_name as name', 'categories.categories_slug as slug')
		->where('categories_description.language_id','=', $language_id )->where('parent_id', '0')->get();
		return($listingCategories) ;
	}
	
	public function getSubCategories($language_id){
		
		$language_id     =   $language_id;		
		$listingCategories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories.categories_image as image',  'categories.date_added as date_added', 'categories.last_modified as last_modified', 'categories_description.categories_name as name', 'categories.categories_slug as slug')
		->where('categories_description.language_id','=', $language_id )->where('parent_id','>', '0')->get();
		return($listingCategories);
	}
	
	public function faq(){
		if(session('faq_view')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
			
		$title = array('pageTitle' => 'Frequently Ask Questions');
		
		$faqs = DB::table('faq')->paginate(10);
		
		return view("admin.faq",$title)->with('faqs', $faqs);
		}
	}
	
	//add category
	public function addfaq(Request $request){
		$title = array('pageTitle' => 'Add Frequently Ask Questions');
		
		$result = array();
		$result['message'] = array();
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$categories = DB::table('faq_categories')
		->where('parent_id', '0')->where('language_id','=', 1)->get();
		$result['categories'] = $categories;
		$result['languages'] = $myVar->getLanguages();
		
		return view("admin.addfaq",$title)->with('result', $result);
	}
	
	//addNewCategory	
	public function addnewfaq(Request $request){
		//dd($request->all());
		if(session('faq_create')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
			
		$title = array('pageTitle' => 'Add Frequently Ask Questions');
		
		$result = array();
		$date_added	= date('y-m-d h:i:s');
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();

		//multiple lanugauge with record 
		foreach($languages as $languages_data){
			$question = 'question_'.$languages_data->languages_id;
			$answer = 'answer_'.$languages_data->languages_id;

			DB::table('faq')->insert([
				'faq_category_id' => $request->faq_category_id,
				'question'	 => $request->$question,
				'answer'	 => $request->$answer,
				'language_id'=> $languages_data->languages_id,
				'date_added' => $date_added
			]);
		}		
				
		$message = "FAQ has been added successfull!";
				
		return redirect()->back()->withErrors([$message]);
		}
	}
	
	//editCategory
	public function editfaq($faq_id){		
		$title = array('pageTitle' => 'Edit Frequently Ask Questions');
		$result = array();		
		$result['message'] = array();
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$result['languages'] = $myVar->getLanguages();
		
		$editFAQ = DB::table('faq')
		->where('faq_id', $faq_id)->get();
		
		foreach($result['languages'] as $languages_data){
			
			$description = DB::table('faq')->where([
					['language_id', '=', $languages_data->languages_id],
					['faq_id', '=', $faq_id],
				])->get();
				
			if(count($description)>0){								
				$description_data[$languages_data->languages_id]['question'] = $description[0]->question;
				$description_data[$languages_data->languages_id]['answer'] = $description[0]->answer;
				$description_data[$languages_data->languages_id]['language_name'] = $languages_data->name;
				$description_data[$languages_data->languages_id]['languages_id'] = $languages_data->languages_id;										
			}else{
				$description_data[$languages_data->languages_id]['question'] = '';
				$description_data[$languages_data->languages_id]['answer'] = '';
				$description_data[$languages_data->languages_id]['language_name'] = $languages_data->name;
				$description_data[$languages_data->languages_id]['languages_id'] = $languages_data->languages_id;	
			}
		}
		$result['description'] = $description_data;	
		$result['editFAQ'] = $editFAQ;	
		$categories = DB::table('faq_categories')
		->where('parent_id', '0')->where('language_id','=', 1)->get();
		$result['categories'] = $categories;	
		
		return view("admin.editfaq", $title)->with('result', $result);
	}
	
	//updateCategory
	public function updatefaq(Request $request){		
		if(session('faq_update')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
			
		$title = array('pageTitle' => 'Edit Frequently Ask Questions');
		$last_modified 	=   date('y-m-d h:i:s');
		$faq_id = $request->faq_id;
		$result = array();					
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();
		
		foreach($languages as $languages_data){
			$question = 'question_'.$languages_data->languages_id;
			$answer = 'answer_'.$languages_data->languages_id;
			
			$checkExist = DB::table('faq')->where('faq_id','=',$faq_id)->where('language_id','=',$languages_data->languages_id)->get();			
			if(count($checkExist)>0){
				DB::table('faq')->where('faq_id','=',$faq_id)->where('language_id','=',$languages_data->languages_id)->update([
					'question'	=>   $request->$question,
					'answer'	=>   $request->$answer,
					'last_modified' =>   $last_modified,
					]);
			}else{
				DB::table('faq')->insert([
					'question'		=>   $request->$question,
					'answer'		=>   $request->$answer,
					'language_id'	=>   $languages_data->languages_id,
					'faq_id'		=>   $faq_id,
					]);
			}
		}
		
		$message = 'FAQ has been updated successfull!';
		return redirect()->back()->withErrors([$message]);
		}
	}
	
	
	//delete category
	public function deletefaq($faq_id){
		if(session('faq_delete')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
		
		DB::table('faq')->where('faq_id', $faq_id)->delete();
		
		$message = 'FAQ has been deleted successfull!';
				
		return redirect()->back()->withErrors([$message]);
		}
	}
	
	
	
	public function faqcategories(){
		if(session('faq_view')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
			
		$title = array('pageTitle' => 'Frequently Ask Questions Category');
		
		$faqs = DB::table('faq_categories')->paginate(10);
		
		return view("admin.faqcategories",$title)->with('faqs', $faqs);
		}
	}
	
	//add category
	public function addfaqcategory(){
		$title = array('pageTitle' => 'Add Frequently Ask Questions Category');
		
		$result = array();
		$result['message'] = array();
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$categories = DB::table('faq_categories')
		->where('parent_id', '0')->where('language_id','=', 1)->get();
		$result['categories'] = $categories;
		$result['languages'] = $myVar->getLanguages();
		
		return view("admin.addfaqcategory",$title)->with('result', $result);
	}
	
	//addNewCategory	
	public function addnewfaqcategory(Request $request){
		//dd($request->all());
		if(session('faq_create')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
			
		$title = array('pageTitle' => 'Add Frequently Ask Questions Category');
		
		$result = array();
		$date_added	= date('y-m-d h:i:s');
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();

		$slug_flag = false;
		//multiple lanugauge with record 
		foreach($languages as $languages_data){
			$faq_category_name = 'faq_category_name_'.$languages_data->languages_id;

			$faq_category_id = DB::table('faq_categories')->insertGetId([
				'faq_category_name' => $request->$faq_category_name,
				'language_id'=> $languages_data->languages_id,
				'date_added' => $date_added
			]);
		}	
		foreach($languages as $languages_data){
			$faq_category_name = 'faq_category_name_'.$languages_data->languages_id;
			
			//slug
			if($slug_flag==false){
				$slug_flag=true;
				
				$slug = $request->$faq_category_name;
				$old_slug = $request->$faq_category_name;
				
				$slug_count = 0;
				do{
					if($slug_count==0){
						$currentSlug = $myVar->slugify($slug);
					}else{
						$currentSlug = $myVar->slugify($old_slug.'-'.$slug_count);
					}
					$slug = $currentSlug;
					$checkSlug = DB::table('faq_categories')->where('slug',$currentSlug)->get();
					$slug_count++;
				}
				while(count($checkSlug)>0);
				DB::table('faq_categories')->where('faq_category_id',$faq_category_id)->update([
					'slug'	 =>   $slug
					]);
			}
		}	
				
		$message = "FAQ has been added successfull!";
				
		return redirect()->back()->withErrors([$message]);
		}
	}
	
	//editCategory
	public function editfaqcategory($faq_category_id){		
		$title = array('pageTitle' => 'Edit Frequently Ask Questions Category');
		$result = array();		
		$result['message'] = array();
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$result['languages'] = $myVar->getLanguages();
		
		$editFAQ = DB::table('faq_categories')
		->where('faq_category_id', $faq_category_id)->get();
		
		foreach($result['languages'] as $languages_data){
			
			$description = DB::table('faq_categories')->where([
					['language_id', '=', $languages_data->languages_id],
					['faq_category_id', '=', $faq_category_id],
				])->get();
				
			if(count($description)>0){								
				$description_data[$languages_data->languages_id]['faq_category_name'] = $description[0]->faq_category_name;
				$description_data[$languages_data->languages_id]['language_name'] = $languages_data->name;
				$description_data[$languages_data->languages_id]['languages_id'] = $languages_data->languages_id;										
			}else{
				$description_data[$languages_data->languages_id]['faq_category_name'] = '';
				$description_data[$languages_data->languages_id]['language_name'] = $languages_data->name;
				$description_data[$languages_data->languages_id]['languages_id'] = $languages_data->languages_id;	
			}
		}
		$result['description'] = $description_data;	
		$result['editFAQ'] = $editFAQ;
		
		return view("admin.editfaqcategory", $title)->with('result', $result);
	}
	
	//updateCategory
	public function updatefaqcategory(Request $request){		
		if(session('faq_update')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
			
		$title = array('pageTitle' => 'Edit Frequently Ask Questions');
		$last_modified 	=   date('y-m-d h:i:s');
		$faq_category_id = $request->faq_category_id;
		$result = array();					
		
		//get function from other controller
		$myVar = new AdminSiteSettingController();
		$languages = $myVar->getLanguages();
		
		foreach($languages as $languages_data){
			$faq_category_name = 'faq_category_name_'.$languages_data->languages_id;
			
			$checkExist = DB::table('faq_categories')->where('faq_category_id','=',$faq_category_id)->where('language_id','=',$languages_data->languages_id)->get();			
			if(count($checkExist)>0){
				DB::table('faq_categories')->where('faq_category_id','=',$faq_category_id)->where('language_id','=',$languages_data->languages_id)->update([
					'faq_category_name'	=> $request->$faq_category_name,
					'last_modified' 	=> $last_modified,
					]);
			}else{
				DB::table('faq_categories')->insert([
					'faq_category_name'		=> $request->$faq_category_name,
					'language_id'			=> $languages_data->languages_id,
					'faq_category_id'		=> $faq_category_id,
					]);
			}
		}
		
		$slug_flag = false;
		foreach($languages as $languages_data){
			$faq_category_name = 'faq_category_name_'.$languages_data->languages_id;
			
			//slug
			if($slug_flag==false){
				$slug_flag=true;
				
				$slug = $request->$faq_category_name;
				$old_slug = $request->$faq_category_name;
				
				$slug_count = 0;
				do{
					if($slug_count==0){
						$currentSlug = $myVar->slugify($slug);
					}else{
						$currentSlug = $myVar->slugify($old_slug.'-'.$slug_count);
					}
					$slug = $currentSlug;
					$checkSlug = DB::table('faq_categories')->where('slug',$currentSlug)->get();
					$slug_count++;
				}
				while(count($checkSlug)>0);
				DB::table('faq_categories')->where('faq_category_id',$faq_category_id)->update([
					'slug'	 =>   $slug
					]);
			}
		}
		
		$message = 'FAQ has been updated successfull!';
		return redirect()->back()->withErrors([$message]);
		}
	}
	
	
	//delete category
	public function deletefaqcategory($faq_category_id){
		if(session('faq_delete')==0){
			print Lang::get("labels.You do not have to access this route");
		}else{
		
		DB::table('faq_categories')->where('faq_category_id', $faq_category_id)->delete();
		
		$message = 'FAQ has been deleted successfull!';
				
		return redirect()->back()->withErrors([$message]);
		}
	}
	
	public function getajaxcategories(Request $request){
		$language_id 	 = '1';
		
		if(empty($request->category_id)){
			$category_id	= '0';
		}else{
			$category_id	=   $request->category_id;
		}
		
		$getCategories = DB::table('categories')
		->leftJoin('categories_description','categories_description.categories_id', '=', 'categories.categories_id')
		->select('categories.categories_id as id', 'categories.categories_image as image',  'categories.date_added as date_added', 'categories.last_modified as last_modified', 'categories_description.categories_name as name')
		->where('parent_id', $category_id)->where('categories_description.language_id', $language_id)->get();
		return($getCategories) ;
	}
}
