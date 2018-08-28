<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$headertype = $setts[0]->header_type;
	?>
<!DOCTYPE html>

<html class="no-js"  lang="en">
<head>

		

   @include('style')
   




</head>
<body class="home" id="page">

   

   
    @include('header')
    
  
  <?php if(!empty($setts[0]->site_layout)){?>
  
  
  <?php if(!empty($portfolio_cnt)){?>
   <main class="main-wrapper" id="container"> 
  
  
  
  <div class="wrapper">
    <div class="">
      <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-<?php echo $setts[0]->site_layout;?> masonry">
        
        
        <?php foreach($portfolio as $portfolo){?>
        <li class="masonry-item grid">
        
          <figure class="effect-sarah"> 
          <?php if(!empty($portfolo->photo)){?>
          <img src="<?php echo $url;?>/local/images/media/<?php echo $portfolo->photo;?>" alt="" />
          <?php } ?>
         
          
            <figcaption>
              <h2><?php echo $portfolo->title;?></h2>
              <p><?php echo substr($portfolo->content,0,50).'...';?></p>
              <a href="<?php echo $url;?>/portfolio/<?php echo $portfolo->post_slug;?>">View more</a> </figcaption>
          </figure>
        </li>
        
        <?php } ?>
        
       
       
       
        
        
        
        
      </ul>
    </div>
  </div>
</main>

    <?php } ?>
   
    
    
    
    
   <?php } ?> 
			

      @include('footer')
      
</body>
</html>