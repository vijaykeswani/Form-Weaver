<?php
include ("variables.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta charset=utf-8>
    <title>Form Weaver</title>
    
    <script src="../../js/modernizr-1.7.min.js"></script><!-- this is the javascript allowing html5 to run in older browsers -->
    <!--[if IE]><script type="text/javascript" src="../../excanvas.js"></script><![endif]-->
    
    <!-- latest jquery library -->
    <script src="http://c.fzilla.com/1286136086-jquery.js"></script>
    
    <link rel="stylesheet" type="text/css" href="../../css/reset.css" media="screen" title="html5doctor.com Reset Stylesheet" />
    
    <!-- in the CSS3 stylesheet you will find examples of some great new features CSS has to offer -->
    <link rel="stylesheet" type="text/css" href="../../css/css3.css" media="screen" />
    
    <!-- general stylesheet contains some default styles, you do not need this, but it helps you keep a uniform style -->
    <link rel="stylesheet" type="text/css" href="../../css/general.css" media="screen" />
    
    <!-- grid's will help you keep your website appealing to your users, view 52framework.com website for documentation -->
    <link rel="stylesheet" type="text/css" href="../../css/grid.css" media="screen" />
    
    <!-- special styling for forms, this can be used as a form framework on its own -->
    <link rel="stylesheet" type="text/css" href="../../css/forms.css" media="screen" />
    
    <!-- embeds necessary for html5 video player, take this section out if you are not using the video player -->
    
    <script src="../../video/video.js" type="text/javascript" charset="utf-8"></script>
    
    <script type="text/javascript" charset="utf-8">
 	$(function(){
    	VideoJS.setupAllWhenReady();
    })
    </script>
    <link rel="stylesheet" href="../../video/video-js.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="../../video/vim.css" type="text/css" media="screen" charset="utf-8">
	<!-- end video embed scripts and styles -->
    
    <!-- this script is needed to accomplish html5 validation, uses jquery tools validator script -->
    <script src="../../js/validator.js"></script>
    <script>
		$(function(){
			$("form").validator()
		})
	</script>
    
    <!-- Canvas example taken from http://www.williammalone.com/articles/html5-canvas-example/ -->
	<script src="../../canvas/canvas_example.js"></script>
	
    <!-- this script is needed for using advanced css selectors in your css -->
    <!--[if (gte IE 6)&(lte IE 8)]>
    	<script src="../../js/selectivizr.js"></script>
    <![endif]-->  
    
    <!-- the following style is for demonstartion purposes only and is not needed for anything but inspiration -->
    <style>
		header {padding-top:25px; border-bottom:1px solid #ccc; padding-bottom:20px;}
		header .logo {font-size:3.52em;}
		header nav ul li {float:left; margin-top:12px;}
		header nav ul li a {display:block; padding:5px 15px; border-right:1px solid #eee; font-size:1.52em; font-family:Georgia, "Times New Roman", Times, serif; text-decoration:none;}
		header nav ul li a:hover {background-color:#eee; border-right:1px solid #ccc; text-shadow:-1px -1px 0px #fff;}
		header nav ul li.last a {border-right:none;}
		
		#css3 div > div {margin:0px 0px 50px 0px; padding:6px; border:1px solid #eee;}
		#grid div {text-align:center;  }
		#grid div > .col {border-bottom:1px solid #ccc; padding:10px 0px; outline:1px solid #eee;}
		
		
		.vim-css {margin:10px auto;}
		
		
		h2 {border-bottom:1px dashed #ccc; margin-top:15px;}
		
		.documentation {display:block; background-color:#eee; padding:6px 13px; font-family:Georgia, "Times New Roman", Times, serif; color:#666; text-align:right; text-shadow:-1px -1px 0px #fff;}
		
		footer {text-align:center; color:#666; font-size:0.9em; padding:4px 0px;}
	</style>
    </head>

<body>
<div class="row">
	<header>
    	
        <div class="logo col_7 col">IITK Form designer</div><!-- logo col_7 -->
        
      <nav class="col_9 col">
        	<ul>
            	<li><a href="mform0.php">Create Form</a></li>
                <li><a href="_blank">Submit Response</a></li>
                <li><a href="http://search.junta.iitk.ac.in">Student Search</a></li>
		<li><a href="view_resp.php">View Responses</a></li>
<li><a href="change.php">Change Password</a></li>	
	 <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav><!-- nav col_9 -->
      <div class="clear"></div><!-- clear -->
    </header>
</div><!-- row -->

<!-- html5 video player, fully customizable via the video.css stylesheet -->
<!-- <section class="row" id="video">
	<div class="col col_16">
    	<h2 class="fontface">Tutorial Video</h2>
        <!-- Begin VideoJS -->
        <div class="video-js-box vim-css">
        <!-- Using the Video for Everybody Embed Code http://camendesign.com/code/video_for_everybody -->
        <video class="video-js" width="640" height="264" poster="http://video-js.zencoder.com/oceans-clip.png" controls preload>
          <source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
          <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm; codecs="vp8, vorbis"' />
          <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg; codecs="theora, vorbis"' />
          <!-- Flash Fallback. Use any flash video player here. Make sure to keep the vjs-flash-fallback class. -->
          <object class="vjs-flash-fallback" width="640" height="264" type="application/x-shockwave-flash"
            data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
            <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
            <param name="allowfullscreen" value="true" />
            <param name="flashvars" value='config={"playlist":["http://video-js.zencoder.com/oceans-clip.png", {"url": "http://video-js.zencoder.com/oceans-clip.mp4","autoPlay":false,"autoBuffering":true}]}' />
            <!-- Image Fallback. Typically the same as the poster image. -->
            <img src="http://video-js.zencoder.com/oceans-clip.png" width="640" height="264" alt="Poster Image"
              title="No video playback capabilities." />
          </object>
        </video>
        </div>
        <!-- End VideoJS -->
-->
<!--	</div><!-- col-->
  <div class="col_16 col">
 	<a href="http://videojs.com" class="documentation">HTML5 Video Player Documentation</a>
    </div><!-- col -->
</section><!-- row -->
-->
<!-- html5 form validation using jquery tools validator -->
<section class="row" id="forms">
<!--	<h2 class="fontface">Login Or Sign Up To Our Project</h2>
       <form action="../../../redirect1.php" method="POST" class="col col_7">
 
<fieldset>	
        	<legend>Login details</legend>
            	
            
            <div>
            	<label>Username</label>
                <input type="text" name="id" class="box_shadow" />

	    </div>
            <div>
            	<label>Password</label>
                <input type="password" name="password" class="box_shadow" />
            </div>
            <input type="submit" value="Submit" />
	    <input type="reset" value="Reset" />
        </fieldset>
    </form> -->
<?php
include ("variables.php");
session_start();
?>

        <h3 class="fontface">Share Responses</h3>
       <form action="mform0.php" method="POST" class="col col_7">

<fieldset>
                <legend>Whom Do you Want To Share The Responses?</legend>

<input type="hidden" value="privilege" name="privilege"/>
            <div>
                <label>Username</label>
                <input type="text" name="user2" class="box_shadow" /><td><label>@iitk.ac.in</label></td>
            </div>
            <div>
                <label>Username</label>
                <input type="text" name="user3" class="box_shadow" /><label>@iitk.ac.in</label>

            </div>
            <div>
                <label>Username</label>
                <input type="text" name="user4" class="box_shadow" /><label>@iitk.ac.in</label>

            </div>
            <div>
                <label>Username</label>
                <input type="text" name="user5" class="box_shadow" /><label>@iitk.ac.in</label>

            </div>



<input type="submit" value="Submit" />
            <input type="reset" value="Reset" />
        </fieldset>
    </form>


<!--  <div class="clear" style="height:15px;"></div><!-- clear -->
	<div class="col_16 col">
    	<a href="http://flowplayer.org/tools/validator/index.html" class="documentation">HTML5 Form Validation Documentation</a>
    </div><!-- col -->
</section><!-- row -->
-->



<footer class="row">

	<div class="col_16 col">all rights reserved &copy; <a href="http://home.iitk.ac.in/~nimavat/old/">rachit's home page</a> | dcframework the framework from the future</div>

</footer>
</body>
</html>
