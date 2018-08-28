<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use File;
use Image;


class SettingsController extends Controller
{
    
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
	
	public function showform() {
      $settings = DB::select('select * from settings where id = ?',[1]);
	  $currency=array("USD","CZK","DKK","HKD","HUF","ILS","JPY","MXN","NZD","NOK","PHP","PLN","SGD","SEK","CHF","THB","AUD","CAD","EUR","GBP","AFN","DZD",
							"AOA","XCD","ARS","AMD","AWG","SHP","AZN","BSD","BHD","BDT","INR");
		
		$payment=array("paypal","stripe");
		
	  $data=array('settings'=>$settings, 'currency' => $currency, 'payment' => $payment);
      return view('admin.settings')->with($data);
   }
	
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  protected $fillable = ['name', 'email','password','phone'];
	 
    protected function editsettings(Request $request)
    {
       
		
		
		
		
         
		 $data = $request->all();
			
         
		$site_name=$data['site_name'];
		
		
		$imgsize=$data['image_size'];
		$imgtype=$data['image_type'];
		
		
		
		
		
		
		
		 $rules = array(
               
		'site_logo' => 'max:'.$imgsize.'|mimes:'.$imgtype,
		'site_favicon' => 'max:'.$imgsize.'|mimes:'.$imgtype,
		/*'site_banner' => 'max:'.$imgsize.'|mimes:'.$imgtype,*/
		'site_loading_url' => 'max:'.$imgsize.'|mimes:'.$imgtype
		
		
        );
		
		$messages = array(
            
           
			
        );
		
		$validator = Validator::make(Input::all(), $rules, $messages);
		
		
		
		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			 
			return back()->withErrors($validator);
		}
		else
		{ 
		
		$currentlogo=$data['currentlogo'];
		
		
		$image = Input::file('site_logo');
        if($image!="")
		{	
            $settingphoto="/media/";
			$delpath = base_path('images'.$settingphoto.$currentlogo);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$settingphoto.$filename);
			$destinationPath=base_path('images'.$settingphoto);
      
                /*Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
				
				Input::file('site_logo')->move($destinationPath, $filename);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentlogo;
		}	




		$currentfav = $data['currentfav'];
		
		
		
		$images = Input::file('site_favicon');
        if($images!="")
		{	
            $settingphotos="/media/";
			$delpaths = base_path('images'.$settingphotos.$currentfav);
			File::delete($delpaths);	
			$filenames  = time() . '.' . $images->getClientOriginalExtension();
            
            $paths = base_path('images'.$settingphotos.$filenames);
			$destinationPaths=base_path('images'.$settingphotos);
      
                Image::make($images->getRealPath())->resize(24, 24)->save($paths);
				
				/* Input::file('site_logo')->move($destinationPath, $filename);*/
				$savefav=$filenames;
		}
        else
		{
			$savefav=$currentfav;
		}
		
		
		
		/*$currentban = $data['currentban'];
		
		
		$banimages = Input::file('site_banner');
        if($banimages!="")
		{	
            $settingbanphotos="/media/";
			$delpathes = base_path('images'.$settingbanphotos.$currentban);
			File::delete($delpathes);	
			$banfilenames  = time() . '.' . $banimages->getClientOriginalExtension();
            
            $banpaths = base_path('images'.$settingbanphotos.$banfilenames);
			$destinationbanPaths=base_path('images'.$settingbanphotos);
      
                Image::make($banimages->getRealPath())->resize(1920, 500)->save($banpaths);
				
				
				$savefavs=$banfilenames;
		}
        else
		{
			$savefavs=$currentban;
		}*/
		
		
		
		
		
		
		
		
		
		
		
		
		
		$currentloading = $data['save_loading_url'];
		$loadurl = Input::file('site_loading_url');
        if($loadurl!="")
		{	
            $loadphotos="/media/";
			$delpathee = base_path('images'.$loadphotos.$currentloading);
			File::delete($delpathee);	
			$banfilenamee  = time() . '.' . $loadurl->getClientOriginalExtension();
            
            $banpathe = base_path('images'.$loadphotos.$banfilenamee);
			$destinationbanPathe=base_path('images'.$loadphotos);
      
                /*Image::make($loadurl->getRealPath())->resize(791, 547)->save($banpathe);*/
				
				 Input::file('site_loading_url')->move($destinationbanPathe, $banfilenamee);
				$savefavee=$banfilenamee;
		}
        else
		{
			$savefavee=$currentloading;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		$site_desc=$data['site_desc'];
		$site_keyword=$data['site_keyword'];
		
		
		
		
		if($data['site_desc']!="")
		{
			$desctxt=$site_desc;
		}
		else
		{
			$desctxt=$data['save_desc'];
		}
		
		
		if($data['site_keyword']!="")
		{
			$keytxt=$site_keyword;
		}
		else
		{
			$keytxt=$data['save_key'];
		}
		
		
		
		if($data['site_address']!="")
		{
			$siteaddress=$data['site_address'];
		}
		else
		{
			$siteaddress=$data['save_address'];
		}
		
		
		
		
		
		
		
		
		
		if($data['site_url']!="")
		{
			$mojo_siteurl = $data['site_url'];
		}
		else
		{
			 $mojo_siteurl = $data['save_siteurl'];
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		$fb = $data['site_facebook'];
		
		if($data['site_facebook']!="")
		{
			$facebook = $fb;
		}
		else
		{
			$facebook = $data['save_facebook'];
		}
		
		$twi = $data['site_twitter'];
		
		if($data['site_twitter']!="")
		{
			$twitter = $twi;
		}
		else
		{
			$twitter = $data['save_twitter'];
		}
		
		
		
		
		$gpl = $data['site_gplus'];
		
		if($data['site_gplus']!="")
		{
			$gplus = $gpl;
		}
		else
		{
			$gplus = $data['save_gplus'];
		}
		
		
		
		$pin = $data['site_pinterest'];
		
		if($data['site_pinterest']!="")
		{
			$pinterest = $pin;
		}
		else
		{
			$pinterest = $data['save_pinterest'];
		}
		
		
		
		
		$ins = $data['site_instagram'];
		
		if($data['site_instagram']!="")
		{
			$instagram = $ins;
		}
		else
		{
			$instagram = $data['save_instagram'];
		}
		
		
		$copys = $data['site_copyright'];
		
		if($data['site_copyright']!="")
		{
			$copyrights = $copys;
		}
		else
		{
			$copyrights = $data['save_copyright'];
		}
		
		
		
		
		$site_post = $data['site_post_per'];
		
		if($data['site_post_per']!="")
		{
			$sitepost = $site_post;
		}
		else
		{
			$sitepost = $data['save_post_per'];
		}
		
		
		
		
		
		
		
		
		
		
		
		/*$header_type = $data['header_type'];
		
		if($data['header_type']!="")
		{ 
		  $headertype = $header_type;
		}
		else
		{
		  $headertype = $data['save_header_type'];
		}*/
		
		
		
		
		$map_api = $data['site_map_api'];
		
		if($data['site_map_api']!="")
		{ 
		  $mapapi = $map_api;
		}
		else
		{
		  $mapapi = $data['save_map_api'];
		}
		
		$site_loading = $data['site_loading'];
		
		
		
		$site_email = $data['site_email'];
		$site_phone = $data['site_phone'];
		$site_layout = $data['site_layout'];
		
		
		if(!empty($data['paypal_id']))
		{
		$paypal_id = $data['paypal_id'];
		}
		else
		{
		  $paypal_id = "";
		}
		
		if(!empty($data['paypal_url']))
		{
		$paypal_url = $data['paypal_url'];
		}
		else
		{
		 $paypal_url = "";
		}
		
		
		$payment_opt="";
		foreach($data['payment_opt'] as $with)
		{
			$payment_opt .=$with.",";
		}
		$payment = rtrim($payment_opt,",");
		
		
		if(!empty($data['stripe_mode']))
		{
		$stripe_mode = $data['stripe_mode'];
		}
		else
		{
		$stripe_mode = "";
		}
		
		if(!empty($data['test_publish_key']))
		{
		$test_publish_key = $data['test_publish_key'];
		}
		else
		{
		$test_publish_key = "";
		}
		
		if(!empty($data['test_secret_key']))
		{
		$test_secret_key = $data['test_secret_key'];
		}
		else
		{
		$test_secret_key = "";
		}
		
		if(!empty($data['live_publish_key']))
		{
		$live_publish_key = $data['live_publish_key'];
		}
		else
		{
		$live_publish_key = "";
		}
		
		if(!empty($data['live_secret_key']))
		{
		$live_secret_key = $data['live_secret_key'];
		}
		else
		{
		$live_secret_key = "";
		}
		
		
		DB::update('update settings set site_name="'.$site_name.'",site_desc="'.$desctxt.'",site_keyword="'.$keytxt.'",site_address="'.$siteaddress.'",	site_phone="'.$site_phone.'",site_email="'.$site_email.'",site_layout="'.$site_layout.'",
		site_facebook="'.$facebook.'",site_twitter="'.$twitter.'",site_gplus="'.$gplus.'",site_pinterest="'.$pinterest.'",site_instagram="'.$instagram.'",
		site_logo="'.$savefname.'",site_favicon="'.$savefav.'",
		site_copyright="'.$copyrights.'",	site_post_per="'.$sitepost.'",paypal_id="'.$paypal_id.'",
		paypal_url="'.$paypal_url.'",payment_option="'.$payment.'", stripe_mode="'.$stripe_mode.'", test_publish_key="'.$test_publish_key.'", test_secret_key="'.$test_secret_key.'", live_publish_key="'.$live_publish_key.'", live_secret_key="'.$live_secret_key.'",
		site_map_api="'.$mapapi.'",site_url="'.$mojo_siteurl.'",site_loading="'.$site_loading.'",site_loading_url="'.$savefavee.'" where id = ?', [1]);
		
			return back()->with('success', 'Settings has been updated');
        
		
		}
		
		
    }
}
