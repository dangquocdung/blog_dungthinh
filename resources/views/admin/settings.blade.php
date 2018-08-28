<!DOCTYPE html>
<html lang="en">
  <head>
   
   @include('admin.title')
    
    @include('admin.style')
	
    <script type="text/javascript">
	


function showDiver(elem)
{
   
   if(elem.value == 'static')
   {
      document.getElementById('heading_banner').style.display = "block";
	  document.getElementById('subheading_banner').style.display = "block";
   }
   else if(elem.value == 'slider')
   {
       document.getElementById('heading_banner').style.display = "none";
	  document.getElementById('subheading_banner').style.display = "none";
   }
   else
   {
     document.getElementById('heading_banner').style.display = "none";
	  document.getElementById('subheading_banner').style.display = "none";
   }
   
}


function showLoad(elem)
{

   if(elem.value == "1")
   {
     document.getElementById('animated').style.display = "block";
   }
   else if(elem.value == "0")
   {
     document.getElementById('animated').style.display = "none";
   }
   else
   {
     document.getElementById('animated').style.display = "none";
	}

}
</script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            @include('admin.sitename');

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.welcomeuser')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.menu')
			
			
			
			
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('admin.top')
		
		
		
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                  
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
                <?php $url = URL::to("/"); ?>    
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.settings') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Settings</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Site Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_name" class="form-control col-md-7 col-xs-12"  name="site_name" value="<?php echo $settings[0]->site_name; ?>" required="required" type="text">
                        
					   </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Site Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
						   <textarea id="site_desc" class="form-control col-md-7 col-xs-12" name="site_desc"><?php echo $settings[0]->site_desc; ?></textarea>
                        </div>
                      </div>
					  
					  <input type="hidden" name="save_desc" value="<?php echo $settings[0]->site_desc; ?>">
                      
                      
                      <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Site Keyword</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_keyword" type="text" name="site_keyword" value="<?php echo $settings[0]->site_keyword; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
                      
                      
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Site Address
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
						   <textarea id="site_address" class="form-control col-md-7 col-xs-12" name="site_address"><?php echo $settings[0]->site_address; ?></textarea>
                        </div>
                      </div>
                      
                      
					  <input type="hidden" name="save_address" value="<?php echo $settings[0]->site_address; ?>">
					  
					  <input type="hidden" name="save_key" value="<?php echo $settings[0]->site_keyword; ?>">
					  
					  
					  <input type="hidden" name="save_facebook" value="<?php echo $settings[0]->site_facebook; ?>">
					  <input type="hidden" name="save_twitter" value="<?php echo $settings[0]->site_twitter; ?>">
					  <input type="hidden" name="save_gplus" value="<?php echo $settings[0]->site_gplus; ?>">
					  <input type="hidden" name="save_pinterest" value="<?php echo $settings[0]->site_pinterest; ?>">
					  <input type="hidden" name="save_instagram" value="<?php echo $settings[0]->site_instagram; ?>">
					  
					  <input type="hidden" name="save_copyright" value="<?php echo $settings[0]->site_copyright; ?>">
					  
                      
                       <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Email</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_email" type="text" name="site_email" value="<?php echo $settings[0]->site_email; ?>" required="required"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
                      
                      
                      
                      <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Phone No</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_phone" type="text" name="site_phone" value="<?php echo $settings[0]->site_phone; ?>" required="required"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
                      
                      
                      
                      
					  <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Facebook Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_facebook" type="text" name="site_facebook" value="<?php echo $settings[0]->site_facebook; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  
					  <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Twitter Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_twitter" type="text" name="site_twitter" value="<?php echo $settings[0]->site_twitter; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">GPlus Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_gplus" type="text" name="site_gplus" value="<?php echo $settings[0]->site_gplus; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  
					   <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Pinterest Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_pinterest" type="text" name="site_pinterest" value="<?php echo $settings[0]->site_pinterest; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  
					  
					  <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Instagram Link</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_instagram" type="text" name="site_instagram" value="<?php echo $settings[0]->site_instagram; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
		<div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Footer Copyright</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_copyright" type="text" name="site_copyright" value="<?php echo $settings[0]->site_copyright; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>	
                      
                      
                      
                      <div class="item form-group">
                        <label for="keyword" class="control-label col-md-3">Blog Post Per Page</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_post_per" type="text" name="site_post_per" value="<?php echo $settings[0]->site_post_per; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
                      
                      
                    
                      
                      
                      
                      		  
					  <input type="hidden" name="save_post_per" value="<?php echo $settings[0]->site_post_per; ?>">
                      
                      
                      
					   <?php /*?><div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="currency">Currency <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<select name="currency" required="required" class="form-control col-md-7 col-xs-12">
						<option value=""></option>
						<?php foreach($currency as $newcurrency){?>
							   <option value="<?php echo $newcurrency;?>" <?php if($settings[0]->site_currency==$newcurrency){?> selected="selected" <?php } ?>><?php echo $newcurrency;?></option>
						<?php } ?>
						</select>
                          
                        </div>
                      </div><?php */?>
					 
					  
					  
					  
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Logo
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="site_logo" name="site_logo" class="form-control col-md-7 col-xs-12">
						  
						   @if ($errors->has('site_logo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('site_logo') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					   
					  <?php 
					   $settingphoto="/media/";
						$path ='/local/images'.$settingphoto.$settings[0]->site_logo;
						if($settings[0]->site_logo!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$path;?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="100">
					  </div>
					  </div>
						<?php } ?>
						
						
						
						
						<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Favicon
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="site_favicon" name="site_favicon" class="form-control col-md-7 col-xs-12">
						   @if ($errors->has('site_favicon'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('site_favicon') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					  
					  
					  <?php 
					   $settingphotos="/media/";
						$paths ='/local/images'.$settingphotos.$settings[0]->site_favicon;
						if($settings[0]->site_favicon!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$paths;?>" class="thumb" width="24" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="24" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } ?>
						
						
						
						
						
						
						<?php /* ?><div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Static Banner
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="site_banner" name="site_banner" class="form-control col-md-7 col-xs-12"><br/>[Please select an image 1920px / 500px]
						   @if ($errors->has('site_banner'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('site_banner') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					  
					  
					   <?php 
					   $bannerphotos="/media/";
						$pathes ='/local/images'.$bannerphotos.$settings[0]->site_banner;
						if($settings[0]->site_banner!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$pathes;?>" class="thumb" width="200" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="100" style="border:1px solid #CCCCCC;">
					  </div>
					  </div>
						<?php } ?>
                        
                        <?php */?>
                        
                        
                       
						
						
						
						
						
						
						<?php /* ?><div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Home page header type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="header_type" id="header_type" class="form-control" required="required">
						<option value="">Select</option>
									<option value="static" <?php { if($settings[0]->header_type=="static") echo "selected='selected'"; }?>>Static Banner</option>
									<option value="slider" <?php { if($settings[0]->header_type=="slider") echo "selected='selected'"; }?>>Slideshow</option>
								</select>
						
                          
                        </div>
                      </div><?php */?>
						
						 
					 <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Homepage Layout <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_layout" id="site_layout" class="form-control" required="required">
						<option value="">Select</option>
									<option value="3" <?php { if($settings[0]->site_layout=="3") echo "selected='selected'"; }?>>3 column</option>
									<option value="4" <?php { if($settings[0]->site_layout=="4") echo "selected='selected'"; }?>>4 column</option>
                                    <option value="5" <?php { if($settings[0]->site_layout=="5") echo "selected='selected'"; }?>>5 column</option>
								</select>
						
                          
                        </div>
                      </div>	
                        
                        
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Page Loading Animation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="site_loading" id="site_loading" class="form-control" required="required" onChange="showLoad(this)">
						<option value="">Select</option>
									<option value="1" <?php { if($settings[0]->site_loading=="1") echo "selected='selected'"; }?>>On</option>
									<option value="0" <?php { if($settings[0]->site_loading=="0") echo "selected='selected'"; }?>>Off</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      <div id="animated" <?php if($settings[0]->site_loading!="1"){?> style="display:none;" <?php } ?>>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Animated Gif Image 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="site_loading_url" name="site_loading_url" <?php if($settings[0]->site_loading_url==""){?>required="required"<?php } ?> class="form-control col-md-7 col-xs-12"><br/>
                          ( Gif format only )						  
						   @if ($errors->has('site_loading_url'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('site_loading_url') }}</strong>
                                    </span>
                                @endif
						  
                        </div>
                      </div>
					   
					  <?php 
					   $setting_gif="/media/";
						$pathh ='/local/images'.$setting_gif.$settings[0]->site_loading_url;
						if($settings[0]->site_loading_url!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$pathh;?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="logo" width="100">
					  </div>
					  </div>
						<?php } ?>
                      </div>
                      
                      <input type="hidden" name="save_loading_url" value="<?php echo $settings[0]->site_loading_url;?>">
					  
					  
					  
                      
                      
                      
                      <div class="item form-group">
                
                         <label for="amount" class="control-label col-md-3">Payment Option</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<?php 
						
						
						$array_payment =  explode(',', $settings[0]->payment_option);
						
						
						foreach($payment as $draw){?>
						<input type="checkbox" name="payment_opt[]" value="<?php echo $draw;?>" <?php  if(in_array($draw,$array_payment)){?> checked <?php } ?> > <?php echo $draw;?><br/>
						<?php } ?>
						</div>
						
						</div>
                      
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Paypal site Mode <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						
						<select name="paypal_url" id="paypal_url" class="form-control" required="required">
						<option value="">Select</option>
									<option value="https://www.sandbox.paypal.com/cgi-bin/webscr" <?php { if($settings[0]->paypal_url=="https://www.sandbox.paypal.com/cgi-bin/webscr") echo "selected='selected'"; }?>>Test</option>
									<option value="https://www.paypal.com/cgi-bin/webscr" <?php { if($settings[0]->paypal_url=="https://www.paypal.com/cgi-bin/webscr") echo "selected='selected'"; }?>>Live</option>
								</select>
						
                          
                        </div>
                      </div>
                      
                      
                      
                      
                      
					  
					  <div class="item form-group">
                        <label for="amount" class="control-label col-md-3">Paypal Id</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="paypal_id" type="text" name="paypal_id" value="<?php echo $settings[0]->paypal_id; ?>"  class="form-control col-md-7 col-xs-12" required="required">
						  
                        </div>
                      </div>
					  
					  
					  
					  
					   
                      
                      
                      
                      
                      
                
                <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Stripe site Mode <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
						
						<select name="stripe_mode" id="stripe_mode" class="form-control" required="required">
						<option value="">Select</option>
									<option value="test" <?php { if($settings[0]->stripe_mode=="test") echo "selected='selected'"; }?>>Test</option>
									<option value="live" <?php { if($settings[0]->stripe_mode=="live") echo "selected='selected'"; }?>>Live</option>
								</select>
						
                          
                        </div>
                      </div>
					  
                      
                      
                      
                      
                       
                         <div class="item form-group" id="stripe_test_publish" <?php if($settings[0]->stripe_mode!="test"){?>style="display:none;"<?php } ?>>
               
                
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Test Publishable key <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                        
                          <input id="test_publish_key" type="text" name="test_publish_key" value="<?php echo $settings[0]->test_publish_key; ?>"  class="form-control" required="required">
						  
                        </div>
                      </div>
					  
                      
                      <div class="item form-group" id="stripe_test_secret" <?php if($settings[0]->stripe_mode!="test"){?>style="display:none;"<?php } ?>>
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Test Secret key <span class="required">*</span>
                        </label>
                        
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  
                          <input id="test_secret_key" type="text" name="test_secret_key" value="<?php echo $settings[0]->test_secret_key; ?>"  class="form-control" required="required">
						  
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
                      
                       <div class="item form-group" id="stripe_live_publish" <?php if($settings[0]->stripe_mode!="live"){?>style="display:none;"<?php } ?>>
                            
                
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Live Publishable key <span class="required">*</span>
                        </label>
                        
					  <div class="col-md-6 col-sm-6 col-xs-12">
                       
                       
                          <input id="live_publish_key" type="text" name="live_publish_key" value="<?php echo $settings[0]->live_publish_key; ?>"  class="form-control" required="required">
						  
                        </div>
                      </div>
					  
                      
                      
                      <div class="item form-group" id="stripe_live_secret" <?php if($settings[0]->stripe_mode!="live"){?>style="display:none;"<?php } ?>>
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="commission mode">Live Secret key <span class="required">*</span>
                        </label>
                        
					  <div class="col-md-6 col-sm-6 col-xs-12">
                      
               	  
					   
                          <input id="live_secret_key" type="text" name="live_secret_key" value="<?php echo $settings[0]->live_secret_key; ?>"  class="form-control" required="required">
						  
                        </div>
                      </div>
					  
					  
                      
                      
					 
					 
					  
					  
						
						
						<div class="item form-group">
                        <label for="api" class="control-label col-md-3">Google Map Api Key</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_map_api" type="text" name="site_map_api" value="<?php echo $settings[0]->site_map_api; ?>"  class="form-control col-md-7 col-xs-12">
						  
                        </div>
                      </div>
					  
					  
					  
					  
					  <div class="item form-group">
                        <label for="api" class="control-label col-md-3">Site Url</label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="site_url" type="text" name="site_url" value="<?php echo $settings[0]->site_url; ?>"  class="form-control col-md-7 col-xs-12">
						  <br/> ( ex : http://www.yoursite.com/ )
                        </div>
                      </div>
                      
                      
                      
                      <input type="hidden" name="save_map_api" value="<?php echo $settings[0]->site_map_api; ?>">
                      
					  <input type="hidden" name="save_header_type" value="<?php echo $settings[0]->header_type; ?>">
                      
                      
                       
                       <input type="hidden" name="image_size" value="<?php echo $settings[0]->image_size; ?>">
                       <input type="hidden" name="image_type" value="<?php echo $settings[0]->image_type; ?>">
					  
					 
					  
					  <input type="hidden" name="save_siteurl" value="<?php echo $settings[0]->site_url; ?>">
					  
						
						
						
						
					  
					  <input type="hidden" name="currentlogo" value="<?php echo $settings[0]->site_logo;?>">
					  
					  
					  <input type="hidden" name="currentfav" value="<?php echo $settings[0]->site_favicon;?>">
					  
					  <input type="hidden" name="currentban" value="<?php echo $settings[0]->site_banner;?>">
					 
					  
					  
					  
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/settings" class="btn btn-primary">Cancel</a>
						  <?php if(config('global.demosite')=="yes"){?><button type="button" class="btn btn-success btndisable">Submit</button> 
								<span class="disabletxt">( <?php echo config('global.demotxt');?> )</span><?php } else { ?>
						  
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
								<?php } ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
			  
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>

    
	
  </body>
</html>
