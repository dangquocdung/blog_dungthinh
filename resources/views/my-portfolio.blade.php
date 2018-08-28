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

    
     
    

	
    
	
	<div class="pagetitle" align="center">
        
           
                <h2 class="black text-center">My Portfolio</h2>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<main class="main-wrapper-inner blog-wrapper" id="container">

            	<div class="container">

                	<div class="wrapper-inner">
    
    
			<div id="page-inner"> 
                  <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingoff">
                    <!-- Advanced Tables -->
                   <?php
				   $userr_id = Auth::user()->id;
				   $today = date("Y-m-d");
				   $membership_check = DB::table('users')
				           ->leftJoin('membership', 'membership.mid', '=', 'users.membership_plan')
						   ->where('users.id', '=', $userr_id)
						   ->where('users.membership_end_date', '>', $today)
						   ->where('users.payment_status', '=', 'completed')
						   ->count();
				   ?>
                        <div class="float-left">
                        
                        </div>
                        <div class="float-right">
                        <?php if(!empty($membership_check)){?>
                        <a href="<?php echo $url;?>/add_portfolio" class="newcustombtn">Add Portfolio</a>
                        <?php } else {?>
                        <a href="<?php echo $url;?>/membership" class="newcustombtn" onClick="return confirm('Your membership is expired or inactive');">Add Portfolio</a>
                        <?php } ?>
                        </div>
                        
                    </div>    
                       <div class="clearfix height10"></div> 
                        
                            <div class="overx">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            
                                            
                          <th>Sno</th>
						  <th>Image</th>
                          <th>Title</th>
                          <th>Status</th>
                          <th>Action</th>
                                            
                                        </tr>
                                    </thead>
									<tbody>
									 <?php 
					  $i=1;
					  foreach ($portfolio as $slide) { 
											
								if($slide->status==1){ $status = "Approved"; $color ="#078748"; } else {  $status = "Unapproved"; $color ="#CB2027"; }			
									?>  									
										<tr>
											
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
                         				
											<td style="color:<?php echo $color;?>"><?php echo $status;?></td>											
											<td><a href="<?php echo $url;?>/my-portfolio/<?php echo $slide->id;?>" onClick="return confirm('Are you sure you want to delete');"><img src="<?php echo $url;?>/local/images/delete.png" border="0" alt="delete" /></a></td>
										</tr>
										<?php $i++; }  ?>		
									</tbody>
															
                                </table>
                            </div>
                        
                   
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