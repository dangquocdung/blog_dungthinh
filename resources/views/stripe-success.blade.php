<?php
	use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");

$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	




</head>
<body class="other" id="page">

    

    <!-- fixed navigation bar -->
    @include('header')

    
     
    
<main class="main-wrapper-inner" id="container">

            	<div class="container">

                	<div class="wrapper-inner">
                    
	
    <div class="pagetitle" align="center">
        
           
                <h2 class="text-center">PAYMENT SUCCESS</h2>
           
       
    </div>
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	
    
    
    
    
    <div class="text-center">
	<div class="height20 min-space"></div>
	
	<div><h4>Your payment has been successful </h4></div>
    
    
    <div class="col-md-12" align="center"><?php 
	if(!empty($stripe_token)){
	
	
	
	?>
	<strong>Your Payment Transaction ID - <?php echo $stripe_token;?></strong>
	<?php } ?>
    <div class="height20 min-space"></div>
	
    
    
    
    
    
    
    </div>
    	
	
	</div>
	
	
	</div>
    </div>
    
    </main>
    

      
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>