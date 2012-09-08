<?php
include ("variables.php");
session_start();
if(isset($_POST["id"])) $id=$_POST["id"];
if(isset($_POST["password"])) $password=$_POST["password"];
//echo $id;

if(isset($_GET["key"]))
{


$key=$_GET["key"];
$tempid=$_GET["id"];
echo $key;
$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

$sql3 = "select * from userlogin where id='$tempid'";
$q3=$conn->query($sql3);
$doneactiv=0;
while($r3=$q3->fetch())
{
if($r3['randomkey']==$key)
{
$id=$r3['id'];
$sql= "UPDATE userlogin SET activated='1' WHERE id='$id'";
$q=$conn->query($sql);
if($q->execute())
{
$doneactive=1;
}
else "error";
}
}
if($doneactive==1) echo "activated";
else echo "fail";
echo "<a href='login.php'> login </a>";


echo $_GET["key"];
}

//if(0) echo "going in else";
else
{
$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql2= "SELECT * from userlogin where id='$id'";
$q2=$conn->query($sql2);
$inrecord=0;
while($r=$q2->fetch())
{
$inrecord=1;
if($r['activated']==1)
{
$check=$r['password'];
if ($check==$password) 
	{
echo "Welcome";
		
$_SESSION["id"]=$id;
header( 'Location: home.php') ;

//Print_r($_SESSION);
echo "<a href='changepassword.php'> change password </a>";
	}
else  echo "wrong password";
}
else echo "not activated";
}

if($inrecord==0)
{
$key = rand();
$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql = "INSERT INTO userlogin VALUES(:id,:password, :randomkey,:activated)";
$q = $conn->prepare($sql);
if($q->execute(array(':id'=>$id,
                        ':password'=>$password,
			':randomkey'=>$key,
			':activated'=>0)))
{
echo "done!! visit ur mailbox";
$email = $id ."@iitk.ac.in";
$subject = "Confirmation mail";
$message = "Dear $id,\nYou have been successfully registered.\nPlease use the link given below to access your account\n\nlink : $loginlink?key=$key&id=$id";
$from = "Webapp";
$headers = "From:" . $from;
//echo $message;
mail($email, $subject, $message, $headers);
echo "\nmail sent.";
}
else echo "error";

}

}


?>
