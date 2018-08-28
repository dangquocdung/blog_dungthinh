<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use URL;



class SuccessController extends Controller
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
    
	
	
	
	public function avigher_stripe(Request $request) 
	{
		$data = $request->all();
		$cid = $data['cid'];
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		if($setts[0]->stripe_mode=="test") 
		{
			$secretkey = $setts[0]->test_secret_key;
		}
		else if($setts[0]->stripe_mode=="live")
		{
			$secretkey = $setts[0]->live_secret_key;
		}
		
		try {	
		
		include(app_path() . '/Stripe/lib/Stripe.php');
		Stripe::setApiKey($secretkey); //Replace with your Secret Key
		
		$charge = Stripe_Charge::create(array(
			"amount" => $_POST['amount'],
			"currency" => $_POST['currency_code'],
			"card" => $_POST['stripeToken'],
			"description" => $_POST['item_name']
		));
		
		
		
		$stripe_token = $_POST['stripeToken'];
		}

		catch(Stripe_CardError $e) {
			
		}



		catch (Stripe_InvalidRequestError $e) {
		  // Invalid parameters were supplied to Stripe's API

		} catch (Stripe_AuthenticationError $e) {
		  // Authentication with Stripe's API failed
		  // (maybe you changed API keys recently)

		} catch (Stripe_ApiConnectionError $e) {
		  // Network communication with Stripe failed
		} catch (Stripe_Error $e) {

		  // Display a very generic error to the user, and maybe send
		  // yourself an email
		} catch (Exception $e) {

		  // Something else happened, completely unrelated to Stripe
		}
		
		
		
		
		
		
		
		
		
		$update = DB::table('users')
						->where('id', '=', $cid)
						->update(['payment_status' => 'completed', 'stripe_token' => $stripe_token]);
						
		
										
						
		$getuser = DB::table('users')
              
			       ->where('id', '=', $cid)
			   
                   ->get();	
				   
		$view_membership = DB::table('membership')
						   ->where('mid', '=', $getuser[0]->membership_plan)
						   ->where('membership_status', '=', 1)
						   ->get();		   
				   			
						
				$name = $getuser[0]->name;
				$email = $getuser[0]->email;
				$phone = $getuser[0]->phone;			
				$amount = $view_membership[0]->membership_price;
				$plan = $view_membership[0]->membership_name;
					
		
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'phone' => $phone, 'amount' => $amount, 'url' => $url, 'plan' => $plan
        ];
		
		Mail::send('subscribe_email', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Payment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		
		$data = array('stripe_token' => $stripe_token);
		return view('stripe-success')->with($data);
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function avigher_showpage($cid) {
		
		
		
				
		
		
		 $update = DB::table('users')
						->where('id', '=', $cid)
						->update(['payment_status' => 'completed']);
						
		$getuser = DB::table('users')
              
			       ->where('id', '=', $cid)
			   
                   ->get();	
				   
		$view_membership = DB::table('membership')
						   ->where('mid', '=', $getuser[0]->membership_plan)
						   ->where('membership_status', '=', 1)
						   ->get();		   
				   			
						
				$name = $getuser[0]->name;
				$email = $getuser[0]->email;
				$phone = $getuser[0]->phone;			
				$amount = $view_membership[0]->membership_price;
				$plan = $view_membership[0]->membership_name;
					
		
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'phone' => $phone, 'amount' => $amount, 'url' => $url, 'plan' => $plan
        ];
		
		Mail::send('subscribe_email', $datas , function ($message) use ($admin_email,$email)
        {
            $message->subject('Payment Received');
			
            $message->from($admin_email, 'Admin');

            $message->to($admin_email);

        }); 
		
		
		
		
		
		
	 
	  $data = array('cid' => $cid);
      return view('success')->with($data);
   }
   
   
   
    
	
	
	
	
	
	
	
	
	
}
