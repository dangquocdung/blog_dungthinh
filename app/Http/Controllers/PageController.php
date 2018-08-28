<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use Auth;
use Crypt;
use URL;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function avigher_viewpage($id)
	{
	   
	   
	   $page = DB::table('pages')
		       ->where('post_slug', '=', $id)
			   ->get();
		$page_cnt = DB::table('pages')
		       ->where('post_slug', '=', $id)
			   ->count();	   
			   
			   
		$setid=1;
		$setting = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$users = DB::select('select * from users where id = ?',[$setid]);	   
		$data = array('page' => $page, 'setting' => $setting, 'users' => $users, 'page_cnt' => $page_cnt);	   
	   return view('page')->with($data);
	}
	 
	 
	 
	public function avigher_membership_payment($id)
	{
	      $today = date("Y-m-d");
	      $userid = Auth::user()->id;
	      $users = DB::table('users')
		       ->where('id', '=', $userid)
			   
			   
			   ->count();
			   
		
		$membership_count = DB::table('membership')
						   ->where('mid', '=', $id)
						   ->where('membership_status', '=', 1)
						   ->count();	   
		
		if(!empty($membership_count))
		{   
		 $view_membership = DB::table('membership')
						   ->where('mid', '=', $id)
						   ->where('membership_status', '=', 1)
						   ->get(); 
						   
		  $end_days = $view_membership[0]->membership_days;
		  
		  $dats = "+".$end_days." days";
		  $next_due_date = date('Y-m-d', strtotime($dats));
		  
		  $prices = $view_membership[0]->membership_price;
		  $plan_name = $view_membership[0]->membership_name;
		  			   	   
		}
		else
		{
		   $next_due_date = "";
		   $prices = "";
		}
		
		$setid=1;
		$setting = DB::table('settings')
		->where('id', '=', $setid)
		->get();
			   
			   
		  if(!empty($users))
		  {
		     if(!empty($prices))
			 {
			   $status_view = "pending";
			 }
			 else
			 {
			   $status_view = "completed";
			 }
			 
			 DB::update('update users set membership_plan="'.$id.'",membership_start_date="'.$today.'",membership_end_date="'.$next_due_date.'",payment_status="'.$status_view.'" where id="'.$userid.'"'); 
		  }	  
		  
		  
		  
		  $name = Auth::user()->name;
		  $email = Auth::user()->email;
		  $phone_no = Auth::user()->phone;
		  $amount = $prices;
		  $currency = $setting[0]->site_currency;
		  $paypal_url = $setting[0]->paypal_url;
		  $paypal_id = $setting[0]->paypal_id;
		  $order_no = rand(111111,999999);
		  $plan =  $plan_name;
		  $duration = $end_days;
		  
		  
		  $ddata = array('name' => $name, 'email' => $email, 'phone_no' => $phone_no, 'amount' => $amount, 'currency' => $currency, 'paypal_url' => $paypal_url, 'paypal_id' => $paypal_id, 'order_no' => $order_no, 'id' => $id, 'plan' => $plan, 'duration' => $duration);
            return view('choose_payment')->with($ddata);
		   
			   
	
	} 
	
	
	 
	 
	 
	 
    public function avigher_about_us()
    {
       
		$about_id = 1;
		$about_us = DB::table('pages')
		       ->where('page_id', '=', $about_id)
			   ->get();
	
		$data = array('about_us' => $about_us);
            return view('about-us')->with($data);
    }
	
	public function avigher_404()
    {
		return view('404');
	}
	
	public function avigher_terms()
    {
       
		$term_id = 8;
		$terms = DB::table('pages')
		       ->where('page_id', '=', $term_id)
			   ->get();
		
		$data = array('terms' => $terms);
            return view('terms-of-use')->with($data);
    }
	
	
	
	public function avigher_privacy()
    {
       
		$privacy_id = 9;
		$privacy = DB::table('pages')
		       ->where('page_id', '=', $privacy_id)
			   ->get();
	
		$data = array('privacy' => $privacy);
            return view('privacy-policy')->with($data);
    }
	
	
	public function avigher_support()
    {
       
		$support_id = 6;
		$support = DB::table('pages')
		       ->where('page_id', '=', $support_id)
			   ->get();
	
		$data = array('support' => $support);
            return view('support')->with($data);
    }
	
	
	public function avigher_faq()
    {
       
		$faq_id = 7;
		$faq = DB::table('pages')
		       ->where('page_id', '=', $faq_id)
			   ->get();
	
		$data = array('faq' => $faq);
            return view('faq')->with($data);
    }
	
	
	
	
	
	public function avigher_contact()
    {
       
		$contact_id = 4;
		$contact = DB::table('pages')
		       ->where('page_id', '=', $contact_id)
			   ->get();
		$setid=1;
		$setting = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$users = DB::select('select * from users where id = ?',[$setid]);	   
	
		$data = array('contact' => $contact, 'setting' => $setting, 'users' => $users);
            return view('contact-us')->with($data);
    }
	
	
	
	public function avigher_donate_now()
    {
	   $did = 5;
		$donate = DB::table('pages')
		       ->where('page_id', '=', $did)
			   ->get();
		$setid=1;
		$setting = DB::table('settings')
		->where('id', '=', $setid)
		->get();	   
			   $data = array('donate' => $donate, 'setting' => $setting);
	   return view('donate-now')->with($data);
	}
	
	
	
	public function avigher_howit()
    {
       
		$how_id = 5;
		$how = DB::table('pages')
		       ->where('page_id', '=', $how_id)
			   ->get();
	
		$data = array('how' => $how);
            return view('how-it-works')->with($data);
    }
	
	
	
	
	public function avigher_safety()
    {
       
		$safety_id = 6;
		$safety = DB::table('pages')
		       ->where('page_id', '=', $safety_id)
			   ->get();
	
		$data = array('safety' => $safety);
            return view('safety')->with($data);
    }
	
	
	
	public function avigher_guide()
    {
       
		$guide_id = 7;
		$guide = DB::table('pages')
		       ->where('page_id', '=', $guide_id)
			   ->get();
	
		$data = array('guide' => $guide);
            return view('service-guide')->with($data);
    }
	
	
	
	public function avigher_topages()
    {
       
		$topages_id = 8;
		$topages = DB::table('pages')
		       ->where('page_id', '=', $topages_id)
			   ->get();
	
		$data = array('topages' => $topages);
            return view('how-to-pages')->with($data);
    }
	
	
	
	public function avigher_stories()
    {
       
		$stories_id = 9;
		$stories = DB::table('pages')
		       ->where('page_id', '=', $stories_id)
			   ->get();
	
		$data = array('stories' => $stories);
            return view('success-stories')->with($data);
    }
	
	
	
	public function avigher_donate_payment(Request $request)
	{
	
	   $data = $request->all();
		
		$name = $data['name'];
		$email = $data['email'];
		$phone_no = $data['phone_no'];
		
		$amount = $data['amount'];
		$status = "pending";
		$currency = $data['currency'];
		$paypal_url = $data['paypal_url'];
		$paypal_id = $data['paypal_id'];
		$order_no = $data['order_no'];
		$token = $data['token'];
		$payment_date = date("Y-m-d");
		$plan = $data['plan'];
		
		$idd = Auth::user()->id;
		$payment_type = $data['payment_type'];
		$url = $data['url'];
		
		
				DB::update('update users set payment_date="'.$payment_date.'",payment_type="'.$payment_type.'" where payment_status="'.$status.'" and id="'.$idd.'"');
				
		
		
		$ddata = array('name' => $name, 'email' => $email, 'phone_no' => $phone_no, 'amount' => $amount, 'currency' => $currency, 'paypal_url' => $paypal_url, 'paypal_id' => $paypal_id, 'order_no' => $order_no, 'plan' => $plan, 'payment_type' => $payment_type, 'url' => $url, 'idd' => $idd);
            return view('payment')->with($ddata);
		
	
	}
	
	
	public function avigher_mailsend(Request $request)
	{
		$data = $request->all();
		
		$name = $data['name'];
		$email = $data['email'];
		$phone_no = $data['phone_no'];
		$msg = $data['msg'];
		
		
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		
		
		$datas = [
            'name' => $name, 'email' => $email, 'phone_no' => $phone_no, 'msg' => $msg, 'site_logo' => $site_logo, 'site_name' => $site_name
        ];
		
		Mail::send('contactemail', $datas , function ($message) use ($admin_email,$name,$email)
        {
            $message->subject('Contact Us');
			
            $message->from($admin_email, $name);

            $message->to($admin_email);

        }); 
		
		
		
		
		return redirect()->back()->with('message', 'Your message sent successfully');
		
	}
	
	
	
	
}
