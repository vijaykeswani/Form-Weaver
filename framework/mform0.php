<?php include ("variables.php"); 
session_start(); ?>

<?php
$tbname = rand();
if(!(isset($_POST["privilege"])))
{
include ("privilege.php");
}
else
{
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql = "INSERT into privilege VALUES(:tbname,:user1,:user2,:user3,:user4,:user5)";
$q = $conn->prepare($sql);
if($q->execute(array(':tbname'=>$tbname,
                        ':user1'=>$_POST["user1"],
                        ':user2'=>$_POST["user2"],
                        ':user3'=>$_POST["user3"],
                        ':user4'=>$_POST["user4"],
                        ':user5'=>$_POST["user5"])))
{
$_SESSION['tbname']=$tbname;
$_SESSION['name']=$_POST['formname'];
$_SESSION['qno']=0;
$_SESSION['insertprivilege']=0;
//echo "your table id: " . $_SESSION['tbname'] ." created<br>";
//echo "<a href='mform1.php'> continue </a>";
header( 'Location: mform1.php' ) ;

}
else
{
echo "failed";
header( 'Location: mform0.php' ) ;

}
}
?>

