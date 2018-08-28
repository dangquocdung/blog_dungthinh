<?php
/*
Theme Name: LaraPortfolio
Theme URI: http://avigher.com
Author: C SARAVANAN
Author URI: http://avigher.com
Description: LaraPortfolio
Version: 1.1
Text Domain: avigher-tn
*/
?>
 <?php 
 use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
 $url = URL::to("/"); 
 $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$color_setts = DB::table('color_settings')
		->where('id', '=', $setid)
		->get();
		
		
		$name = Route::currentRouteName();
 if($currentPaths=="/")
 {
	 $pagetitle="Home";
	 $activemenu = "/";
 }
 else 
 {
	 $pagetitle=$currentPaths;
	 $activemenu = $currentPaths;
 }
 
 


$ppid=1;
		$about_title = DB::table('pages')
		->where('page_id', '=', $ppid)
		->get();
$ppid_two=4;
		$contact_title = DB::table('pages')
		->where('page_id', '=', $ppid_two)
		->get();
$ppid_three=5;
		$donate_title = DB::table('pages')
		->where('page_id', '=', $ppid_three)
		->get();
$ppid_four=6;
		$support_title = DB::table('pages')
		->where('page_id', '=', $ppid_four)
		->get();
$ppid_five=7;
		$faq_title = DB::table('pages')
		->where('page_id', '=', $ppid_five)
		->get();	
		
$ppid_six=8;
		$terms_title = DB::table('pages')
		->where('page_id', '=', $ppid_six)
		->get();
$ppid_seven=9;
		$privacy_title = DB::table('pages')
		->where('page_id', '=', $ppid_seven)
		->get();					
 ?>

       <title><?php echo $setts[0]->site_name;?> - 
 <?php if($activemenu == "/" or $activemenu == "index"){ echo "Home"; } else { echo ""; }

if($activemenu == "blog" or $activemenu == "blog/{id}"){ echo "Blog"; } else { echo ""; }
if($activemenu == "contact-us"){ echo $contact_title[0]->page_title; } else { echo ""; }
if($activemenu == "dashboard"){ echo 'Dashboard'; } else { echo ""; }
if($activemenu == "my-comments"){ echo 'My Comments'; } else { echo ""; }
if($activemenu == "login"){ echo 'Login'; } else { echo ""; }
if($activemenu == "register"){ echo 'Register'; } else { echo ""; }

if($activemenu == "tag/{type}/{id}"){ echo 'Tags'; } else { echo ""; }

if($activemenu == "404"){ echo '404 Page not found!'; } else { echo ""; }
if($activemenu == "forgot-password"){ echo 'Forgot Password?'; } else { echo ""; }
if($activemenu == "reset-password/{id}"){ echo 'Reset Password'; } else { echo ""; }
if($activemenu == "thankyou/{id}"){ echo 'Thank You'; } else { echo ""; }


?>
 </title>

	 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  
	 <!-- css stylesheets -->
	 <?php if(!empty($setts[0]->site_favicon)){?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/media/'.$setts[0]->site_favicon;?>" />
	 <?php } else { ?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/noimage.jpg';?>" />
	 <?php } ?>
	
         
         
      <link rel="stylesheet" href="<?php echo $url;?>/theme/css/assets/normalize.css" type="text/css">
		<link href="<?php echo $url;?>/theme/css/assets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $url;?>/theme/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo $url;?>/theme/css/gallery/foundation.min.css"  type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/theme/css/gallery/set1.css" />
<link rel="stylesheet" href="<?php echo $url;?>/theme/css/main.css" type="text/css">
<link href="<?php echo $url;?>/theme/css/responsive.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

<!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    
     <link href="<?php echo $url;?>/theme/css/share.css" rel="stylesheet">
    
<script src="<?php echo $url;?>/theme/js/jquery.2.0.2.min.js"></script> 
<script src="<?php echo $url;?>/theme/js/assets/jquery.min.js"></script>
<script src="<?php echo $url;?>/theme/js/assets/modernizr-2.8.3.min.js" type="text/javascript"></script>

 <link rel="stylesheet" href="<?php echo $url;?>/theme/css/validationEngine.jquery.css" type="text/css"/>
<?php /*********** Loader *******/?>
 <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>




<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/local/resources/assets/admin/build/css/jquery-ui-timepicker-addon.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/local/resources/assets/admin/build/css/jquery-ui.css" />
    
 <script src="<?php echo $url;?>/local/resources/assets/admin/build/js/jquery-ui.min.js"></script>     
 <script src="<?php echo $url;?>/local/resources/assets/admin/build/js/jquery-ui-timepicker-addon.js"></script>    
     

<?php /********* End Loader********/ ?>

    <style type="text/css">


@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->body_font;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading1;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading2;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading3;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading4;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading5;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->heading6;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->paragraph;?>');
@import url('https://fonts.googleapis.com/css?family=<?php echo $color_setts[0]->list_font;?>');


.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo $url;?>/local/images/media/<?php echo $setts[0]->site_loading_url;?>') 50% 50% no-repeat rgb(249,249,249);
    opacity: 1;
	
	
}

.thisfont
{
font-size:18px;
}


.embed-container {
  position: relative;
  padding-bottom: 56.25%;
  overflow: hidden;
}
		
.embed-container iframe,
.embed-container object,
.embed-container embed {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.bold
{
font-weight:500 !important;
}
.colorbg
{
background:#FB5353 !important;
border-radius:2px !important;
color:#fff !important;
font-size:11px !important;
padding:0px 5px 0px 5px !important;
line-height:30px !important;
}

.black
{
color:#000000 !important;
}

.black:hover
{
color:#000000 !important;
text-decoration:none !important;
}
.black:focus
{
color:#000000 !important;
text-decoration:none !important;
}
.portdesc label,.portdesc
{
color:#000000 !important;
}

.portline
{
line-height:30px;
}
.portdesc a
{
color:#FB5353;
}

.cpara
{
line-height:25px;
}



.subscribetxt
{
background:#36495B;
border:0 !important;
padding:1px 1px 1px 5px !important;
height:25px !important;
color:#CCCCCC !important;
font-size:11px !important;
max-width:180px !important;

}
.subscribetxt:focus
{
outline:none !important;
}

.float-left
{
float:left;
}
.float-right
{
float:right;
}

.green
{
color:#009900; font-size:16px; font-weight:bold;
}

.red
{
color:#CB2027; font-size:16px; font-weight:bold;
}


.cus_submit
{
border:0 !important;
height:24px !important;
line-height:15px !important;
color:#fff !important;
background:#FB5353 !important;
}
.cus_submit:focus
{
outline:none !important;
}


.fleft
{
float:left !important;
}

.custombtn
{
color:#fff !important;
background:#FB5353 !important;
padding:10px;
border:0 !important;
border-radius:0 !important;
}
.custombtn:focus
{
outline:none !important;
}

.round
	{
	border-radius:50%;
	-webkit-border-radius:50%;
	border:2px solid #ccc;
	padding:30px;
	}

.roundbg
{
background:#CB2027 !important;
color:#fff !important;
border-radius: 50%;
 
  padding:5px 10px 5px 10px;
   
    text-align: center;

    font-size:12px;
}

.newcustombtn
{
color:#fff !important;
background:#FB5353 !important;
padding:5px 10px 5px 10px;
border:0 !important;
border-radius:0 !important;
}
.newcustombtn:focus
{
outline:none !important;
}



.subscribetxt::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color:#999999 !important;
}
.subscribetxt::-moz-placeholder { /* Firefox 19+ */
  color:#999999 !important;
}
.subscribetxt:-ms-input-placeholder { /* IE 10+ */
  color:#999999 !important;
}
.subscribetxt:-moz-placeholder { /* Firefox 18- */
  color:#999999 !important;
}






.height10
{
height:10px !important;
}
.height20
{
height:20px !important;
}
.height30
{
height:30px !important;
}
.height40
{
height:40px !important;
}
.height50
{
height:50px !important;
}

.height100
{
height:100px !important;
}

.clearfix
{
clear:both !important;

}
.paddingoff
{
padding:0px !important;
}
.radiusoff
{
border-radius:0 !important;
}
.border
{
border:1px solid #ccc !important;
padding-left:5px !important;
}
.border:focus
{
outline:none !important;
box-shadow:none !important;
}



.borderbottom
{
border-bottom:1px solid #CCCCCC !important;
padding-bottom:10px;
}




/*************** PAGINATION *************/

.pagess {
	clear: both;
	float:right;
	
	display: inline;
}

.pagess ul {
	float: left;
}

.pagess ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.pagess ul li a {
	padding: 3px 9px 2px;
	background:#22313F !important;
	color: #fff;
}

.pagess ul li.on a {
	background: #FB5353 !important;
	color: #fff;
}

.pagess ul li span span {
	color: #fff;
	padding: 3px 9px 2px;
	background: #454545;
}












/**************** END PAGINATION ***************/







/*************** MP3 PLAYER ****************/

.mediPlayer .control {
    opacity        : 0; 
    pointer-events : none;
    cursor         : pointer;
}

.mediPlayer .not-started .play, .mediPlayer .paused .play {
    opacity : 1;

}

.mediPlayer .playing .pause {
    opacity : 1;

}

.mediPlayer .playing .play {
    opacity : 0;
}

.mediPlayer .ended .stop {
    opacity        : 1;
    pointer-events : none;
}

.mediPlayer .precache-bar .done {
    opacity : 0;
}

.mediPlayer .not-started .progress-bar, .mediPlayer .ended .progress-bar {
    display : none;
}

.mediPlayer .ended .progress-track {
    stroke-opacity : 1;
}

.mediPlayer .progress-bar,
.mediPlayer .precache-bar {
    transition        : stroke-dashoffset 500ms;

    stroke-dasharray  : 298.1371428256714;
    stroke-dashoffset : 298.1371428256714;
}



/******************** END MP3 PLAYER ***************/








.the-price
{
    background-color: rgba(220,220,220,.17);
    box-shadow: 0 1px 0 #dcdcdc, inset 0 1px 0 #fff;
    padding: 20px;
    margin: 0;
}

.the-price h1
{
    line-height: 1em;
    padding: 0;
    margin: 0;
}

.subscript
{
    font-size: 25px;
}

/* CSS-only ribbon styles    */
.cnrflash
{
    /*Position correctly within container*/
    position: absolute;
    top: -9px;
    right: 4px;
    z-index: 1; /*Set overflow to hidden, to mask inner square*/
    overflow: hidden; /*Set size and add subtle rounding  		to soften edges*/
    width: 100px;
    height: 100px;
    border-radius: 3px 5px 3px 0;
}
.cnrflash-inner
{
    /*Set position, make larger then 			container and rotate 45 degrees*/
    position: absolute;
    bottom: 0;
    right: 0;
    width: 145px;
    height: 145px;
    -ms-transform: rotate(45deg); /* IE 9 */
    -o-transform: rotate(45deg); /* Opera */
    -moz-transform: rotate(45deg); /* Firefox */
    -webkit-transform: rotate(45deg); /* Safari and Chrome */
    -webkit-transform-origin: 100% 100%; /*Purely decorative effects to add texture and stuff*/ /* Safari and Chrome */
    -ms-transform-origin: 100% 100%;  /* IE 9 */
    -o-transform-origin: 100% 100%; /* Opera */
    -moz-transform-origin: 100% 100%; /* Firefox */
    background-image: linear-gradient(90deg, transparent 50%, rgba(255,255,255,.1) 50%), linear-gradient(0deg, transparent 0%, rgba(1,1,1,.2) 50%);
    background-size: 4px,auto, auto,auto;
    background-color: #aa0101;
    box-shadow: 0 3px 3px 0 rgba(1,1,1,.5), 0 1px 0 0 rgba(1,1,1,.5), inset 0 -1px 8px 0 rgba(255,255,255,.3), inset 0 -1px 0 0 rgba(255,255,255,.2);
}
.cnrflash-inner:before, .cnrflash-inner:after
{
    /*Use the border triangle trick to make  				it look like the ribbon wraps round it's 				container*/
    content: " ";
    display: block;
    position: absolute;
    bottom: -16px;
    width: 0;
    height: 0;
    border: 8px solid #800000;
}
.cnrflash-inner:before
{
    left: 1px;
    border-bottom-color: transparent;
    border-right-color: transparent;
}
.cnrflash-inner:after
{
    right: 0;
    border-bottom-color: transparent;
    border-left-color: transparent;
}
.cnrflash-label
{
    /*Make the label look nice*/
    position: absolute;
    bottom: 0;
    left: 0;
    display: block;
    width: 100%;
    padding-bottom: 5px;
    color: #fff;
    text-shadow: 0 1px 1px rgba(1,1,1,.8);
    font-size: 0.95em;
    font-weight: bold;
    text-align: center;
}




	</style>    
        
        
	
	