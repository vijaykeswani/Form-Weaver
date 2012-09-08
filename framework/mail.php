<?php
include("variables.php");
session_start();

?>
<head>
<title>
	Form Weaver
</title>

<link rel="stylesheet"   href="coolblue.css" />
</head>

<?
$tbname=$_GET['tbname'];
include("header.php");
for($i=0;$i<40;$i++)
	$space.='&nbsp ';
//echo "<br><br><pre><code><p><h5> $space Your form has been successfully mailed.<br> $space If there are any more people you would like to send this form to,<br> $space Copy-paste the link given below and send it as a mail<br></h5><strong> $space href=http://172.31.76.190/aca/framework_new/generate.php?tbname=$tbname</strong><br></p></pre></code>";

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql = "select * from privilege where tbname = $tbname";
$q = $conn->query($sql);
if($r = $q->fetch())
	echo "<br><br><pre><code><p><h5> $space Your form has been successfully mailed.<br> $space If there are any more people you would like to send this form to,<br> $space Copy-paste the link given below and send it as a mail<br></h5><strong> $space href=http://172.31.76.190/aca/framework_new/generate.php?tbname=$tbname</strong><br></p></pre></code>";
else
	echo "not done";

$id=$r['user1'];
$to=$id."@iitk.ac.in";
$subject="Form";
$message="Your response is requested in the following form.
	Please visit the attached link to register a response.
	<a href=http://172.31.76.190/aca/framework_new/generate.php?tbname=$tbname></a>";
$username = $_SESSION["id"];
echo $to."<br>".$username;
$headers=$username;
if(mail($to, $subject, $message, $headers))
	echo "done";
else
	echo "not done";
	
/*
$id=$r['user2'];
$to="$id@iitk.ac.in";
$subject="Form";
$message="Your response is requested in the following form.
	Please visit the attached link to register a response.
	<a href=http://172.31.76.190/aca/framework_new/generate.php?tbname=$tbname></a>";
$username = $_SESSION['id'];
$from="$username";
$headers="";
mail($to, $subject, $message, $headers);

$id=$r['user3'];
$to="$id@iitk.ac.in";
$subject="Form";
$message="Your response is requested in the following form.
	Please visit the attached link to register a response.
	<a href=http://172.31.76.190/aca/framework_new/generate.php?tbname=$tbname></a>";
$username = $_SESSION['id'];
$headers="From: $username";
mail($to, $subject, $message, $headers);

$id=$r['user4'];
$to="$id@iitk.ac.in";
$subject="Form";
$message="Your response is requested in the following form.
	Please visit the attached link to register a response.
	<a href=http://172.31.76.190/aca/framework_new/generate.php?tbname=$tbname></a>";
$username = $_SESSION['id'];
$from="$username";
$headers="";
mail($to, $subject, $message, $headers);

$id=$r['user5'];
$to="$id@iitk.ac.in";
$subject="Form";
$message="Your response is requested in the following form.
	Please visit the attached link to register a response.
	<a href=http://172.31.76.190/aca/framework_new/generate.php?tbname=$tbname></a>";
$username = $_SESSION['id'];
$from="$username";
$headers="";
mail($to, $subject, $message, $headers);
*/
for($i=0;$i<13;$i++)
	$line.="<br>";
echo $line;
include("footer.php");
?>
