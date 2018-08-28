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
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Portfolio</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
                  
                  
                   <form action="{{ route('admin.portfolio') }}" method="post">
                 
                 {{ csrf_field() }}
				  <div align="right">
                  
                  <?php if(config('global.demosite')=="yes"){?>
					
				   <a href="#" class="btn btn-danger btndisable">Delete All</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   <input type="submit" value="Delete All" class="btn btn-danger" id="checkBtn" onClick="return confirm('Are you sure you want to delete?');">
				  <?php } ?>
                  
                  
				  <?php if(config('global.demosite')=="yes"){?>
				  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-primary btndisable">Add Portfolio</a> 
				  <?php } else { ?>
				  <a href="<?php echo $url;?>/admin/add-portfolio" class="btn btn-primary">Add Portfolio</a>
				  <?php } ?>
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        
                         <th width="10%">
          <button type="button" id="selectAll" class="main">
          <span class="sub"></span> Select All </button></th>
                        
                          <th>Sno</th>
						  <th>Image</th>
                          <th>Title</th>
                          
                          <th>Username</th>
                          <th>Status</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $i=1;
					  foreach ($portfolio as $slide) { 
					  
					  
					  
						$today = date("Y-m-d");			 
									 
									 
					$user_namer_cnt = DB::table('users')
				           ->leftJoin('membership', 'membership.mid', '=', 'users.membership_plan')
						   ->where('users.id', '=', $slide->user_id)
						   ->where('users.id', '!=', 1)
						   ->where('users.membership_end_date', '>', $today)
						   ->where('users.payment_status', '!=', '')
						   ->count();
						   
					 
									 
									 
					if(!empty($user_namer_cnt))
					{				 
					
									 
					$user_namer = DB::table('users')
				           ->leftJoin('membership', 'membership.mid', '=', 'users.membership_plan')
						   ->where('users.id', '=', $slide->user_id)
						   ->where('users.id', '!=', 1)
						   ->where('users.membership_end_date', '>', $today)
						   ->where('users.payment_status', '!=', '')
						   ->get();					 				 
					 
					 }
					 
					 
					 
					 
					 
					 
					  ?>
    
						
                        <tr>
                        <td><input type="checkbox" name="portid[]" value="<?php echo $slide->id;?>"/></td>
                        
						 <td><?php echo $i;?></td>
						 <?php 
					   $photo="/media/";
						$path ='/local/images'.$photo.$slide->photo;
						if($slide->photo!=""){
						?>
						 <td><img src="<?php echo $url.$path;?>" class="thumb" width="70"></td>
						 <?php } else { ?>
						  <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="70"></td>
						 <?php } ?>
                          <td><?php echo $slide->title;?></td>
                          
                          
                          
                          <td><?php if(!empty($user_namer_cnt)){?><?php echo $user_namer[0]->name;?><?php } else { ?>admin<?php } ?></td>
                          
                          <?php
						  if($slide->status==0){ $btn = "btn btn-danger"; $text = "InActive"; $clr="red"; $sid = 1; } else { $btn = "btn btn-success"; $text = "Active"; $sid=0; $clr="green"; }
						  ?>
						  
                          
                          
                          <td style="color:<?php echo $clr;?>;"><?php echo $text;?></td>
						 
						  <td>
                          
                          
                          <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-success btndisable">Active</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/portfolio/action/1/{{ $slide->id }}/{{ $slide->user_id }}" class="btn btn-success">Active</a>
						  
				  <?php } ?>
                  
                  <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-success btndisable">InActive</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/portfolio/action/0/{{ $slide->id }}/{{ $slide->user_id }}" class="btn btn-success">InActive</a>
						  
				  <?php } ?>
                          
                          
                          
						  <?php if($slide->user_id==1){?>
						   <?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  
						  <a href="<?php echo $url;?>/admin/edit-portfolio/{{ $slide->id }}" class="btn btn-success">Edit</a>
						  <?php } ?>
                          <?php } ?>
				   <?php if(config('global.demosite')=="yes"){?>
				    <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						 <a href="<?php echo $url;?>/admin/portfolio/{{ $slide->id }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
						  <?php } ?>
                          
						  </td>
                        </tr>
                        <?php $i++;} ?>
                       
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
                </form>
                
              </div>
			  
			  
			  
		 
		  
		  
		  
        </div>
        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>

    
	
  </body>
</html>
