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

    
     
    

	
    <?php if(!empty($query_cnt)){?>
	

	<main class="main-wrapper-inner" id="container">

            	<div class="container">

                	<div class="wrapper-inner">

                    
                    <div class="container paddingoff">
                    
                    <div class="fleft">	
                       <?php if(!empty($query[0]->photo)){?>
                    	<figure class="details-image">

                        	<img src="<?php echo $url;?>/local/images/media/<?php echo $query[0]->photo;?>" alt="" class="img-responsive" style="max-height:400px;"/>

                        </figure>
                        <?php } ?>
                     </div>
                     
                       <div class="fleft moveleft20 portdesc">	
                      
                         <div class="portline">
                        <div> <label>Client : </label> <?php if(!empty($query[0]->client)){?><?php echo $query[0]->client;?><?php } ?></div>
                        <div>  <label>Site Url : </label> <?php if(!empty($query[0]->site_url)){?><a href="<?php echo $query[0]->site_url;?>" target="_blank"><?php echo $query[0]->site_url;?></a><?php } ?></div>
                        
                        <div> <label>Date : </label> <?php if(!empty($query[0]->submit_date)){?><?php echo date("m-d-Y", strtotime($query[0]->submit_date));?><?php } ?></div>
                         </div>
                      
                       </div>
                       
                       </div> 
                       
                       
                       <div class="clearfix"></div>
                       

                        <div class="about-content">

                        	

                            <section>

                            	<h3><?php echo $query[0]->title;?></h3>

                            	<div><?php echo $query[0]->content;?></div>

                                <?php
								if (strpos($query[0]->video_url, 'youtube') > 0) {
					 $vurl = $query[0]->video_url;
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
						$id = $matches[1];
						
						$height = '420px';
					?>
                    <div style="margin-top:10px;">
                    <iframe id="ytplayer" type="text/html" width="100%" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <?php } ?>

                            </section>

                            <!-- right -->

                        </div>

                      <div class="clearfix"></div>

                        <!-- content -->
                      <div class="col-md-6 paddingoff">
          <?php if(!empty($previous)){
		
		?>
         <div class="text-left"><a href="<?php echo $url;?>/portfolio/<?php echo $previous_link[0]->post_slug;?>" class="custombtn"><i class="fa fa-chevron-left" aria-hidden="true"></i> <?php echo '  '.$previous;?></a></div>
         <?php } ?>
         </div>
         
         
         <div class="col-md-6 paddingoff">
         <?php if(!empty($next)){
		
		 ?>
         <div class="text-right"><a href="<?php echo $url;?>/portfolio/<?php echo $next_link[0]->post_slug;?>" class="custombtn"><?php echo $next.'  ';?> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
          <?php } ?>
         </div>
                   <div class="clearfix height40"></div>     
                    
                    </div>

                </div>

            </main>
	
	
	<?php } ?>
	
	
	
	
	
	
	
	
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>