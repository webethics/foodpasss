<?php
//use DB;

//namespace App\Http\Middleware;
use App\Models\Role;
use App\Models\User;
use App\Models\Coupons;
use App\Models\Payment;
use App\Models\Kitchens;
use App\Models\RolesPermission;
use App\Models\PermissionList;
use App\Models\Setting;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Notification;
use App\Models\EmailTemplate;
use App\Models\StateList;
use App\Models\CityLists;
use App\Models\Company;
use App\Models\Plan;
use Carbon\Carbon;

function banner_photo($user_id){
	
	      $user_data = User::where('id',$user_id)->get();
		  $banner_image =   url('/uploads/users').'/'. $user_data[0]->id .'/'. $user_data[0]->banner_photo;
		  return $banner_image ;

}

//use Config;
// Return User Role ID 
function current_user_role_id(){
	$user = \Auth::user();
	return $user->role_id;
}

function current_user_role_name(){
	$user = \Auth::user();
	$role = Role::where('id',$user->role_id)->get();
	return $role[0]->slug;
} 
/* Get Loggedin User data */
function user_data(){
	$user = \Auth::user();
	return $user;
}

/* Get Current User ID */
function user_id(){
	$user = \Auth::user();
	return $user->id;
}

function get_store_kitchen($store_id){
	$get_kitchen = User::where('id',$store_id)->first();
	if(isset($get_kitchen) && $get_kitchen != "" && $get_kitchen->restaurant_kitchens != ""){
		$explode = explode(",", $get_kitchen->restaurant_kitchens);
		$name_kitchen = array();
		foreach ($explode as $key => $value) {
			$kitchn_name = get_kitchen_name($value);
			if($kitchn_name != ""){
				$name_kitchen[] = 	$kitchn_name;
			}
		}
		if(!empty($name_kitchen)){
			$kitchens = implode(",", $name_kitchen);	
		}else{
			$kitchens = "No Kitchen found.";
		}
	}else{
		$kitchens = "No Kitchen found.";
	}
	return $kitchens;
}

function get_kitchen_name($kitchen_id){
	$kitchens = Kitchens::where('id',$kitchen_id)->first();
	if(isset($kitchens) && !empty($kitchens)){
		return $kitchens->name;	
	}else{
		return '';
	}
}

/* Get User data by ID  */
function user_data_by_id($id){
	$userData = User::where('id',$id)->get();
	return $userData[0];
}

function affilate_count($user_id){
	$user = User::where('id',$user_id)->first();
		$affilate_user = User::where('affilate_id',$user->customer_id)->get();
		$count = 0;
		foreach($affilate_user as $val){
			$check_payment = Payment::where('user_id',$val->id)->first();
			if(isset($check_payment) && !empty($check_payment)){
				$count++;
			}
		}
		return $count;
}

/* Function to check user is subscribed or not  */
function user_subscription_status(){
	$user = \Auth::user();
	$payment = Payment::where('user_id',$user->id)
					->first();
	if(isset($payment) && !empty($payment)){
		if($payment->amount == "12.00"){
			$expire = $payment->updated_at->addYear()->format('d F Y');
		}else{
			$expire = $payment->updated_at->addMonth()->format('d F Y');
		}
		$timestamp = strtotime($expire);
		if($timestamp > time()){
			return 1;
		}else{
			return 0;
		}
		
	}else{
		return 0;
	}
} 


/* Function to get the user subscribed plan  */
function subscribed_plan($user_id){
	$payment = Payment::where('user_id',$user_id)->first();
	$array   = array();
	if(isset($payment) && !empty($payment)){
		if($payment->amount == "12.00"){
			$array['expire'] = $payment->updated_at->addYear()->format('d F Y');
			$array['plan']   = "Yearly";
		}else{
			$array['expire'] = $payment->updated_at->addMonth()->format('d F Y');
			$array['plan']   = "Monthly";
		}
	}else{
		$array['expire'] = '';
		$array['plan']   = '';
	}
	return $array;
} 

/* Explode by  */
function explodeTo($sign,$data){
	$exp = explode($sign,$data);
	return $exp;
}


function role_data_by_id($id){
	$role = Role::where('id',$id)->get();
	return $role[0];
} 



/* Exploade by |  */ 
function split_to_array($sign,$data){
		$data = explode($sign,$data);
		return $data;
}

/* ================================
   If double authentication not set then redirect to below routes of user role base 
============================*/
function redirect_route_name(){
	
	  $role_id = Config::get('constant.role_id');
	  $user_id =user_id();
	  $user_data = user_data_by_id($user_id);
			
	  if(is_null($user_data->otp)){
		  
	   // IF DATA_ADMIN/DATA_ANALYST/CUSTOMER_USER/CUSTOMER_ADMIN 
	   
	   if(1 == current_user_role_id()){
		  return 'admin/dashboard'; 
	   }
	   else if(2 == current_user_role_id()){
		 	return 'profile';				
	   } else if(3 == current_user_role_id()){
		 	return 'store-profile';					
	   }
	   	  
	   }else{
		    \Auth::logout();
		   return 'login'; 
	  }  
}

function profile_photo($user_id){
	   
	  $user_data = User::where('id',$user_id)->get();

	  $profile_photo =  url('/uploads/users').'/'. $user_data[0]->id .'/'. $user_data[0]->profile_photo;
	  return $profile_photo ;

}

function coupon_image($coupon_id){
	   
	  $user_data = Coupons::where('id',$coupon_id)->get();

	  $profile_photo =  url('/uploads/coupons').'/'. $user_data[0]->user_id .'/'. $user_data[0]->coupon_image;
	  return $profile_photo ;

}

function get_coupon($coupon_id){
	  $coupon_data = Coupons::where('id',$coupon_id)->first();
	  return $coupon_data ;
}

function store_menu($user_id){
	   
	  $user_data = User::where('id',$user_id)->get();

	  $menus =  url('/uploads/menus').'/'.  $user_data[0]->menu_file;
	  return $menus ;

}

function check_role_access($permission_slug){
	
	$user = \Auth::user();
	$current_user_role_id = $user->role_id;
	
	$permission_list_for_role = RolesPermission::where('role_id',$current_user_role_id)->get();
	
	
	$permission_array = array();
	foreach($permission_list_for_role as $permission){
			
		 $slug = PermissionList::where('id',$permission->permission_id)->select('slug')->first();
		 $permission_array[] = $slug->slug;
	}
	
	
	if(in_array($permission_slug,$permission_array)){
		return true;
	}else{
		return false;
	}
}

function access_denied_user($permission_slug,$already_check = 0){
	$user = \Auth::user();
	$current_user_role_id = $user->role_id;
	
	$permission_list_for_role = RolesPermission::where('role_id',$current_user_role_id)->get();
//	pr($permission_list_for_role->toArray());
	
	$permission_array = array();
	foreach($permission_list_for_role as $permission){
			
		 $slug = PermissionList::where('id',$permission->permission_id)->select('slug')->first();
		 $permission_array[] = $slug->slug;
	}
	
	if(in_array($permission_slug,$permission_array)){
		return true;
	}else{
		/*check if admin user login*/
		//check session admin id
		if(!empty(Session::get('is_admin_login'))  && Session::get('is_admin_login') == 1 && !empty(Session::get('admin_user_id')) && $already_check == 0){
			Auth::loginUsingId(Session::get('admin_user_id'));
			access_denied_user($permission_slug,1);
		}else{
			return abort_unless(\Gate::denies(current_user_role_name()), 403);
		}
	}
}

/* // USER/ANALYST NOT ALBE TO ACCESS 
function access_denied_user(){
	
		$role_id = Config::get('constant.role_id');
	    if($role_id['CUSTOMER_USER']== current_user_role_id()){
		  return abort_unless(\Gate::denies(current_user_role_name()), 403);
	    } 
} */

function access_denied_user_analyst(){
	
		$role_id = Config::get('constant.role_id');
	    if($role_id['CUSTOMER_USER']== current_user_role_id() || $role_id['DATA_ANALYST']== current_user_role_id()){
		  return abort_unless(\Gate::denies(current_user_role_name()), 403);
	    } 
	
}


//EMAIL SEND 
 function send_email($to='',$subject='',$message='',$from='',$fromname=''){
	try {	
			$mail = new PHPMailer();
			$mail->isSMTP(); // tell to use smtp
			$mail->CharSet = "utf-8"; // set charset to utf8
			
			$setting = Setting::where('id',1)->get();
	
			$mail->SMTPAuth = true;
			$mail->Host = $setting[0]->smtp_host;
			$mail->Port = $setting[0]->smtp_port;
			$mail->Username =$setting[0]->smtp_user;
            $mail->Password = urlsafe_b64decode($setting[0]->smtp_password); 		
			/* $mail->Host = "webethicssolutions.com";
			$mail->Port =587;
			$mail->Username = "php@webethicssolutions.com";
			$mail->Password = "el*cBt#TuRH^"; */
			  
			  //Client SMTP 
			/* $mail->Host = "mail.mgdsw.info";
			$mail->Port =587;
			$mail->Username = "cdr@mgdsw.info";
			$mail->Password = "+UI4cK~Jq2D@bFIB";  */
			
			
			
			if($from!='')
			 $mail->From = $from;
		     else
			 $mail->From = $setting[0]->from_email ;
		 
			if($fromname!='')
			 $mail->FromName = $fromname;
		     else
			 $mail->FromName = $setting[0]->from_name;
			
			$mail->AddAddress($to);
			$mail->IsHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $message;
			//$mail->addReplyTo(‘examle@examle.net’, ‘Information’);
			//$mail->addBCC(‘examle@examle.net’);
			//$mail->addAttachment(‘/home/kundan/Desktop/abc.doc’, ‘abc.doc’); // Optional name
			$mail->SMTPOptions= array(
			'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			)
			);

			$mail->send();
			return true ;
		}catch (phpmailerException $e) {
				dd($e);
		} catch (Exception $e) {
				dd($e);
		}
		 return false ;
   }
// TOKEN 
	function getToken($length='')
	{
		if($length=='')
			$length =20;
		
		    $token = "";
		    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		    $codeAlphabet.= "0123456789";
		    $max = strlen($codeAlphabet); // edited

		    for ($i=0; $i < $length; $i++) {
		        $token .= $codeAlphabet[rand(0, $max-1)];
		    }

		    return $token;
	}
	

// GET THE IP ADDRESS 
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
  return $ipaddress;
}

// Show Site Title and LOGO 
function showSiteTitle($title){
	$setting = Setting::where('id',1)->first();
	
	if($setting && $title == 'title'){
		if($setting->site_title && $setting->site_title != ''){
			return $setting->site_title;
		}else{
			return trans('global.site_title');
		}
	}else if($setting && $title == 'logo'){
		if($setting->site_logo && $setting->site_logo != ''){

			return url('uploads/logo/'.$setting->site_logo);
		}else{
			return url('/img/logo.svg');
		}
	}
}

function urlsafe_b64decode($string)
{
	$ciphering = "AES-128-CTR";
	$decryption_key = "GeeksforGeeks";
	$options = 0;
	$iv_length = openssl_cipher_iv_length($ciphering);
	$decryption_iv = '1234567891011121';
	return openssl_decrypt ($string, $ciphering,$decryption_key, $options, $decryption_iv);
}

/* Function For the image */ 
function timthumb($img,$w,$h){

		  $user_img =  url('plugin/timthumb/timthumb.php').'?src='.$img.'&w='.$w.'&h='.$h.'&zc=0&q=99';

		  return $user_img ;

}

function list_states(){
	$statesData = StateList::all();
	return $statesData;
}

function list_companies(){
	$CompanyData = Company::all();
	return $CompanyData;
}

function list_plans(){
	$planData = Plan::all();
	return $planData;
}

function relationsArray(){
	//$array = array();
	$array = array(
				'wife'=>'Wife',
				'husband'=>'Husband',
				'daughter'=>'Daughter',
				'son'=>'Son',
				'mother'=>'Mother',
				'father'=>'Father',
				'brother'=>'Brother', 	
				'sister'=>'Sister',
			);

	return $array;			
}
function birth_years(){
	$birth_years = collect(range(12, 5))->map(function ($item) {
		return (string) date('Y') - $item;
	});
	return $birth_years;
}
function getStateNameByStateId($state_id){
	$state_name = '';
	$getname = StateList::where('id',$state_id)->select('state_name')->first();
	if(!is_null($getname) && ($getname->count())>0)
		$state_name = $getname->state_name;
	return $state_name;
}
function getDistrictNameByDistrictId($district_id){
	$district_name = '';
	$getname = CityLists::where('id',$district_id)->select('city_name')->first();
	if(!is_null($getname) && ($getname->count())>0)
		$district_name = $getname->city_name;
	return $district_name;
}
function viewDateFormat($date){
	return Carbon::parse($date)->format(config('constant.FRONT_DATE_FORMAT'));
}
function pr($data){

  echo "<pre>";
  print_r($data);
  echo "</pre>" ;die;
}
/*
*Display policy number
*/
function generatePolicyNumber($userId){
	$policyId = '#'.str_pad($userId, 8, '0', STR_PAD_LEFT);
	return $policyId;
}

