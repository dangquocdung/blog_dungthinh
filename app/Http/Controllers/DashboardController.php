<?php

namespace Responsive\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use File;
use Image;

class DashboardController extends Controller
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
    public function index()
    {
        $userid = Auth::user()->id;
		$editprofile = DB::select('select * from users where id = ?',[$userid]);
		
		
		$viewpost = DB::table('post')
		        ->where('post_type', '=' , 'comment')
				->where('post_user_id', '=' , $userid)
		        
				->count();
				
				
		$view_member = DB::table('membership')
		        ->where('membership_status', '=' , 1)
				->where('mid','=',$editprofile[0]->membership_plan)
				
		        ->get();
				
	$view_member_count = DB::table('membership')
		        ->where('membership_status', '=' , 1)
				->where('mid','=',$editprofile[0]->membership_plan)
				
				->count();		
				
		
		$data = array('editprofile' => $editprofile, 'viewpost' => $viewpost, 'view_member' => $view_member, 'view_member_count' => $view_member_count);
		return view('dashboard')->with($data);
    }
	
	
	
	public function membership()
	{
	
	$userid = Auth::user()->id;
	
	$view_member = DB::table('membership')
		        ->where('membership_status', '=' , 1)
				->orderBy('mid','asc')
		        ->get();
				
	$view_member_count = DB::table('membership')
		        ->where('membership_status', '=' , 1)
				->orderBy('mid','asc')
				->count();
				
	$siteid=1;
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);			
	
	$data = array('view_member' => $view_member, 'view_member_count' => $view_member_count, 'site_setting' => $site_setting);
	return view('membership')->with($data);
	}
	
	
	
	
	
	
	
	public function mycomments()
    {
	$userid = Auth::user()->id;
	
	$viewpost = DB::table('post')
		        ->where('post_type', '=' , 'comment')
				->where('post_user_id', '=' , $userid)
		        
				->get();
				
	$postcount = DB::table('post')
		        ->where('post_type', '=' , 'comment')
				->where('post_user_id', '=' , $userid)
		        
				->count();			
				
	$data = array('viewpost' => $viewpost, 'postcount' => $postcount);
	return view('my-comments')->with($data);
	}
	
	
	public function mycomments_destroy($id) {
		
		
	   
	   DB::delete('delete from post where post_type="comment" and post_id = ?',[$id]);
     
	   
      return back();
      
   }
	
	
	
	
	
	
	
	public function avigher_logout()
	{
		Auth::logout();
       return back();
	}
	
	
	public function avigher_deleteaccount()
	{
		$userid = Auth::user()->id;
		
		
		
		
		
		
	  DB::delete('delete from post where post_type="comment" and post_user_id = ?',[$userid]);
	  
		
		
		DB::delete('delete from users where id!=1 and id = ?',[$userid]);
		return back();
	}
	
	
	
	
	 protected function avigher_edituserdata(Request $request)
    {
       
		
		
		
		 $this->validate($request, [

        		'name' => 'required',

        		'email' => 'required|email'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['email'] = Input::get('email');
       
		$input['name'] = Input::get('name');
		
		
		$rules = array(
        
       
		
        'email'=>'required|email|unique:users,email,'.$id,
		'name' => 'required|regex:/^[\w-]*$/|max:255|unique:users,name,'.$id,
		'photo' => 'max:1024|mimes:jpg,jpeg,png',
		'phone' => 'required|max:255|unique:users,phone,'.$id
		
		
        );
		
		
		$messages = array(
            
            'email' => 'The :attribute field is already exists',
            'name' => 'The :attribute field must only be letters and numbers (no spaces)'
			
        );
		
		
		
		
		
		 $validator = Validator::make(Input::all(), $rules, $messages);

		

		if ($validator->fails())
		{
			 $failedRules = $validator->failed();
			 
			return back()->withErrors($validator);
		}
		else
		{ 
		  

		$name=$data['name'];
		$email=$data['email'];
		$password=bcrypt($data['password']);
		
		
		
		$phone=$data['phone'];
		
		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $userphoto="/userphoto/";
			$delpath = base_path('images'.$userphoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$userphoto.$filename);
      
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}			
		
		
		if($data['password']!="")
		{
			$passtxt=$password;
		}
		else
		{
			$passtxt=$data['savepassword'];
		}
		
		$admin=$data['usertype'];
		
		if($data['gender']!="")
		{
		    $gendor = $data['gender'];
		}
		else
		{
		   $gendor = $data['save_gender'];
		}
		
		
		DB::update('update post set post_email="'.$email.'" where post_type="comment" and post_user_id = ?', [$id]);
		
		
		
		DB::update('update users set name="'.$name.'",email="'.$email.'",password="'.$passtxt.'",phone="'.$phone.'",gender="'.$gendor.'",photo="'.$savefname.'",admin="'.$admin.'" where id = ?', [$id]);
		
		
		
			return back()->with('success', 'Account has been updated');
        }
		
		
		
		
    }
	
	
}
