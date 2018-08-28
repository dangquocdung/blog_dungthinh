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
<html lang="en">
<head>
   
   <meta charset="utf-8" />
		

   @include('style')
   


<?php if(!empty($post_count)){?>
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo $post[0]->post_title;?>">
<meta property="og:description" content="<?php echo substr($post[0]->post_desc,0,280).'...';?>">
<meta property="og:url" content="<?php echo $url;?>/blog/<?php echo $post[0]->post_slug;?>">
<meta property="og:site_name" content="<?php echo $setts[0]->site_name;?>">
<?php if(!empty($post[0]->post_image)){ ?>
<meta property="og:image" content="<?php echo $url.'/local/images/media/'.$post[0]->post_image;?>">
<?php } else { ?>
<meta property="og:image" content="<?php echo $url;?>/local/images/noimage.jpg">
<?php } ?>
<meta property="og:image:width" content="400">
<meta property="og:image:height" content="300">
<?php } ?>

</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

    
     
    

	
    
	
	<div class="pagetitle" align="center">
        
           
                <h1 class="white text-center">
                <?php if(!empty($blog_count)){?>
                <span class="h2">Blog</span>
                <?php } ?>
                <?php if(!empty($post_count)){?>
                <span class="captial fontsize20 lineheight50 gold">Blog</span><br/>
                <span class="fcaptial thisfont thislineheight"><?php echo $post[0]->post_title; ?></span>
                <?php } ?>
                </h2>
           
       
    </div>
	
	
	
	
	
	
	
    
    
    
    
    
    <main class="main-wrapper-inner blog-wrapper" id="container">

            	<div class="container">

                	<div class="wrapper-inner">

                    <?php if(!empty($blog_count)){?>
                    <div class="bloglist">
                     <?php foreach($blogs as $blog){
						$date = $blog->post_date;
						
						$old_date = strtotime($date);
						$dateonly = date('d F Y', $old_date);
						
						?>
                    	<article id="post" class="post">

                        	

                        		

                        	
                            
                            <?php if($blog->post_media_type=="image"){ ?>
                            <figure>
    				<?php if(!empty($blog->post_image)){ ?>
          			<a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>" title="<?php echo $blog->post_title;?>"><img src="<?php echo $url.'/local/images/media/'.$blog->post_image;?>" class="img-responsive" alt="<?php echo $blog->post_title;?>"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>" title="<?php echo $blog->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive" alt="<?php echo $blog->post_title;?>"></a>
        			<?php } ?>
                    </figure>
                    <?php } ?>
                            
                             <?php if($blog->post_media_type=="mp3"){ ?>
                              <figure>
                    <div class="text-center">
                    <div class="height40"></div>
                     <div class="mediPlayer">
    				<audio class="listen" preload="none" data-size="250" src="<?php echo $url;?>/local/images/media/<?php echo $blog->post_audio;?>"></audio>
					</div>
                    <div class="height40"></div>
                    </div>
                    </figure>
                    <?php } ?>
                    
                    <div>
                    <figure>
                    <?php 
					if($blog->post_media_type=="video"){
					if (strpos($blog->post_video, 'youtube') > 0) {
					 $vurl = $blog->post_video;
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
						$id = $matches[1];
						
						$height = '420px';
					?>
                    
                    <iframe id="ytplayer" type="text/html" width="100%" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
                    
                    <?php } 
					if (strpos($blog->post_video, 'vimeo') > 0) {
					$vimeo = $blog->post_video;
					?>
                    <div class='embed-container'>
                    <iframe src="https://player.vimeo.com/video/<?php echo (int) substr(parse_url($vimeo, PHP_URL_PATH), 1);?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
					<?php }
					} ?>
                    </figure>
                    </div>
                     <?php
					$post_comment = DB::table('post')
							 ->where('post_parent', '=', $blog->post_id)
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->count();
					?>
                            <section class="inner-left">

                                <span class="date"><?php echo $dateonly;?></span>

                                <p class="cat-pan"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo $post_comment;?> Comment</p>

                            </section>

                            <section class="inner-right">

                            	<header>

                            		<h3><a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>" title="<?php echo $blog->post_title;?>"><?php echo $blog->post_title;?></a></h3>

                                </header>

                            	<p><?php echo substr($blog->post_desc,0,300).'...';?></p>

                            </section>
                             <div class="clearfix"></div>
<div class="text-left"><a href="<?php echo $url;?>/blog/<?php echo $blog->post_slug;?>" class="custombtn">Read More</a></div>
                            <div class="clearfix"></div>

                        </article>
                         <?php } ?>
                         </div>
                         
                          <div class="pagess"></div>
                          
                          <div class="clearfix height40"></div>
                         <?php } ?>

                        
                        

                       



                        

                    </div>

                </div>

           

    
    
    
    
    
    
    
    
    
    
	

            	<div class="container">

                	
                    
                    <section class="inner-left">
                     <?php if(!empty($post_count)){?>
                    <div class="borderbottom">
                        <h3 class="h4 heading black">
                        Popular Post
                        </h3>
                       
                    </div>
                     <div class="height20"></div>
                    
                    <?php foreach($popular_blog as $popular){
	
	?>
    
    <div class="clearfix">
   
        <div class="col-md-4 paddingoff">
         
        <?php if($popular->post_media_type=="image"){ ?>
    				<?php if(!empty($popular->post_image)){ ?>
          			<a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url.'/local/images/media/'.$popular->post_image;?>" class="img-responsive blogpost"></a>
        			<?php } else {?>
       				<a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive blogpost"></a>
        			<?php } ?>
                    <?php } ?>
                    
                    <?php if($popular->post_media_type=="mp3"){ ?>
                    <a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/blogaudio.png" class="img-responsive blogpost"></a>
                   
                    <?php } ?>
                    <?php if($popular->post_media_type=="video"){?>
                    <a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>"><img src="<?php echo $url;?>/local/images/blogvideo.png" class="img-responsive blogpost"></a>
                    <?php } ?>
                    
        </div>
        <div class="col-md-8 paddingleft10rightoff">
        <div class="black para poptitle ellipsis"><a href="<?php echo $url;?>/blog/<?php echo $popular->post_slug;?>" title="<?php echo $popular->post_title;?>" class="black decorationoff hoveroff"><?php echo $popular->post_title;?></a></div>
        <div class="ash fontsize12"><?php echo date("d M Y h:i:s a",strtotime($popular->post_date));?></div>
        </div>
    
    </div>
    <div class="clearfix height20"></div>
    <?php } ?>
	<?php } ?>
                    
                    
                    </section>
                    
                    
                    <section class="inner-right">
                    <?php if(!empty($post_count)){
	
					$date = $post[0]->post_date;
					
					$old_date = strtotime($date);
					$dateonly = date('d F Y', $old_date);
					
					?>
                    
                    
                    <?php if($post[0]->post_media_type=="image"){ ?>
                    <div class="text-center">
                    
    				<?php if(!empty($post[0]->post_image)){ ?>
          			<img src="<?php echo $url.'/local/images/media/'.$post[0]->post_image;?>" class="img-responsive" title="<?php echo $post[0]->post_title;?>">
        			<?php } else {?>
       				<img src="<?php echo $url;?>/local/images/noimage.jpg" class="img-responsive" title="<?php echo $post[0]->post_title;?>">
        			<?php } ?>
                     </div>
                    <?php } ?>
                   
                    
                    <?php if($post[0]->post_media_type=="mp3"){ ?>
                    <div class="text-center">
                    <div class="height20"></div>
                     <div class="mediPlayer">
    				<audio class="listen" preload="none" data-size="250" src="<?php echo $url;?>/local/images/media/<?php echo $post[0]->post_audio;?>"></audio>
					</div>
                    </div>
                    <?php } ?>
                    
                    
                    <?php 
					if($post[0]->post_media_type=="video"){?>
                    <div>
                    <?php
					if (strpos($post[0]->post_video, 'youtube') > 0) {
					 $vurl = $post[0]->post_video;
						preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $vurl, $matches);
						$id = $matches[1];
						
						$height = '420px';
					?>
                    <iframe id="ytplayer" type="text/html" width="100%" height="<?php echo $height ?>" src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>
                    
                    <?php } 
					if (strpos($post[0]->post_video, 'vimeo') > 0) {
					$vimeo = $post[0]->post_video;
					?>
                    <iframe src="https://player.vimeo.com/video/<?php echo (int) substr(parse_url($vimeo, PHP_URL_PATH), 1);?>" width="100%" height="420" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					<?php }?>
                    </div>
					<?php } ?>
                    
                    
                    
                    
                    <div class="blogbody">
                   
                    <div class="h3 black"><?php echo $post[0]->post_title;?></div>
                    
                    <p><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $dateonly;?></p>
                    <div class="clearfix"></div>
                    <div class="cpara black"><?php echo $post[0]->post_desc;?></div>
                    <div class="clearfix height40"></div>
                    
                    
                    
                    
                    
                    <div class="share-items text-left" data-title="<?php echo $post[0]->post_title;?>" data-hash="<?php echo $post[0]->post_title;?>" data-url="<?php echo $url;?>/blog/<?php echo $post[0]->post_slug;?>">
			
            <div class="socialshare text-center">
        	<ul class="share-links">
        		<li>
        			<a class="twitterBtn" data-dir="left" href="" >
            			<span>Twitter</span>
            			<span class="twitter-count"></span>
                    </a>
        		</li>
        		<li>
        			<a class="facebookBtn" href="">
            			<span>Facebook</span>
            			<span class="facebook-count"></span>
                    </a>
        		</li>
        		<li>
        			<a class="linkedinBtn" href="">
            			<span>LinkedIn</span>
            			<span class="linkedin-count"></span>
                    </a>
        		</li>
        		<li>
        			<a class="googleBtn" href="">
            			<span>Google</span>
            			<span class="google-count"></span>
                    </a>
        		</li>
				<li>
					<span>Total</span>
					<span class="total-count"></span>
				</li>
        	</ul>
            </div>
        </div>
                <div class="clearfix height40"></div>     
                    <div class="text-left">
                    <span class="bold black"><i class="fa fa-tags" aria-hidden="true"></i> Tags :</span>
                    
                    <span>
                    <?php 
					$post_tags = explode(',',$post[0]->post_tags);
					
					foreach($post_tags as $tags)
                    {
					$tag =strtolower(str_replace(" ","-",$tags)); 
					if(!empty($tags))
					{
					?>
                    <a href="<?php echo $url;?>/tag/blog/<?php echo $tag;?>" class="white colorbg"><?php echo $tags;?></a>
                    <?php
					}
					}
					?>
                    </span>
                    
                    </div>
                    
                    
                    
                   <div class="clearfix height100"></div>
       
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paddingoff">
          <?php if(!empty($previous)){
		
		?>
         <div class="float-left"><a href="<?php echo $url;?>/blog/<?php echo $previous_link[0]->post_slug;?>" class="custombtn"><i class="fa fa-chevron-left" aria-hidden="true"></i> <?php echo 'previous';?></a></div>
         <?php } ?>
         
         
         
         <?php if(!empty($next)){
		
		 ?>
         <div class="float-right"><a href="<?php echo $url;?>/blog/<?php echo $next_link[0]->post_slug;?>" class="custombtn"><?php echo 'next';?> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></div>
          <?php } ?>
         </div>
         
         
        
        
          <div class="clearfix height100"></div>
          
          
          <div class="col-md-12 paddingoff">
        <div class="h3 black">Leave a Reply</div>
        <div class="clear height20"></div>
        <?php if(Auth::check()) { ?>
        <div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('blog') }}" id="formID" enctype="multipart/form-data">
                        {{ csrf_field() }}
	
	<div class="paddingoff">
    
	
          <div class="col-lg-12 col-md-12 col-sm-12 paddingoff">
            <label class="ash">Name<span class="star">*</span></label>
            <input type="text" value=""  class="form-control validate[required] text-input radiusoff" id="name" name="name" >
          </div>
         <div class="clearfix height10"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 paddingoff">
            <label class="ash">Email<span class="star">*</span> </label>
            <input type="text" value="<?php echo Auth::user()->email;?>"  class="form-control validate[required,custom[email]] text-input radiusoff" id="email" name="email" readonly>
          </div>
		  
          <div class="clearfix height10"></div>
          <div class="col-lg-12 col-md-12 col-sm-12 paddingoff">
            <label class="ash">Message<span class="star">*</span> </label>
            <textarea value=""   class="form-control validate[required] text-input radiusoff height150" id="msg" name="msg"></textarea>
          </div>
          
          <input type="hidden" name="post_comment_type" value="blog">
          
           <input type="hidden" name="post_type" value="comment">
           
           <input type="hidden" name="post_user_id" value="<?php echo Auth::user()->id;?>">
           
          
          <input type="hidden" name="post_parent" value="<?php echo $post[0]->post_id;?>">
          
		  <div class="clearfix height20"></div>
          <div class="col-lg-6 paddingoff">
            <input type="submit" class="btn btn-primary custombtn" value="Send">
          </div>
		  <div class="clearfix height50"></div>
		 </div> 
        </form>
        </div>
        
		
		<?php
		$pcomment = DB::table('post')
							 ->where('post_parent', '=', $post[0]->post_id)
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->orderBy('post_id', 'DESC')
							 ->get();
							 $pcnt = DB::table('post')
							 ->where('post_parent', '=', $post[0]->post_id)
							 ->where('post_comment_type', '=', 'blog')
							 ->where('post_type', '=', 'comment')
							 ->where('post_status', '=', '1')
							 ->count();
							 
			if(!empty($pcnt)){				 ?>
        <div class="clearfix height20"></div>
         <div class="h3 black">View Comment</div>
         <div class="clearfix height30"></div>
         
         <?php 
		 
							 foreach($pcomment as $viwcomment){
							 $user = DB::table('users')
							         ->where('id', '=', $viwcomment->post_user_id)
									 ->get();
		?>					 
         <div class="col-lg-2 col-md-2 col-sm-2">
         <?php 
					   $userphoto="/media/";
						$path ='/local/images'.$userphoto.$user[0]->photo;
						if($user[0]->photo!=""){
						?>
						 <img src="<?php echo $url.$path;?>" class="thumb round" width="70" style="padding:0px !important;">
						 <?php } else { ?>
						  <img src="<?php echo $url.'/local/images/nophoto.jpg';?>" class="thumb round" width="70" style="padding:0px !important;">
						 <?php } ?>
         </div>
         <div class="col-lg-10 col-md-10 col-sm-10 paddingoff">
         <div class="h4 black"><?php echo $viwcomment->post_title;?></div>
         <div class="height5"></div>
         <div class="para"><?php echo $viwcomment->post_desc;?></div>
         <div class="height5"></div>
         <div class="fontsize12 gold italic"><?php echo date('d M Y h:i:s a',strtotime($viwcomment->post_date));?></div>
         </div>
         <div class="clearfix borderbottom paddingtopbottom10"></div>
         <div class="height100"></div>
         <?php } } ?>
         
        
        <?php } else {?>
        <div class="para black">You must be <a href="<?php echo $url;?>/login" class="gold bold">logged</a> in to post a comment.</div>
        <div class="height100"></div>
        <?php } ?>
        </div>
          
          
          
          
                   
              </div>      
                    
                    
                    <?php } ?>
                    </section>
                    
                    
                    
                    
                    </div>
                    
                  
                   
	
	
	 </main>
	
	
	 
    
	
	
	
    

      @include('footer')
     
</body>
</html>