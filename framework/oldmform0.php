<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> 


<html class="no-js" lang="en"> <!--<![endif]-->
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
<!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

	<div id="header-container">
		<header class="wrapper clearfix">
			<h1 id="title">Signed in as <?php echo $dbuser ?></h1>
			<nav>
				<ul>
					<li><a href="home.php">Home</a></li>
					<li><a href="blank">About</a></li>
					<li><a href="_blank">Contact us</a></li>
				</ul>
			</nav>
		</header>
	</div>
	<div id="main-container">
		<div id="main" class="wrapper clearfix">
			
			<article>
				<header>
					
					<p>
				<? include ("variables.php"); ?>

<?php session_start(); ?>

<?php
echo $_SESSION["id"];
//Print_r("$_SESSION");

$tbname = rand() .rand() .rand();
echo $tbname;
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql2 = "insert into privilege values (:tbname,:user1)";
$q2 = $conn->prepare($sql2);
/*if($q2->execute(array(':tbname'=>$tbname,
			':user1'=>$_SESSION['id'])))
{
$_SESSION['tbname']=$tbname;
Print_r ($_SESSION);
//echo "your table id: " . $_SESSION['tbname'] ." created<br>";
}
*/
//else header( 'Location: oldmform0.php') ;


//$sql = 'select * from `' . $tbcreator . '` where tbname = `' . $tbname;

if($q = $conn->query($sql))
{
echo "successfull";
}
else
{
header("mform0.php");
}

$_SESSION['qno']=0;

?>

				<section>
					<h1>You Have Successfully Logged in</h1>
					<p>
					    YO!
					</p>
				</section>
				<footer>
					<h3>Things u can do</h3>
					<p>Get ur forms made in just a few clicks <br />
					   <a href="mform1.php"> Continue </a>
					</p>
				</footer>
			</article>
			
			<aside>
				<h3>About our project</h3>

				<p>This is awesome!!!</p>
			</aside>
			
		</div> <!-- #main -->
	</div> <!-- #main-container -->

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

