<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Responsive\Url;
use Mail;
use Session;
use Carbon\Carbon;

class IndexController extends Controller
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
	 
	
	
	
	
	 
    public function avigher_index()
    {
       
		


		
		
		
		
		$testimonials = DB::table('testimonials')->orderBy('id', 'desc')->get();
        $slideshow = DB::table('slideshow')->orderBy('id', 'asc')->get();
		$about = DB::table('pages')
		->where('page_id', '=', '1')
		->get();
		
		$testimonials = DB::table('testimonials')->orderBy('id', 'desc')->take(3)->get();
		$blogs = DB::table('post')
				->where('post_media_type', '=', 'image')
				->where('post_type', '=', 'blog')
				->orderBy('post_id', 'desc')->take(3)->get();
				
				
			$today = date("Y-m-d");
		$portfolio = DB::table('users')
		              ->leftJoin('portfolio', 'users.id', '=', 'portfolio.user_id')
					  ->where('users.membership_end_date', '>', $today)
					   ->where('users.payment_status', '=', 'completed')
					 ->where('portfolio.status', '=', 1)
					 ->orderBy('portfolio.id', 'desc')
					 ->get();	
				
		$portfolio_cnt = DB::table('users')
		              ->leftJoin('portfolio', 'users.id', '=', 'portfolio.user_id')
					  ->where('users.membership_end_date', '>', $today)
					   ->where('users.payment_status', '=', 'completed')
					 ->where('portfolio.status', '=', 1)
					 ->orderBy('portfolio.id', 'desc')
					 ->count();									
				
		
		
		
      $siteid=1;
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);
		
		 
		
		
		$data = array('testimonials' => $testimonials, 'slideshow' => $slideshow, 'about' => $about,   'testimonials' => $testimonials, 'blogs' => $blogs,'site_setting' => $site_setting,'portfolio_cnt' => $portfolio_cnt, 'portfolio' => $portfolio);
            return view('index')->with($data);
    }
	
	
	
	
	
	
	public function avigher_subscribe(Request $request) 
	{
        $data = $request->all();
		$email=$data['email'];
		 $site_logo=$data['site_logo'];
		 
		 $site_url=$data['site_url'];
		 
		 $activated = $data['activated'];
		
		$site_name=$data['site_name'];
		$count = DB::table('newsletter')
		 ->where('email', '=', $email)
		
		 ->count();
		 
	     if($count==0)
		 {
			 DB::insert('insert into newsletter (email,activated) values (?, ?)',[$email,$activated]);
			 $get = DB::table('newsletter')
               ->where('email', '=', $email)
			   ->where('activated', '=', $activated)
                ->get();
				$get_id = $get[0]->id;
			 
			 Mail::send('newsletter', ['email' => $email,
			 'site_logo' => $site_logo, 'site_name' => $site_name, 'activated' => $activated, 'site_url' => $site_url, 'get_id' => $get_id], function ($message)
         {
            $message->subject('Newsletter Subscribe');
			
            $message->from(Input::get('admin_email'), 'Admin');
			
			

            $message->to(Input::get('email'));

        });
			 
		 }
		 else
		 {
			 return redirect()->back()->with('message', 'This email address already subscribed');
		 }
		 
		 return redirect()->back()->with('message', 'You have successfully subscribed to the newsletter. You will receive a confirmation email in few minutes.');	 
		 
        
        
    }
	
	
	public function newsletter_activate($id)
	{
	   
	   $count = DB::table('newsletter')
		 ->where('id', '=', $id)
		 ->where('activated', '=', '0')
		 ->count();
		 
		 if($count == 1)
		 {
		    DB::update('update newsletter set activated="1" where id = ?', [$id]);
		Session::flash('message', 'Your subscription has been confirmed! Thank you!');
		return view('thankyou');
		 }
		 else
		 {
		    Session::flash('error', 'This email address already subscribed');
			return view('thankyou_error');
			
		 }
		 
	   /*return redirect()->back()->with('message', 'Your subscription has been confirmed! Thank you!');*/	
	   
	   
			
	}
	
	
	
}
