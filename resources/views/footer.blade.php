<?php 
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
$ncurrentPath= Route::getFacadeRoot()->current()->uri();
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
$users = DB::select('select * from users where id = ?',[$setid]);	


$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;							
?>


 <?php if(session()->has('message')){?>
    <script type="text/javascript">
        alert("<?php echo session()->get('message');?>");
		</script>
    </div>
	 <?php } ?>
     
     
<footer class="footer">
  <h3>Stay connected with us</h3>
  <div class="container footer-bot">
    <div class="row"> 
      
      <!-- logo -->
      
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> 
      
       <?php if(!empty($setts[0]->site_logo)){?>
      <a class="" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/media/'.$setts[0]->site_logo;?>" border="0" alt="<?php echo $setts[0]->site_name;?>" /></a>
      <?php } else { ?>
      <a class="" href="<?php echo $url;?>"><?php echo $setts[0]->site_name;?></a>
      <?php } ?>
      
        <p class="para"><?php echo $setts[0]->site_copyright;?></p>
      </div>
      
      <!-- logo --> 
      
      <!-- address -->
      
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
        <address>
        <p class="para"><?php echo $setts[0]->site_address;?></p>
        </address>
      </div>
      
      <!-- address --> 
      
      <!-- email -->
      
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
        <p><a href="mailto:<?php echo $setts[0]->site_email;?>"><?php echo $setts[0]->site_email;?></a></p>
        <p><?php echo $setts[0]->site_phone;?></p>
      </div>
      
      <!-- email --> 
      
      <!-- social -->
      
      <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
        
        <p class="made-by newsletterform">
        <form action="{{ route('index') }}" enctype="multipart/form-data" method="post" id="formIfooter">
        {!! csrf_field() !!}
        <?php if(!empty($site_setting[0]->site_logo)){
							 
							?>
						
						<input type="hidden" name="site_logo" value="<?php echo $url.'/local/images/settings/'.$site_setting[0]->site_logo;?>">
					
						<?php } else { ?>
						
						<input type="hidden" name="site_logo" value="">
						
						<?php } ?>
                        
                        <input type="hidden" id="activated" name="activated" value="0">
                        
                        <input type="hidden" name="site_url" value="<?php echo $url;?>">
						
						<input type="hidden" id="admin_email" name="admin_email" value="<?php echo $admin_email;?>">
						<input type="hidden" name="site_name" value="<?php echo $setts[0]->site_name;?>">
                        <input name="email" class="subscribetxt validate[required,custom[email]] text-input" placeholder="Subscribe Newsletter" type="text">
                        <input type="submit" name="submit" class="cus_submit ms-top" value="Subscribe">
                        </form>
                        
        <p>
        
        <ul class="social">
        <?php if(!empty($setts[0]->site_facebook)){?><li><a href="<?php echo $setts[0]->site_facebook;?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php } ?>
          <?php if(!empty($setts[0]->site_twitter)){?><li><a href="<?php echo $setts[0]->site_twitter;?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php } ?>
         <?php if(!empty($setts[0]->site_gplus)){?> <li><a href="<?php echo $setts[0]->site_gplus;?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><?php } ?>
          <?php if(!empty($setts[0]->site_pinterest)){?><li><a href="<?php echo $setts[0]->site_pinterest;?>" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li><?php } ?>
          
          <?php if(!empty($setts[0]->site_instagram)){?><li><a href="<?php echo $setts[0]->site_instagram;?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li><?php } ?>
          
         
        </ul>
      </div>
      
      <!-- social --> 
      
    </div>
  </div>
</footer>

<!-- footer --> 

<!-- jQuery --> 



<script src="<?php echo $url;?>/theme/js/assets/plugins.js" type="text/javascript"></script> 
<script src="<?php echo $url;?>/theme/js/assets/bootstrap.min.js" type="text/javascript"></script> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> 
<script src="<?php echo $url;?>/theme/js/maps.js" type="text/javascript"></script> 
<script src="<?php echo $url;?>/theme/js/custom.js" type="text/javascript"></script> 
<script src="<?php echo $url;?>/theme/js/jquery.contact.js" type="text/javascript"></script> 
<script src="<?php echo $url;?>/theme/js/main.js" type="text/javascript"></script> 
<script src="<?php echo $url;?>/theme/js/gallery/masonry.pkgd.min.js" type="text/javascript"></script> 
<script src="<?php echo $url;?>/theme/js/gallery/imagesloaded.pkgd.min.js" type="text/javascript"></script> 
<script src="<?php echo $url;?>/theme/js/gallery/jquery.infinitescroll.min.js" type="text/javascript"></script> 
<script src="<?php echo $url;?>/theme/js/gallery/main.js" type="text/javascript"></script> 
<script src="<?php echo $url;?>/theme/js/jquery.nicescroll.min.js" type="text/javascript"></script>


<script src="<?php echo $url;?>/theme/js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="<?php echo $url;?>/theme/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
	<script>
		jQuery(document).ready(function(){
			
			jQuery("#formID").validationEngine('attach', { promptPosition: "bottomLeft" });
			jQuery("#formIfooter").validationEngine('attach', { promptPosition: "bottomLeft" });
			
		});
		
		
		
    </script>
    
    <?php /* scroll top */ ?>
		
		
<?php /* end scroll top */?>
    
    
    <?php /* share icon */?>
    
    <script src="<?php echo $url;?>/theme/js/share.js"></script>
		<script>
				$('.share-items').customShareCount({
					
					twitter: true,

					facebook: true,
					linkedin: true,
					google: true,

					
					twitterUsername: 'avigher',

					
					showCounts: true,

					
					showTotal: true
				});
				
				
			


</script>
    
    <?php /* end social icon */?>
    
    
    <?php /* mp3 */?>
    <script src="<?php echo $url;?>/theme/js/mp3.js"></script>

<script>
    $(document).ready(function () {
        $('.mediPlayer').mediaPlayer();
    });
</script>

<?php /* end mp3 */?>


<script type="text/javascript" src="<?php echo $url;?>/theme/js/jquery.simplePagination.min.js"></script>
            <script type="text/javascript">
		$(function(){
			var perPage = <?php echo $setts[0]->site_post_per;?>;
			var opened = 1;
			var onClass = 'on';
			var paginationSelector = '.pagess';
			$('.bloglist').simplePagination(perPage, opened, onClass, paginationSelector);
		});
		
		
		
		
		
	</script>
 