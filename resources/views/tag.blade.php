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
        
           
                <h2 class="white text-center">
                
                <span class="captial fontsize20 lineheight50 gold">Tagged With</span><br/>
                <span class="fcaptial thisfont thislineheight"><?php echo $tag_txt;?></span>
                </h2>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	 <main class="main-wrapper-inner blog-wrapper" id="container">

            	<div class="container">

                	<div class="wrapper-inner">
                    
                    
	<div class="row">
	
    
    
    <?php if($type=="blog"){?>
	
	<?php foreach($query as $nquery){ ?>
    
    
    
    <div class="container">
    
    <div class="col-md-3 paddingoff">
    <?php if($nquery->post_media_type=="image"){ ?>
    				<?php if(!empty($nquery->post_image)){ ?>
          			<a href="<?php echo $url;?>/blog/<?php echo $nquery->post_slug;?>" title="<?php echo $nquery->post_title;?>"><img src="<?php echo $url.'/local/images/media/'.$nquery->post_image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/blog/<?php echo $nquery->post_slug;?>" title="<?php echo $nquery->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
                    <?php } ?>
                    
                    <?php if($nquery->post_media_type=="mp3"){ ?>
                    <a href="<?php echo $url;?>/blog/<?php echo $nquery->post_slug;?>" title="<?php echo $nquery->post_title;?>"><img src="<?php echo $url;?>/local/images/blogaudio.png" class="img-responsive blogpost"></a>
                   
                    <?php } ?>
                    <?php if($nquery->post_media_type=="video"){?>
                    <a href="<?php echo $url;?>/blog/<?php echo $nquery->post_slug;?>" title="<?php echo $nquery->post_title;?>"><img src="<?php echo $url;?>/local/images/blogvideo.png" class="img-responsive blogpost"></a>
                    <?php } ?>
    </div>
    
    
     
    
   
    <div class="col-md-9 mtop10">
    <div class="fontsize16 bold gold ellipsis"><a href="<?php echo $url;?>/blog/<?php echo $nquery->post_slug;?>" class="gold decorationoff"><?php echo $nquery->post_title;?></a></div>
     <div class="ash fontsize12"><?php echo date("d M Y h:i:s a",strtotime($nquery->post_date));?></div>
    <p class="para black"><?php echo substr($nquery->post_desc,0,150).'...';?></p>
     <div class="clearfix height20"></div>
    <div class="text-left"><a href="<?php echo $url;?>/blog/<?php echo $nquery->post_slug;?>" class="custombtn">View More</a></div>
    </div>
    
    
    
    
    
    
    <div class="clearfix height40"></div>
   <div class="clearfix borderbottom paddingoff"></div>
    <div class="clearfix height40"></div>
    
   
 </div>
    
  
    
    <?php } ?>
    
    <?php } ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
	
	
    
	
	
	
	
	
    
    </div>
	</div>
	</div>
    <div class="height100"></div>
	</main>
	
	

      <div class="clearfix"></div>
	   <div class="clearfix"></div>

      @include('footer')
       
</body>
</html>