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
        
           
                <h2 class="text-center">PayPal Transaction Cancel</h2>
           
       
    </div>
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	
    
    
    
    
    <div class="text-center">
	<div class="height20 min-space"></div>
	
	<div><h4>Your PayPal transaction has been canceled</h4></div>
    
    
    
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