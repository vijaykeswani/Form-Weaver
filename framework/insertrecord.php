<?php
include("variables.php");
session_start();
?>
<head>

</head>
<?
for($i=0;$i<20;$i++)
	$space.="&#160";
?>
<h2><? echo $space; ?> Add Question </h2>
<div class="post-bottom-section">
<div class="primary">
<form action="mform1.php" method="get">
<hr><br>
<?php
$q = $_SESSION['qno'] + 1;
 echo "<h4>Question " .$q."</h4>"; ?>

        Question Text(*)  : <br> <input type="text" name="question" /><br>
        Help To Question  : <br> <input type="text" name="help" /><br>
        Question Type(*)  : <br> <select name="type">
<option value="text"> text (short like name) </option>
<option value="paragraph"> paragraph (long like adress or opinion) </option>
<option value="number"> number </option>
<option value="multiple"> multiple </option>
<option value="checkbox"> checkbox </option>
<option value="dropdown"> dropdown </option>
<option value="radio"> radio </option>

</select><br>
        Mark As Required(*) :<br><select name="required">
<option value="yes"> YES </option>
<option value="no"> NO </option>
</select><br>
<input class="button" type="submit" />
</form>
</div>
</div>
