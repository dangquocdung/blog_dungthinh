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
		
		<?php $url = URL::to("/"); ?>
		
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count green"><?php echo $total_user;?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-picture-o"></i> Total Portfolio</span>
              <div class="count"><?php echo $portfolio;?></div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Blog</span>
              <div class="count"><?php echo $total_blog;?></div>
              
            </div>
            
             <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-comment-o"></i> Today Comments</span>
              <div class="count"> <?php echo $total_comment;?> </div>
              
            </div>
            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-book"></i> Total Pages</span>
              <div class="count"><?php echo $pages;?></div>
              
            </div>
            
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-book"></i> Total Newsletter</span>
              <div class="count"><?php echo $newsletter;?></div>
              
            </div>
            
           
          </div>
          <!-- /top tiles -->

		  <div style="clear:both;"></div>
		  	  
		  
		  
		  
		  
		  <br/><br/>
		  
		  
		  
          <div class="row">


            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Recent Blog</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 
                  <div class="widget_summary">
                   
				   
				   <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th width="20%">
                        <p>Sno</p>
                      </th>
                      <th width="30%">
                        
                          <p>Image</p>
                       </th>
					   <th width="50%">
                       
                          <p>Title</p>
                       
                      </th>
					  
					  
                    </tr>
					
					<?php 
					  $i=1;
					  if(!empty($blog_cnt))
					  {
					  foreach ($blog as $blogs) { 
					  
					  $post_comment = DB::table('post')
							 ->where('post_parent', '=', $blogs->post_id)
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->count();
							 ?>
                    <tr>
                    
                    <td><?php echo $i;?></td>
                    <td>
                      <?php 
					  
						$path ='/local/images/media/'.$blogs->post_image;
						if($blogs->post_media_type=="image"){
						?>
						 <img src="<?php echo $url.$path;?>" class="thumb" width="55">
						 <?php } if($blogs->post_media_type=="mp3"){ ?>
						  <img src="<?php echo $url.'/local/images/mp3.png';?>" class="thumb" width="55">
						 <?php } if($blogs->post_media_type=="video"){ ?>
						  <img src="<?php echo $url.'/local/images/video.png';?>" class="thumb" width="55">
						 <?php  } ?>
                          </td>
					
                    <td><?php echo $blogs->post_title;?></td>
                    
					</tr>
                  <tr height="20"></tr>
				  <?php $i++;} } ?>
				  
				  </table>
                </div>
				
                  </div>

                  
                  
                  
                 

                </div>
              </div>
            </div>

            
			
			
			

			
			

           
		   
		   
		   
		   
		   <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Top Portfolio</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 
                  <div class="widget_summary">
                   
				   
				   <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
					<th style="width:20%">
                       
                          <p>Sno</p>
                       
                      </th>
					
                      <th style="width:30%">
                        <p>Photo</p>
                      </th>
                      <th style="width:50%">
                        
                          <p>Title</p>
                       </th>
					   
					  
					  
                    </tr>
					
					
					 <?php 
					  $j=1;
					  foreach ($portfolios as $slide) { ?>
                       <tr height="10"></tr>
                    <tr>
                      
                      <td><?php echo $j;?></td>
					  <td>
					 <?php 
					   $photo="/media/";
						$path ='/local/images'.$photo.$slide->photo;
						if($slide->photo!=""){
						?>
						 <img src="<?php echo $url.$path;?>" class="thumb" width="55">
						 <?php } else { ?>
						  <img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="55">
						 <?php } ?>
                         </td>
                         
					  <td>
                      <?php echo $slide->title;?>
                      </td>
					  
                    </tr>
                    <tr height="20"></tr>
                    <?php $j++;} ?>
					
                  </table>
                </div>
				
                  </div>

                  
                  
                  
                 

                </div>
              </div>
            </div>
		  


          
		  
		  
		  <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Latest Users</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                 
                  <div class="widget_summary">
                   
				   
				   <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
					<th>
                       
                          <p>Photo</p>
                       
                      </th>
					
                      <th>
                        <p>Name</p>
                      </th>
                      <th>
                        
                          <p>Phone</p>
                       </th>
					   <th>
                       
                          <p>Gender</p>
                       
                      </th>
					  
					  
                    </tr>
					
					<?php foreach($users as $user){
						
						?>
					
                    <tr>
                      <?php 
					   $userphoto="/media/";
						$path ='/local/images'.$userphoto.$user->photo;
						if($user->photo!=""){
						?>
						 <td><img src="<?php echo $url.$path;?>" class="thumb" width="55"></td>
						 <?php } else { ?>
						  <td><img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="thumb" width="55"></td>
						 <?php } ?>
                      <td>
                       <?php echo $user->name;?>
                      </td>
					  
					  <td>
                      <?php echo $user->phone;?>
                      </td>
					  
					  <td>
                       <?php echo $user->gender;?>
                      </td>
                    </tr>
                    <tr height="20"></tr>
					<?php } ?>
                  </table>
                </div>
				
                  </div>

                  
                  
                  
                 

                </div>
              </div>
            </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
        </div>
        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>

    
	
  </body>
</html>
