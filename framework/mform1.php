

<html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->

<!--
<html class="no-js" lang="en"> 
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title></title>
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/style.css">

        <script src="js/libs/modernizr-2.5.3-respond-1.1.0.min.js"></script>
</head>
<body>
-->

<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<!--        <div id="header-container">
                <header class="wrapper clearfix">
                        <h1 id="title">Signed in as <?php //echo $dbuser ?></h1>
                        <nav>
                                <ul>
                                        <li><a href="login.php">Home</a></li>
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="contacts.php">Contact us</a></li>
                                </ul>
</nav>
                </header>
    </div>
        <div id="main-container">
                <div id="main" class="wrapper clearfix">

                        <article>
                                <header>
                                       
-->

<!-- --------------------------------------------------------------------------------------------------------------------------------- -->

<head>
<link rel="stylesheet"   href="coolblue.css" />
</head>



<?php include("header.php"); ?>

<br><br>

<div id="content-wrap">
<?php 
include ("variables.php");
//echo "above";
include ("functions.php");
//echo "below"; ?>
<?php session_start(); 
//Print_r ($_SESSION); 
?>


<?php

if(isset($_GET["option"]))
{
	//include("insertoptions.php");
	insertoptions($_GET["optionq"]);
}
else
{
	if(isset($_GET["edit"]))
	{
		/*if(isset($_GET["qno"]))
		{
			
			insertdata("edit",$_GET["qno"]);
		}
		if((!(isset($_GET["type"]))) || (($_GET["type"]=="text" || $_GET["type"]=="number" || $_GET["type"]=="paragraph" ) ))

		{
			include ("showallq.php");
			include ("editrecord.php");
		}
	*/
		
	}
	
	else
	{
		if(isset($_GET["review"]))
		{
			include("mform3.php");
		}
		else
		{
			$_SESSION["jugaad"]=0;
			if(isset($_GET["question"]))
			{
				$_SESSION['qno']=$_SESSION['qno']+1;
				insertdata("add",$_SESSION["qno"]);
			}

			if($_SESSION["jugaad"]==0)
			{
				include("showallq.php");
 				include ("insertrecord.php"); 
			}
		}
	}
}



for($i=0;$i<20;$i++)
	$space.="&#160";


if(!(isset($_GET["review"])) &&!(isset($_GET["edit"])) &&!(isset($_GET["options"])) )   
	echo "<div class='navigation clearfix'> <a  href='mform1.php?review=1'><h5> Review the form </h5></a> </div>" ;
if((isset($_GET["edit"]))  &&!(isset($_GET["options"])))   
	echo "<div class='navigation clearfix'> <a href='mform1.php?review=1'> <h5>Finish Editing </h5></a> </div>" ;


?> 
</div>
<?
include("footer.php");
?>



<!--                       </aside>
		<easide>
                                        <p>
                                           
                                        </p>
                                </footer>
                        </article>


                </div> 
        </div> 

        <div id="footer-container">
                <footer class="wrapper">
                        <h3>copyright inc by Deepak, Rachit, Keswani and Daga</h3>
                </footer>
        </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>

<script src="js/script.js"></script>
<script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>
-->
