<?include ("variables.php");?>

<?php
$email=$_POST["email"];
$id=$email;
$email=$id ."@iitk.ac.in";
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];


//$con=mysql_connect("localhost:3306","aca","webapp");
//if(!$con)
//{
//        die('Connection Failed'.mysql_error());
//}
//mysql_select_db("aca",$con);
//$password=rand();
//$sql="INSERT INTO test(Userid,Name,Password) VALUES ('$email','$first_name','$password')";

//if (!mysql_query($sql,$con))
//	{
//		die('Error: '.mysql_error());
//	}
//echo "1 record added";

//mysql_close($con);



$link=mysqli_connect("localhost","aca","webapp","aca");

if (mysqli_connect_errno())
{
	printf ("Connection error %s\n",mysqli_connect_error());
	exit();
}

$password=rand();

$stmt=mysqli_stmt_init($link);

mysqli_stmt_prepare($stmt,'INSERT INTO test (Userid,Password) VALUES (?,?,?)');
mysqli_stmt_bind_param($stmt,"sss",$id,$first_name,$password);

if(!mysqli_stmt_execute($stmt))
{
	die('ERROR: ' .mysqli_error());
}

else {
echo "1 record added\n";
echo $email;
}
mysqli_close($link);

$subject = "Confirmation mail";
$message = "Dear $first_name,\nYou have been successfully registered.\nPlease use the password given below to access your account\n\nPassword : $password";
$from = "Webapp";
$headers = "From:" . $from;
    
mail($email, $subject, $message, $headers);
echo "\nmail sent.";
?>

<html>
<form><input type="button" align="right" value="Login" onClick="window.location.href='login.php'">
</form>
</html>

