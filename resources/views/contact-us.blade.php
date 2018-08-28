<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    
    
    
    
    
    
    
    <main class="main-wrapper-inner" id="container">

            	<div class="container">

                    <div class="wrapper-inner">

                    	<!-- map -->

                        <div class="map-wrapper">

                             <?php if(!empty($setting[0]->site_address)){?>
    
    <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $setting[0]->site_map_api;?>&q=<?php echo $setting[0]->site_address;?>" allowfullscreen>
	</iframe>
   
    <?php } ?>

                        </div>

                        <!-- map -->

                        <!-- contact -->

                        <div class="contact-wrapper">

                        	<!-- left -->

                        	<div class="small-block-grid-12 medium-block-grid-12 large-block-grid-12">

                            	<div class="col-md-4 text-center">
                                 <h4>Our Address</h4>
                                <p><?php echo $setting[0]->site_address;?></p>
                                </div>
                                
                                <div class="col-md-4 text-center">
                                <h4>Contact Number</h4>
                                <p><?php echo $users[0]->phone;?></p>
                                </div>
                                
                                <div class="col-md-4 text-center">
                                <h4>Email Address</h4>
                                <p><?php echo $users[0]->email;?></p>
                                </div>

                            </div>

                            <!-- left -->

                            <!-- right -->
<div class="clearfix height40"></div>
	   <div class="clearfix height10"></div>
                            <div>

                            	<header>

                                	<h4 class="text-center">Feel Free to Contact Me</h4>

                                </header>

                                <!-- contact-form -->

                                <div class="contact-form">

                                    <div id="message"></div>

                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('contact-us') }}" id="formID" enctype="multipart/form-data">{{ csrf_field() }}
                                        <div class="col-md-4 col-sm-12">
                                    	<label>Whats your name <span>*</span>

                                        	<input  name="name" id="name" type="text" class="form-control validate[required] text-input paddingoff border radiusoff">

                                        </label>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-12 ">

                                        <label>Whats your email <span>*</span>

                                        	<input  name="email" id="email" type="text" class="form-control validate[required,custom[email]] text-input paddingoff border radiusoff">

                                        </label>
                                        </div>
                                        
                                        
                                        <div class="col-md-4 col-sm-12">
                                        <label>Phone No <span>*</span>

                                        	<input  name="phone_no" id="phone_no" type="text" class="form-control validate[required] text-input paddingoff border radiusoff">

                                        </label>
                                        </div>
                                         

                                        <div class="clearfix"></div>
										<div class="col-md-12"> 
                                        <label>Whats in your mind <span>*</span>

                                        	<textarea name="msg" id="msg" cols="" rows="6" class="form-control validate[required] text-input paddingoff  border radiusoff"></textarea>

                                        </label>
                                        </div>

                                        <div class="clearfix"></div>
                                         <div class="col-md-12">
                                        <input name="" type="submit" value="Send Mail">
                                         </div>
                                    	

                                    </form>

                                </div>

                                <!-- contact-form -->

                            </div>

                            <!-- right -->

                        </div>

                        <!-- contact -->

                    </div>

                </div>

            </main>
	
	
	
	
	
	
	
	
	
	
	
	
	

      

      @include('footer')
       
</body>
</html>