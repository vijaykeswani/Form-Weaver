<?php
include("variables.php");
?>
<head>
<link rel="stylesheet"   href="coolblue.css" />
<title>
	Form Weaver
</title>
</head>



<?php include("header.php"); 
for($i=0;$i<25;$i++)
	$space.="&#160";
?>
<br><br>
<?
echo "<h3> $space View Responses </h3>";
?>
<div class="post-bottom-section">
<div class="primary">
<form action="responses.php" method="get" >
<strong>Enter name of table whose responses you want to see :</strong>
<br><input type='text' name='name' />
<br>
<br>
<input class='button' type='submit' value='Submit'/>
</form>
</div>
</div>
<br><br><br><br><br>
<?
include("footer.php");
?>
