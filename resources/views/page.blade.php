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

    
     
    

	
    <?php if(!empty($page_cnt)){?>
	

	<main class="main-wrapper-inner" id="container">

            	<div class="container">

                	<div class="wrapper-inner">

                    	<!-- details-image -->
                       <?php if(!empty($page[0]->photo)){?>
                    	<figure class="details-image">

                        	<img src="<?php echo $url;?>/local/images/media/<?php echo $page[0]->photo;?>" alt="" class="img-responsive"/>

                        </figure>
                        <?php } ?>
                        <!-- details-image -->

                        <!-- content -->

                        <div class="about-content">

                        	

                            <section>

                            	<h3><?php echo $page[0]->page_title;?></h3>

                            	<div><?php echo $page[0]->page_desc;?></div>

                                

                            </section>

                            <!-- right -->

                        </div>

                        <!-- content -->

                        

                    </div>

                </div>

            </main>
	
	
	<?php } ?>
	
	
	
	
	
	
	
	
	
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>