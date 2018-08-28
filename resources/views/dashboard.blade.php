<!DOCTYPE html>
<html lang="en">
<head>

   

   @include('style')
	




</head>
<body>

    

    <!-- fixed navigation bar -->
    @include('header')

    <!-- slider -->
    

    

	
    
	
	<div class="pagetitle" align="center">
        
           
                <h2 class="text-center blog">Dashboard</h2>
           
       
    </div>
	
    
	
	
	
	
	
	
	
	
	
	
	
	
	
	<main class="main-wrapper-inner blog-wrapper" id="container">

            	<div class="container">

                	<div class="wrapper-inner">
	
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
    <div class="profile">
		<div class="col-md-3">
        <div class="height20"></div>
			<div class="profile-sidebar">
				
				<div class="profile-userpic" align="center">
				<?php 
				$url = URL::to("/");
				$userphoto="/media/";
						$path ='/local/images'.$userphoto.$editprofile[0]->photo;
						if($editprofile[0]->photo!=""){?>
					<img src="<?php echo $url.$path;?>" class="img-responsive round" alt="">
						<?php } else { ?>
						<img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="img-responsive round" alt="">
						<?php } ?>
				</div>
				<div class="height20"></div>
				<div class="profile-usertitle text-center">
					
					<?php $sta=$editprofile[0]->admin; if($sta==1){ $viewst="Admin"; } else if($sta==2) { $viewst="Seller"; } else if($sta==0) { $viewst="Customer"; } ?>
					
				</div>
				
				
				
				<div class="profile-usermenu" align="center">
					<ul class="nav">
						
                       
                        
                        
						<li>
							<a href="<?php echo $url;?>/dashboard" class="ash h4">
							
                            <i class="lnr lnr-home  bold"></i>
							Account Settings </a>
						</li>
						
						<li>
							<a href="<?php echo $url;?>/my-comments" class="ash h4">
							
                            <i class="lnr lnr-bubble  bold"></i>
							My comments <span class="roundbg"><?php echo $viewpost;?></span></a>
						</li>
						
						<?php if($sta!=1){?>
						<li>
						<?php if(config('global.demosite')=="yes"){?>
						<a href="#" class="btndisable ash h4"> <i class="lnr lnr-trash bold"></i>
							Delete Account <span class="disabletxt" style="font-size:13px;">( <?php echo config('global.demotxt');?> )</span>
							</a> 
						<?php } else { ?>
						
							<a href="<?php echo $url;?>/delete-account" onClick="return confirm('Are you sure you want to delete your account?');" class="ash h4">
							
							
                            <i class="lnr lnr-trash bold"></i>
							Delete Account
							</a>
						<?php } ?>
						</li>
						<?php } ?>
						
						<li>
							<a href="<?php echo $url;?>/logout" class="ash h4">
							
                            <i class="lnr lnr-exit bold"></i>
							Log Out </a>
						</li>
					</ul>
				</div>
				
			</div>
		</div>
		<div class="col-md-9 moves20">
        
        <?php if(Auth::user()->id!=1){?>
        <?php if(!empty($view_member_count)){
		
		$type = $view_member[0]->membership_name;
		$today = date("Y-m-d");
		$startTimeStamp = strtotime($today);
$endTimeStamp = strtotime($editprofile[0]->membership_end_date);

$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400; 


$numberDays = intval($numberDays);

		
		?>
               <div class="float-left green">Account Type : <?php echo $type;?></div>
               <?php if($endTimeStamp > $startTimeStamp ){?>
               <div class="float-right red">Account Expiry  : <?php echo $numberDays;?> days left</div>
               <?php } else { ?>
               <div class="float-right red">Your account is expired. Please <a href="<?php echo $url;?>/membership">renewal</a> account</div>
               <?php } ?>
			<?php } ?> 
            
            <?php } ?>
              
               <div class="clearfix"></div>
			   <div class="panel-body" style="border:1px solid #ccc !important;">
               
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('dashboard') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
<div class="height20"></div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control validate[required] text-input radiusoff" name="name" value="<?php echo $editprofile[0]->name;?>" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control validate[required,custom[email]] text-input radiusoff" name="email" value="<?php echo $editprofile[0]->email;?>">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control radiusoff"  name="password" value="">

                                
                            </div>
                        </div>

                        
						
						<input type="hidden" name="savepassword" value="<?php echo $editprofile[0]->password;?>">
						
						 <input type="hidden" name="id" value="<?php echo $editprofile[0]->id; ?>">
						
						 <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone No</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control validate[required] text-input radiusoff" value="<?php echo $editprofile[0]->phone;?>" name="phone">
								@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
							<select name="gender" class="form-control validate[required] text-input radiusoff">
							  
							  <option value=""></option>
							   <option value="male" <?php if($editprofile[0]->gender=='male'){?> selected="selected" <?php } ?>>Male</option>
							   <option value="female" <?php if($editprofile[0]->gender=='female'){?> selected="selected" <?php } ?>>Female</option>
							</select>
                               
                            </div>
                        </div>
						
						
						
						
						<div class="form-group">
                            <label for="phoneno" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input type="file" id="photo" name="photo" class="form-control radiusoff">
								@if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						<input type="hidden" name="currentphoto" value="<?php echo $editprofile[0]->photo;?>">
						
						
						<input type="hidden" name="usertype" value="<?php echo $editprofile[0]->admin;?>">
                        
                        <input type="hidden" name="save_gender" value="<?php echo $editprofile[0]->gender;?>">
						

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							<?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-primary btndisable">Update</button> <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
							
                                <button type="submit" class="newcustombtn">
                                    Update
                                </button>
							<?php } ?>
                            </div>
                        </div>
                    </form>
                   
                </div>
				
				
			   
			    <div class="height20"></div>
			    <div class="profile-content">
			   
			   @if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
			   
			   
            </div>
		</div>
	</div>


	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 <div class="height30"></div>
	 <div class="row">
	
	
	
	
	
	</div>
	
	</div>
	</div>
	<div class="clearfix height50"></div>
	</main>
    

      @include('footer')
</body>
</html>