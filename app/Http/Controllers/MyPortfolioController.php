<?php

namespace Responsive\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use File;
use Image;
use URL;
use Mail;
use Carbon\Carbon;

class MyPortfolioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	public function destroy($id) {
		
		$image = DB::table('portfolio')->where('id', $id)->first();
		$orginalfile=$image->photo;
		$photo="/media/";
       $path = base_path('images'.$photo.$orginalfile);
	  File::delete($path);
      DB::delete('delete from portfolio where id = ?',[$id]);
	   
      return back();
      
   } 
	 
    
	public function index()
    {
	    $user_id = Auth::user()->id;
        $portfolio = DB::table('portfolio')
		             ->where('user_id','=', $user_id)
		             ->orderBy('id','desc')
					 ->get();

        return view('my-portfolio', ['portfolio' => $portfolio]);
    }
	
	
	 public function formview()

    {
        
		$userr_id = Auth::user()->id;
	$today = date("Y-m-d");
	$membership_check = DB::table('users')
				           ->leftJoin('membership', 'membership.mid', '=', 'users.membership_plan')
						   ->where('users.id', '=', $userr_id)
						   ->where('users.membership_end_date', '>', $today)
						   ->where('users.payment_status', '=', 'completed')
						   ->where('membership.membership_price', '!=', 0)
						   ->count();
	$mcheck = DB::table('users')
				           ->leftJoin('membership', 'membership.mid', '=', 'users.membership_plan')
						   ->where('users.id', '=', $userr_id)
						   ->where('users.membership_end_date', '>', $today)
						   ->where('users.payment_status', '=', 'completed')
						   ->count();
						   
	$mcheck_left = DB::table('users')
				           ->leftJoin('membership', 'membership.mid', '=', 'users.membership_plan')
						   ->where('users.id', '=', $userr_id)
						   ->where('users.membership_end_date', '>', $today)
						   ->where('users.payment_status', '=', 'completed')
						   ->get();	
						   
			$get_portfolio = DB::table('portfolio')
			                      ->where('user_id', '=', $userr_id)
								  ->count();		   				   
						   
        return view('add_portfolio', ['membership_check' => $membership_check, 'mcheck' => $mcheck, 'mcheck_left' => $mcheck_left, 'get_portfolio' => $get_portfolio ]);

    }
	
	
	
	 public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	}
	 
	
	 protected function addportfoliodata(Request $request)
    {
        
		
		
		$userr_id = Auth::user()->id;
	$today = date("Y-m-d");
	$membership_check = DB::table('users')
				           ->leftJoin('membership', 'membership.mid', '=', 'users.membership_plan')
						   ->where('users.id', '=', $userr_id)
						   ->where('users.membership_end_date', '>', $today)
						   ->where('users.payment_status', '=', 'completed')
						   ->where('membership.membership_price', '!=', 0)
						   ->count();
						   
	$mcheck = DB::table('users')
				           ->leftJoin('membership', 'membership.mid', '=', 'users.membership_plan')
						   ->where('users.id', '=', $userr_id)
						   ->where('users.membership_end_date', '>', $today)
						   ->where('users.payment_status', '=', 'completed')
						   ->count();					   
						   
	$mcheck_left = DB::table('users')
				           ->leftJoin('membership', 'membership.mid', '=', 'users.membership_plan')
						   ->where('users.id', '=', $userr_id)
						   ->where('users.membership_end_date', '>', $today)
						   ->where('users.payment_status', '=', 'completed')
						   ->get();	
						   
			$get_portfolio = DB::table('portfolio')
			                      ->where('user_id', '=', $userr_id)
								  ->count();		   				   
	
	
	$left_check = 	$mcheck_left[0]->portfolio_limit - 	$get_portfolio;	
	
	$total_check = $mcheck_left[0]->portfolio_limit;		   
		
		
		 $this->validate($request, [

        		'title' => 'required'

        		
				
				

        	]);
         
		 
				
		
       
	    $settings = DB::select('select * from settings where id = ?',[1]);
	      $imgsize = $settings[0]->image_size;
		  $imgtype=$settings[0]->image_type;
	   
		
		$rules = array(
		
		'title' => 'unique:portfolio,title',
		
		'photo' => 'max:'.$imgsize.'|mimes:'.$imgtype
		
		
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
		 

		
	
	
	     $image = Input::file('photo');
		 if($image!="")
		 {
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $photo="/media/";
            $path = base_path('images'.$photo.$filename);
			$destinationPath=base_path('images'.$photo);
 
        
               /*Image::make($image->getRealPath())->resize(1600, 1200)->save($path);*/
				 Input::file('photo')->move($destinationPath, $filename);
               /* $user->image = $filename;
                $user->save();*/
				$namef=$filename;
		 }
		 else
		 {
			 $namef="";
		 }
	
	
	
	
	
	
	
		  $data = $request->all();

			
		
		
		
		
		
		
		if(!empty($data['title']))
		{
		   $title = $data['title'];
		}
		else
		{
		   $title = "";
		}
		
		if(!empty($data['content']))
		{
		   $content = $data['content'];
		}
		else
		{
		   $content = "";
		}
		
		if(!empty($data['client']))
		{
		   $client = $data['client'];
		}
		else
		{
		   $client = "";
		}
		
		
		if(!empty($data['site_url']))
		{
		   $site_url = $data['site_url'];
		}
		else
		{
		   $site_url = "";
		}
		
		
		if(!empty($data['site_date']))
		{
		   $site_date = $data['site_date'];
		}
		else
		{
		   $site_date = "";
		}
		
		if(!empty($data['video_url']))
		{
		  $video_url = $data['video_url'];
		}
		else
		{
		  $video_url = "";
		}
		
		
		$status = 0;
		
		
		
		if($left_check > 0 )
		{
		
				if(!empty($membership_check))
				{
				
				DB::insert('insert into portfolio (	user_id, video_url, title, post_slug, content, client, site_url, photo, submit_date, status) values (?, ?, ? ,?, ?, ?, ?, ?, ?, ?)', [$userr_id,$video_url,$title,$this->clean($title),$content,$client,$site_url,$namef,$site_date,$status]);
				
				}
				else
				{
				DB::insert('insert into portfolio (	user_id, title, post_slug, content, client, site_url, photo, submit_date, status) values (?, ? ,?, ?, ?, ?, ?, ?, ?)', [$userr_id,$title,$this->clean($title),$content,$client,$site_url,$namef,$site_date,$status]);
				  
				}
			return back()->with('success', 'Portfolio has been created. Once admin will be approved to view the portfolio');	
		}
		else
		{
		  return back()->with('error', 'Sorry! Your portfolio limit exceeded');
		}
		
			
        }
		
		
		
		
    }
	
	
	
	
	
	 
	
	
}
