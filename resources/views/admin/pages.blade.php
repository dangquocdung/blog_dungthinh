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
                    <h2>Pages</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                       <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
					
                  </div>
                  
                  <form action="{{ route('admin.pages') }}" method="post">
                 
                 {{ csrf_field() }}
				  <div align="right">
                  
                   <?php if(config('global.demosite')=="yes"){?>
					
				   <a href="#" class="btn btn-danger btndisable">Delete All</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   <input type="submit" value="Delete All" class="btn btn-danger" id="checkBtn" onClick="return confirm('Are you sure you want to delete?');">
				  <?php } ?>
                  
				   <?php if(config('global.demosite')=="yes"){?>
				  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-primary btndisable">Add Page</a> 
				  <?php } else { ?>
				  <a href="<?php echo $url;?>/admin/add-page" class="btn btn-primary">Add Page</a>
				  <?php } ?>
                  
                  </div>
                  
				
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        
                        <th width="10%">
          <button type="button" id="selectAll" class="main">
          <span class="sub"></span> Select All </button></th>
                        
                          <th>Sno</th>
						  
                          <th>Heading</th>
                          
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
					  <?php 
					  $i=1;
					  foreach ($pages as $page) { ?>
    
						
                        <tr>
                        <td><input type="checkbox" name="pageid[]" value="<?php echo $page->page_id;?>"/></td>
                        
						 <td><?php echo $i;?></td>
						
                          <td><?php echo substr($page->page_title,0,30);?></td>
                          
						  
						  <td>
						  <?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  <a href="<?php echo $url;?>/admin/edit-page/{{ $page->page_id }}" class="btn btn-success">Edit</a>
				  <?php } ?>
                  
                  <?php if($page->page_id!=4){?>
                  <?php if(config('global.demosite')=="yes"){?>
				   <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						 <a href="<?php echo $url;?>/admin/pages/{{ $page->page_id }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
						 
					 <?php } ?>
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
