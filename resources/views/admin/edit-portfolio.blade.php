<!DOCTYPE html>
<html lang="en">
  <head>
   
   @include('admin.title')
    
    @include('admin.style')
	
    
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
                    
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.edit-portfolio') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Edit Portfolio</span>

                     
                     
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="title" class="form-control col-md-7 col-xs-12"  name="title" value="<?php echo $portfolio[0]->title;?>"  type="text" required="required">
						   @if ($errors->has('title'))
                                    <span class="help-block" style="color:red;">
                                        <strong>That title is already exists</strong>
                                    </span>
                                @endif
                        
					   </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea id="content" class="form-control col-md-7 col-xs-12" name="content"><?php echo $portfolio[0]->content;?></textarea>
					   </div>
                      </div>
                      
                      
                      
					  <input type="hidden" name="save_title" value="<?php echo $portfolio[0]->title;?>">
                       <input type="hidden" name="save_content" value="<?php echo $portfolio[0]->content;?>">
					  
					  
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Client
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="client" class="form-control col-md-7 col-xs-12"  name="client" value="<?php echo $portfolio[0]->client;?>"  type="text">
					   </div>
                      </div>
                      
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Site Url
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input id="site_url" class="form-control col-md-7 col-xs-12"  name="site_url" value="<?php echo $portfolio[0]->site_url;?>"  type="text">
					   </div>
                      </div>
                      
                      <input type="hidden" name="save_client" value="<?php echo $portfolio[0]->client;?>">
                       <input type="hidden" name="save_site_url" value="<?php echo $portfolio[0]->site_url;?>">
                     
                       <input type="hidden" name="save_site_date" value="<?php echo $portfolio[0]->submit_date;?>">
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Date
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="site_date" class="form-control col-md-7 col-xs-12"  name="site_date" value="<?php echo $portfolio[0]->submit_date;?>" type="text">  
                       
					   </div>
                      </div>
                       <script type="text/javascript">
$('#site_date').datepicker({
	/*dateFormat: 'mm-dd-yy',
	timeFormat: "hh:mm:ss tt",*/
	
	dateFormat: 'yy-mm-dd'
});
</script> 
                     
                                        
                     
					  <input type="hidden" name="id" value="<?php echo $portfolio[0]->id; ?>">
					  
					  
					  
					   <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12" <?php if(empty($portfolio[0]->photo)){?> required="required" <?php } ?>>
						  
						  @if ($errors->has('photo'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                        </div>
                      </div>
					   <?php $url = URL::to("/"); ?>
					  <?php 
					   $photo="/media/";
						$path ='/local/images'.$photo.$portfolio[0]->photo;
						if($portfolio[0]->photo!=""){
						?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.$path;?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } else { ?>
					  <div class="item form-group" align="center">
					  <div class="col-md-6 col-sm-6 col-xs-12">
					  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="100">
					  </div>
					  </div>
						<?php } ?>
					  
					  <input type="hidden" name="currentphoto" value="<?php echo $portfolio[0]->photo;?>">
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/portfolio" class="btn btn-primary">Cancel</a>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
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
