<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
if($currentPaths=="/")
 {
 $activemenu = "/";
 }
 else 
 {
  $activemenu = $currentPaths;
 }
 
 
 
if($activemenu == "/"){ $active_home = "active"; } else { $active_home =""; }



if($activemenu == "blog" or $activemenu == "blog/{id}") { $active_blog = "active"; } else { $active_blog = ""; }
if($activemenu == "contact-us") { $active_contact = "active"; } else { $active_contact = ""; }

if($activemenu == "register"){ $active_register = "active"; } else { $active_register = ""; }
if($activemenu == "dashboard" or $activemenu == "my-comments"){ $active_dashboard = "active"; } else { $active_dashboard = ""; }


$pages = DB::table('pages')
		            
					
					->orderBy('page_title','asc')
					->get();
	$pages_cnt = DB::table('pages')
		            ->orderBy('page_title','asc')
					->count();
					
?>


<?php if($setts[0]->site_loading_url!="" && $setts[0]->site_loading=='1'){?>	
<div class="loader"></div>
<?php } ?>	
<header id="header" class="header">
  <div class="container-fluid">
    <hgroup> 
      
      <!-- logo -->
      
      
      <?php if(!empty($setts[0]->site_logo)){?>
		  
		   <h1><a class="" href="<?php echo $url;?>"><img src="<?php echo $url.'/local/images/media/'.$setts[0]->site_logo;?>" border="0" alt="<?php echo $setts[0]->site_name;?>" /></a></h1>
		   <?php } else {?>
		   <h1 id="logo"><a class="" href="<?php echo $url;?>"><?php echo $setts[0]->site_name;?></a></h1>
		   <?php } ?>
      <!-- logo --> 
      
      <!-- nav -->
      
      <nav>
        <div class="menu-expanded">
          <div class="nav-icon">
            <div id="menu" class="menu"></div>
            <p>menu</p>
          </div>
          <div class="cross"> <span class="linee linea1"></span> <span class="linee linea2"></span> <span class="linee linea3"></span> </div>
          <div class="main-menu">
            <ul>
              <li><a href="<?php echo $url;?>">Home</a></li>
             
             
            
             <?php if(!empty($pages_cnt)){?>
                                <?php foreach($pages as $page){
								if($page->page_id==4){ $pagerurl = $url.'/'.'contact-us'; }
								
								else { $pagerurl = $url.'/page/'.$page->post_slug; }
								?>
                                <li><a href="<?php echo $pagerurl; ?>"><?php echo $page->page_title;?></a></li>
                                <?php } } ?>
                                <li><a href="<?php echo $url;?>/blog">Blog</a></li>
                                
                               <?php if(Auth::check()) { ?>
                                 <li><a href="<?php echo $url;?>/dashboard">Dashboard</a></li>
                                <?php if(Auth::user()->id!=1){?> <li><a href="<?php echo $url;?>/my-portfolio">My Portfolio</a></li><?php } ?>
                                 <li><a href="<?php echo $url;?>/my-comments">My Comments</a></li>
                                 <?php if(Auth::user()->id!=1){?><li><a href="<?php echo $url;?>/membership">Membership</a></li><?php } ?>
                                 
                                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                 <?php } else { ?>
									<li><a href="<?php echo $url;?>/login">Login</a></li>
									<li><a href="<?php echo $url;?>/register">Register</a></li>
                                    <?php } ?>
                                
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- nav --> 
      
    </hgroup>
  </div>
</header>



