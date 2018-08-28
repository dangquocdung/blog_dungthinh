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
        
           
                <h2 class="text-center">PAYMENT CONFIRMATION</h2>
           
       
    </div>
	
	
	
	
	
	
	
	<div class="clearfix"></div>
	
	
	
	
	
	<div class="video">
	
    
    
    
    
    <div class="text-center">
	<div class="height20 min-space"></div>
	
	<div><h4>Price : <?php echo $currency;?> <?php echo $amount; ?> </h4></div>
    
    
    
    <div class="height20 min-space"></div>
	<?php if($payment_type=="paypal"){?>
    <form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $plan; ?>">
        <input type="hidden" name="item_number" value="<?php echo $order_no;?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
        <input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?php echo $url;?>/cancel'>
		<input type='hidden' name='return' value='<?php echo $url;?>/success/<?php echo $idd;?>'>
		<input type="submit" name="submit" value="Pay Now" class="btn btn-primary">
     
    
    </form>
    <?php } if($payment_type=="stripe"){
		$fprice = $amount * 100;
		?>
	<form action="{{ route('stripe-success') }}" method="POST">
	{{ csrf_field() }}
	
	<input type="hidden" name="cid" value="<?php echo $idd;?>">
	<input type="hidden" name="amount" value="<?php echo $fprice; ?>">
	<input type="hidden" name="currency_code" value="<?php echo $currency; ?>">
	<input type="hidden" name="item_name" value="<?php echo $plan; ?>">
		<script src="https://checkout.stripe.com/checkout.js" 
		class="stripe-button" 
		<?php if($setts[0]->stripe_mode=="test") { ?>
		data-key="<?php echo $setts[0]->test_publish_key; ?>" <?php } ?>
		<?php if($setts[0]->stripe_mode=="live") {  ?>
		data-key="<?php echo $setts[0]->live_publish_key; ?>" 
		<?php }?> 
		data-image="<?php echo $url.'/local/images/media/'.$setts[0]->site_logo;?>" 
		data-name="<?php echo $plan; ?>" 
		data-description="<?php echo $setts[0]->site_name;?>"
		data-amount="<?php echo $fprice; ?>"
		data-currency="<?php echo $currency; ?>"
		/>
		</script>
	</form>
	<?php } ?>
	
	
	
    
    
    
    
    
    
    </div>
    	
	
	</div>
	
	
	</div>
    </div>
    
    </main>
    

      
	   <div class="clearfix"></div>

      @include('footer')
</body>
</html>