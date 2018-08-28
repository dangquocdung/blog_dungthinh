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
        
           
                <?php if(!empty($amount)){?> <h2 class="text-center">CHOOSE PAYMENT TYPE</h2> <?php } else {?> <h2 class="text-center">THANKS FOR YOUR SUBSCRIPTION</h2> <?php } ?>
           
       
    </div>
	
	
	
	
	
	
	
	<div class="height50 clearfix"></div>
	
	
	
	
	
	<div class="video">
	
    
    
    
    
    <div class="text-center black">
	<div class="min-space"></div>
	<label>Plan Name </label> - <?php echo $plan; ?><br>
     <label>Duration</label> -  <?php echo $duration; ?> Days <br>
    <label>Price</label> - <?php if(!empty($amount)){?> <?php echo $amount; ?> <?php echo $currency; ?><?php } else {?> Free <?php } ?>
	
	
	<?php if(!empty($amount)){?>
    <div class="col-md-12">
    <div style="text-align:center;"></div>
    
     
    <form class="form-horizontal" role="form" method="POST" action="{{ route('payment') }}" id="formID" enctype="multipart/form-data">
    {{ csrf_field() }}
	
	<div class="text-center">
    <input type="hidden" value="<?php echo $name;?>"  id="name" name="name" >
    <input type="hidden" value="<?php echo $email;?>"  id="email" name="email" >
    <input type="hidden" value="<?php echo $phone_no;?>"  id="phone_no" name="phone_no" >
       
        <?php
        
            
            $option = explode (",", $setts[0]->payment_option);
            ?>
            <div align="center">
        <h4><strong>Select Payment Type <span class="require">*</span></strong></h4>
        <select id="payment_type" name="payment_type" class="form-control validate[required]" style="max-width:250px;">
            <option value="">None</option>
            <?php 
            
            
            foreach($option as $withdraw){
                
                ?>
            <option value="<?php echo $withdraw;?>"><?php echo $withdraw;?></option>
            <?php } ?>
        </select>
        
       </div>
        <input type="hidden" value="<?php echo $amount;?>"  id="amount" name="amount" >
        
          <input type="hidden" name="currency" value="<?php echo $currency;?>">
          
          <input type="hidden" name="paypal_url" value="<?php echo $paypal_url;?>">
          
          <input type="hidden" name="paypal_id" value="<?php echo $paypal_id;?>">
          
          <input type="hidden" name="order_no" value="<?php echo $order_no;?>">
          
          <input type="hidden" name="token" value="<?php echo csrf_token();?>">
          
           <input type="hidden" name="plan" value="<?php echo $plan;?>">
          
          
          <input type="hidden" name="url" value="<?php echo $url;?>">
          
          
          
          
		  <div class="clear height10"></div>
          
            <input type="submit" class="btn btn-primary avg_small_button radiusoff" value="Submit">
          
		  <div class="clear height50"></div>
		 </div> 
        </form>
    </div>
    
    <?php } ?>
    
	
	
    
    
    
    
    
    
    </div>
    	
	
	</div>
    
    
    <div class="height20 clearfix"></div>
    <?php if(empty($amount)){?> <div class="text-center"> <a href="<?php echo $url;?>/my-portfolio" class="newcustombtn">Go To Your Portfolio</a> </div><?php  } ?>
	
	
	</div>
    </div>
    
    
     <div class="height50 clearfix"></div>
    
    
    </main>
    

      
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>