<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
?>
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    			   
     
    

	
    
	
	<div class="pagetitle container" align="center">
        
           
                <h2 class="black text-center">Add Portfolio</h2>
                <?php if(!empty($mcheck)){?><h4 style="color:#FF0000;"><?php echo $mcheck_left[0]->portfolio_limit - $get_portfolio;?> Portfolio Left</h4><?php } ?>
      
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<main class="main-wrapper-inner blog-wrapper" id="container">

            	<div>

                	<div class="wrapper-inner">
    
    
			<div id="page-inner"> 
                  <div class="row">
                    
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
    
    
    
    
    <form class="form-horizontal form-label-left" role="form" id="formID"  method="POST" action="{{ route('add_portfolio') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="title" class="form-control validate[required] col-md-7 col-xs-12"  name="title" value=""  type="text" required="required">
						   @if ($errors->has('title'))
                                    <span class="help-block" style="color:red;">
                                        <strong>That title is already exists</strong>
                                    </span>
                                @endif
                        
					   </div>
                      </div>
                      
					  
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="content" class="form-control validate[required] col-md-7 col-xs-12" name="content"></textarea>
					   </div>
                      </div>
					  
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Client <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="client" class="form-control validate[required] col-md-7 col-xs-12"  name="client" value=""  type="text">
					   </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Site Url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="site_url" class="form-control validate[required] col-md-7 col-xs-12"  name="site_url" value=""  type="text">
					   </div>
                      </div>
                      
                      
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="site_date" class="form-control validate[required] col-md-7 col-xs-12"  name="site_date" value="" type="text">  
                       
					   </div>
                      </div>
                       <script type="text/javascript">
						$('#site_date').datepicker({
							/*dateFormat: 'mm-dd-yy',
							timeFormat: "hh:mm:ss tt",*/
							
							dateFormat: 'yy-mm-dd'
						});
						</script> 
                      
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="photo" name="photo" class="form-control validate[required] col-md-7 col-xs-12">
						  
						  @if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
                      
                      
                      <?php if(!empty($membership_check)){?>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Youtube Video Url
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="video_url" class="form-control col-md-7 col-xs-12"  name="video_url" value=""  type="text">
                         (optional)
					   </div>
                      </div>
					  <?php } ?>
					  
					  
					  
                      <?php $url = URL::to("/"); ?>
                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/my-portfolio" class="btn btn-primary radiusoff">Cancel</a>
                          <?php if(!empty($mcheck)){?>
                          <button id="send" type="submit" class="btn btn-success radiusoff">Submit</button>
                          <?php } else { ?>
                          <a href="javascript:void(0);" onClick="alert('Your membership is expired or inactive')" class="btn btn-success radiusoff">Submit</a>
                          <?php } ?>
                        </div>
                      </div>
                    </form>
    
    
    
    
    
    
    
    
                        
                   
                    <!--End Advanced Tables -->
               
            </div>
                <!-- /. ROW  -->
            </div>
		</div>
	
    
    
	</div>
	
	<div class="clearfix height50"></div>
	

     </main>

      @include('footer')
</body>
</html>