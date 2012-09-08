<? include("variables.php"); ?>
<? session_start(); 
//Print_r ($_SESSION); ?>
<?
for($i=0;$i<17;$i++)
	$space.="&#160";
?>
<br><br><h2><? echo $space;?> Review  </h2>

<?php
include("showallq.php");
?>
<?
for($i=0;$i<5;$i++)
	$space.="&#160";
?>
<div id="main">
<article class="post">
<div class="primary">
<? //echo $space; ?><div><a class="more" href="mform1.php"><h5> add </h5></a></div>
 
<div><a class="more" href="edit.php"><h5> edit </h5></a></h5></div>
<? //echo $space; ?>

<div><a class="more" href="mform5.php"> <h5> finish </h5></a></div>
</div>
</div>

