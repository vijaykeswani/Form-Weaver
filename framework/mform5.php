<? include("variables.php"); ?>
<? session_start();
//Print_r ($_SESSION); ?>
<head>
<link rel="stylesheet"   href="coolblue.css" />
</head>
<?
include("header.php");

$tbname = $_SESSION['tbname'];

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql1 = "select * from $tbcreator where tbname=$tbname order by qno";
$q1 = $conn->query($sql1);

//echo "suc"; }
//echo "fail"; 
//Print_r($q1);
//mysql_select_db($dbname);

//$result="CREATE TABLE $tbname (qno INT, answer VARCHAR(30))";
//if (mysql_query($result)){
//echo "success in table creation.";
//} else {
//echo "no table created.";
//}
if(!(mysql_query("SELECT * FROM `$tbname`")))
{
$sql = "CREATE TABLE  `$tbname` (
userid varchar(7) DEFAULT 0 NOT NULL
)"; 

$q=$conn->query($sql);
}
//while($r=$q->fetch())
//{
//$sql2 = "INSERT into $tbname(qno) VALUES(.$r[qno])";
//mysql_query($sql2,$conn);
//}
$i=0;
while($r=$q1->fetch())
{
	$i=$i+1;
	$sql2="ALTER TABLE `$tbname` ADD answer$i VARCHAR(100) NOT NULL";
	//echo $sql2."<br />";
	$q2=$conn->query($sql2);
	//if($q2)
	//	echo("success");
	//else
	//echo("fail");

}
?>
<?
for($i=0;$i<40;$i++)
	$space.='&nbsp ';
echo "<br><br><pre><code><p><h5> $space Your form has been successfully created.<br><a  href='generate.php?tbname=$tbname&action=#'> $space Click here</a> to see a Preview of the form</h5></p></pre></code>";
?>
<?php
/*
$to="vijaykes@iitk.ac.in";
$subject="Form";
$message="<a href=http://172.31.76.190/aca/framework_new/generate.php?tbname=$tbname></a>";
$from="team";
$headers=$from;
mail($to, $subject, $message, $headers);
*/
?>

<!--<a href="generate.php"> generate </a>
-->

