<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use Auth;
use Crypt;
use URL;

class PortfolioController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $portfolio = DB::table('portfolio')
		                ->orderBy('id','desc')
					   ->get();

        return view('admin.portfolio', ['portfolio' => $portfolio]);
    }
	
	
	public function destroy($id) {
		
		$image = DB::table('portfolio')->where('id', $id)->first();
		$orginalfile=$image->photo;
		$photo="/media/";
       $path = base_path('images'.$photo.$orginalfile);
	  File::delete($path);
      DB::delete('delete from portfolio where id = ?',[$id]);
	   
      return back();
      
   }
   
   
   public function portfolio_status($action,$sid,$id,$user_id)
   {
     
	 if($user_id!=1 && $sid==1)
	 {
	    
		$check_port = DB::table('portfolio')
		              ->where('id','=', $id)
					  ->where('user_id','=', $user_id)
					  ->where('mail_sent','=', 0)
					  ->count();
		if(!empty($check_port))
		{
		    
			
			   $view_portfolio = DB::table('portfolio')
		              			->where('id','=', $id)
					  			->where('user_id','=', $user_id)
								->get();
			
			    $userr = DB::table('users')
		               ->where('id', '=', $user_id)
					   ->get();
			
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
				
				$email = $userr[0]->email;
				
				$name = $userr[0]->name;
				
				$title = $view_portfolio[0]->title;
				
				
				$datas = [
						'title' => $title, 'email' => $email,  'site_logo' => $site_logo, 'site_name' => $site_name
					];
					
					Mail::send('admin.portfolio_email', $datas , function ($message) use ($admin_email,$name,$email)
					{
						$message->subject('Your portfolio has been approved');
						
						$message->from($admin_email, $name);
			
						$message->to($email);
			
					}); 
		
		    
		
		   DB::update('update portfolio set mail_sent="1" where id = ?', [$id]);
		   
		   
		}			  
		
		
	 }
	 
	 
	 DB::update('update portfolio set status="'.$sid.'" where id = ?', [$id]);
	 return back();
	 
   }
   
   
   
   protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $portid = $data['portid'];
	   
	   foreach($portid as $pid)
	   {
   
   
		  $image = DB::table('portfolio')->where('id', $pid)->get();
			$orginalfile=$image[0]->photo;
			$userphoto="/media/";
		   $path = base_path('images'.$userphoto.$orginalfile);
		  File::delete($path);
		  
		  
		  
		  DB::delete('delete from portfolio where id = ?',[$pid]);
		   
		  
      
        }
   return back();
   }
   
   
	
}