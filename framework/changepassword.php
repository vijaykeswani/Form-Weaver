<?php
include ("variables.php");
session_start();
Print_r($_SESSION);
echo "hiiiii";
if(isset($_SESSION["id"]))
{
if(!isset($_POST["passwordold"]))
{
echo "
<form method='post' action='changepassword.php'>
<table>
<tr>
<td>
<B>User-Id</B>
</td>

<td>";
echo $_SESSION['id'];
echo "
</tr>

<tr>

<td><B>Current Password</B></td>

<td><input name='passwordold' type='passwordold'></input></td>
</tr>
<tr>

<td><B>New Password</B></td>

<td><input name='passwordnew1' type='passwordnew1'></input></td>
</tr>
<tr>

<td><B>Confirm Password</B></td>

<td><input name='passwordnew2' type='passwordnew2'></input></td>
</tr>


<tr>
<td><input type='submit' value='submit'/>
</td>
<td><input type='reset' value='Reset'/>

</tr>

</table>
</form>
";
}
else
{
if($_POST["passwordnew1"]==$_POST["passwordnew2"])
{

$link=mysqli_connect("localhost","aca","webapp","aca");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt=mysqli_stmt_init($link);

if(mysqli_stmt_prepare($stmt,'SELECT Password FROM test WHERE Userid=?')){

mysqli_stmt_bind_param($stmt,"s",$_SESSION["id"]);

mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$check);
mysqli_stmt_fetch($stmt);
echo $check;
if ($check==$_POST["passwordold"])
        {
                echo "Welcome";
echo "ready to change passwd";

/*$stmt2=mysqli_stmt_init($link);
if(mysqli_stmt_prepare($stmt2,'UPDATE test SET Password=? WHERE Userid=?')){
mysqli_stmt_bind_param($stmt2,'s',$passwordnew1,$_SESSION['id']);
mysqli_stmt_execute($stmt2);
mysqli_stmt_bind_result($stmt2);
echo "done";
*/
}
else echo "sorry";



        }
else echo "Sorry!";
mysqli_stmt_close($stmt);
}
mysqli_close($link);
}
}
}
?>


