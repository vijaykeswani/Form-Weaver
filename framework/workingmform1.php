<? include ("variables.php"); ?>
<? session_start(); 
Print_r ($_SESSION); ?>

<h1>--DONOT REFRESH--</h1>

<?php
$tbname = $_SESSION['tbname'];
//if(isset($_POST["qno"])) $_SESSION['qno'] = $_POST['qno'];
//if(isset($_POST["type"])) $_SESSION['type']=$_POST['type'];
//if(isset($_POST["option"]))
//{
//$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
//$sql2 = "INSERT into options VALUES(:tbname,:qno,:option)";
//$q=$conn->prepare($sql2);
//$q->execute(array(':tbname'=>$_SESSION['tbname'],
//			':qno'=>$_SESSION["qno"],
//			':option'=>$_POST["option"]));
//}
//if(($_SESSION["type"]=="checkbox") || ($_SESSION["type"]=="radio") || ($_SESSION["type"]=="multiple") || ($_SESSION["type"]=="dropdown"))
//{
//echo "options will be displayed...";
//include ("insertoptions.php");
//}

//else
//{
if(isset($_POST["qno"]))
{
$_SESSION['qno']=$_POST['qno'];
$tbname= $_SESSION['tbname'];
$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql = "INSERT into $tbcreator VALUES(:tbname,:qno,:question,:help,:type,:required)";
$q = $conn->prepare($sql);
$q->execute(array(':tbname'=>$tbname,
			':qno'=>$_POST["qno"],
			':question'=>$_POST["question"],
			':help'=>$_POST["help"],
			':type'=>$_POST["type"],
			':required'=>$_POST["required"]));
include ("showallq.php");

if(($_POST["type"]=="checkbox") || ($_POST["type"]=="radio") || ($_POST["type"]=="multiple") || ($_POST["type"]=="dropdown"))
{
include ("insertoptions.php");
}


}
 include ("insertrecord.php"); 
//}
?>



<a href='mform3.php'> review </a>

