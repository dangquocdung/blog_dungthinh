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
        
           
                <h2 class="black text-center">Membership Plan</h2>
           
       
    </div>
	
	
	
	
	
	
	
	
	
	
	
	<main class="main-wrapper-inner blog-wrapper" id="container">

            	
                        
       <div class="height100"></div>                 
                        
                        
      <div class="container" align="center"> 
                       
    <div class="text-center">
    
    
    <div class="col-md-12">
    <?php /* panel-info panel-primary */?>
    
    
        
        <?php if(!empty($view_member_count)){?>
        
        <?php 
		$i=1;
		foreach($view_member as $member){
		
		if($i==1){ $class = "panel-primary"; } else if($i==2){ $class = "panel-success"; } else if($i==3){ $class = "panel-info"; } else if($i==4) { $class = "panel-primary"; } else if($i==5) { $class = "panel-success"; } else if($i==6){ $class = "panel-info"; } else { $class = "panel-primary"; }
		?>
        <div class="col-md-4">
            <div class="panel <?php echo $class;?>">
                
                <?php if($member->membership_flash==1){?>
                <div class="cnrflash">
                    <div class="cnrflash-inner">
                        <span class="cnrflash-label">MOST
                            <br>
                            POPULR</span>
                    </div>
                </div>
                <?php } ?>
                
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <?php echo $member->membership_name;?></h3>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                        <h1>
                        <?php if(!empty($member->membership_price)){?>
                            <?php echo $site_setting[0]->site_currency;?> <?php echo $member->membership_price;?>
                            <?php } else { ?>
                            Free
                            <?php } ?>
                            </h1>
                        <small><?php echo $member->membership_days;?> days</small>
                    </div>
                    <table class="table">
                        <tr>
                            <td>
                                <?php echo $member->membership_name;?> Account
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                <?php echo $member->portfolio_limit;?> Portfolio
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Image Upload Support
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                            <?php if(!empty($member->membership_price)){?>
                                Video Support
                                <?php } else {?>
                                Video Not Support
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Admin Approval
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                            <?php if(!empty($member->membership_price)){?>
                                Email Notification Support
                                <?php } else { ?>
                                No Email Notification
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="panel-footer">
                    <a href="<?php echo $url;?>/choose_payment/<?php echo $member->mid;?>" class="newcustombtn" role="button">Buy Now</a>
                    </div>
            </div>
        </div>
        <?php $i++; } ?>
        
        <?php } ?>
        
        
        
        
        </div>
        
        
    </div>
</div>



                        
                        
     
	
    
    
	
	
	<div class="clearfix height100"></div>
	

     </main>

      @include('footer')
</body>
</html>