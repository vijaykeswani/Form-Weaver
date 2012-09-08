<head>
<link rel="stylesheet"   href="coolblue.css" />
</head>

<?php
include ("variables.php");
session_start();
?>

<?php include("header.php"); ?>

<br><br>
 <?
for($i=0;$i<20;$i++)
	$space.="&#160";
?>
<h2><? echo $space; ?> Create a form </h2>

<div class="post-bottom-section">
<div class="primary">
<form action="mform0.php" method="post">
<strong> Give a Name to your Form</strong><br>
<input type="text" name="formname">
<br>
<strong> Enter ID's of people who you wish to send the form (Limit 5)</strong>
<input type="hidden" value="privilege" name="privilege"/>
<br>
Username : <input type="text" name="user1"><br>
Username : <input type="text" name="user2"><br>
Username : <input type="text" name="user3"><br>
Username : <input type="text" name="user4"><br>
Username : <input type="text" name="user5"><br>
<br>
<strong>P.S. : </strong>If there are any more people whom you want to send the form,
a link will be given to you later which you can mail to all those people.<br><br>
<input class="button" type="submit" value="Submit">
</form>
</div>
</div>
<? include("footer.php");
?>

