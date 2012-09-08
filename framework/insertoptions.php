<?php include("variables.php");
session_start();
//Print_r($_SESSION); ?>
<?php
//echo "included";

if(isset($_GET['choice']))
{
//echo $_SESSION['tbname'];
//echo  $_SESSION['qno'];
//echo $_GET['choice'];


$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql = "INSERT into options VALUES(:tbname,:qno,:choice)";
$q = $conn->prepare($sql);
$q->execute(array(':tbname'=>$_SESSION["tbname"],
                        ':qno'=>$_SESSION["qno"],
                        ':choice'=>$_GET["choice"]));


//if($q) echo "added";
}
?>
<div class="post-bottom-section">
<div class="primary">
<? include("showallq.php"); ?>
<form action="mform1.php" method="get">
<input type="hidden" name="option" value="1" />
Option : <input type="text" name="choice" /> <br><br>
<input type="submit"/>
</form>

<?php
if(isset($_GET["edit"])) echo "<a href='mform1.php?edit=1'> finish adding options </a>";
else echo "<a class='more' href='mform1.php'> add new ques </a>";
?>
</div>
</div>
