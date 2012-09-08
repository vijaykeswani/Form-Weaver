<?php include("variables.php");
session_start(); ?>
<html>
<link rel="stylesheet" href="coolblue.css" />
</html>
<?
include("header.php");
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$tbname=$_SESSION["tbname"];
$sql = "select * from formcreator where tbname = $tbname order by qno";
$q = $conn->query($sql);
echo "<br><br><div class='post-bottom-section'>
        <div class='primary'>
        <ul class='archive'>";

echo "<form action='edit.php' method='get'>";

while($r = $q->fetch())
{
        echo "<li>";
        //echo "<form action='edit.php' method='get'>";
	echo "<div class='post-title'> Question Number :" .$r['qno']."</div>";
 	$qno=$r['qno'];
	//echo "<form action='edit.php' method='get'>";
	$question=$r['question'];
	$ques = $r['qno'].$r['question'];
	if(($_GET['check']==$question && $_GET['qno']==$qno))
	{
		echo "<input type='hidden' name='editquestion' value='1'>";
		echo "<input type='hidden' name='qno' value=$qno>";
		echo "<div class='post-details'> Question :<br> ";
		echo "<input type='text' name='question' />";
		echo "<input type='submit' value='Submit' />";
	}
	
	else
	{
		echo "<div class='post-details'> Question : " .$r['question'];
		echo "<a class='align-right' href='edit.php?qno=$qno&check=$question'> Edit </a>";
	}
	echo "</div>";
	$help = $r['help'];
	if(($_GET['check']==$help && $_GET['qno']==$qno))
        {
                echo "<input type='hidden' name='edithelp' value='1'>";
		echo "<input type='hidden' name='qno' value=$qno>";
		echo "<div class='post-details'> Help :<br> ";
                echo "<input type='text' name='help' />";
                echo "<input type='submit' value='Submit' />";
        }
        
        else
        {
                echo "<div class='post-details'> Help : " .$r['help'];
                echo "<a class='align-right' href='edit.php?qno=$qno&check=$help'> Edit </a>";
        }	
	echo "</div>";
	$type = $r['type'];
	if($_GET['check']==$type && $_GET['qno']==$qno)
	{
		echo "<input type='hidden' name='edittype' value='1'>";
		echo "<input type='hidden' name='qno' value=$qno>";
		echo "<div class='post-details'> Type :<br>";
		echo "<select name='type'>";
		echo "<option value='text'> text (short like name) </option>
<option value='paragraph'> paragraph (long like adress or opinion) </option>
<option value='number'> number </option>
<option value='multiple'> multiple </option>
<option value='checkbox'> checkbox </option>
<option value='dropdown'> dropdown </option>
<option value='radio'> radio </option>

</select>";
		echo "<input type='submit' value='Submit'>";
	}
	else
	{
		echo "<div class='post-details'>Answer Type : " .$r['type'];
		echo "<a class='align-right' href='edit.php?qno=$qno&check=$type'>Edit </a>";
	}
	echo "</div>";

	$req = $r['required'];
	if($_GET['qno']==$qno && $_GET['check']==$req)
	{
		//echo "<input type='hidden' name='editreq' value=$req>";
		//echo "<input type='hidden' name='qno' value=$qno>";
		$conn = mysql_connect($dbhost,$dbuser,$dbpass);
        	mysql_select_db($dbname,$conn);
       	 	$qno = $_GET['qno'];
        	$req = $_GET['check'];
        	if($req=='yes')
        	        $sql = "update $tbcreator set required='no' where tbname=$tbname and qno=$qno";
        	else if($req=='no')
        	        $sql = "update $tbcreator set required='yes' where tbname=$tbname and qno=$qno";
        	echo $sql;
        	$q = mysql_query($sql);
        	if($q)
        	        echo "done";
        	else
        	        echo "not done";
        	header("Location: edit.php");


	}
	else
	{
		echo "<div class='post-details'> Required : " .$r['required'];
		echo "<a class='align-right' href='edit.php?qno=$qno&check=$req'> Change </a>";
	}
	echo "</div>";
	
        $conn2 = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
        $sql2 = "select * from options where tbname = $tbname";
        $q2 = $conn2->query($sql2);
        $i = 1;
        while($r2 = $q2->fetch())
        {
                if($r['qno']==$r2['qno'])
                {
			$choice = $r2['choice'];
                        if($_GET['check']==$choice && $_GET['qno']==$qno)
			{
				echo "<input type='hidden' name='editchoice' value=$choice>";
				echo "<input type='hidden' name='qno' value=$qno>";
				echo "<div class='post-details'>Option ".$i." :<br>";
				echo "<input type='text' name='option'>";
				echo "<input type='submit' value='Submit'>";
			}
			else
			{
				echo "<div class='post-details'>Option " . $i ." = " .$r2['choice'];
                        	echo "<a class='align-right' href='edit.php?qno=$qno&check=$choice'> Edit</a>";
			}
			echo "</div>";
			$i=$i+1;
                	$flag = 1;
		}
        	
	}
	if($flag==1)
	{
	if($_GET['check']=='addchoice' && $_GET['qno']==$qno)
	{
		echo "<input type='hidden' name='addchoice' value='1'>";
		echo "<input type='hidden' name='qno' value=$qno>";
		echo "<div class='post-details'>Option : <br>";
		echo "<input type='text' name='option'>";
		echo "<input type='submit' value='Submit'>";
	}
	else
	{
		echo "<div class='post-details'> &nbsp ";
		$addchoice='addchoice';
		echo "<a class='align-right' href='edit.php?qno=$qno&check=$addchoice'>Add Option</a>";
	}
	echo "</div>";

	//echo "</form>";
        
	$flag=0;
	}
//	echo "</form>";
//	echo "</li>";
}
if(isset($_GET['editquestion']))
{
        $conn = mysql_connect($dbhost,$dbuser,$dbpass);
        mysql_select_db($dbname,$conn);
	$qno = $_GET['qno'];
	$question = $_GET['question'];
	$sql = "update $tbcreator set question='$question' where tbname=$tbname and qno=$qno";
	echo $sql;
	$q = mysql_query($sql);
	if($q)
		echo "done";
	else
		echo "not done";
	header("Location: edit.php");
}

if(isset($_GET['edithelp']))
{
        $conn = mysql_connect($dbhost,$dbuser,$dbpass);
        mysql_select_db($dbname,$conn);
        $qno = $_GET['qno'];
        $help = $_GET['help'];
        $sql = "update $tbcreator set help='$help' where tbname=$tbname and qno=$qno";
        echo $sql;
        $q = mysql_query($sql);
        if($q)
                echo "done";
        else
                echo "not done";
        header("Location: edit.php");
}

if(isset($_GET['editchoice']))
{
	$conn = mysql_connect($dbhost,$dbuser,$dbpass);
        mysql_select_db($dbname,$conn);
        $qno = $_GET['qno'];
	$newchoice = $_GET['option'];
	$oldchoice = $_GET['editchoice'];
	$sql = "update options set choice='$newchoice' where tbname=$tbname and qno=$qno and choice='$oldchoice'";
	echo $sql;
	$q = mysql_query($sql);
	if($q)
		echo "done";
	else
		echo "not done";
	header("Location: edit.php");	
}

if(isset($_GET['addchoice']))
{
        $conn = mysql_connect($dbhost,$dbuser,$dbpass);
        mysql_select_db($dbname,$conn);
        $qno = $_GET['qno'];
        $choice = $_GET['option'];
        $sql = "insert into options (tbname, qno, choice) values ($tbname, $qno, '$choice') ";
        echo $sql;
        $q = mysql_query($sql);
        if($q)
                echo "done";
        else
                echo "not done";
        header("Location: edit.php");
}

if(isset($_GET['edittype']))
{
	$conn = mysql_connect($dbhost,$dbuser,$dbpass);
        mysql_select_db($dbname,$conn);
        $qno = $_GET['qno'];
	$type=$_GET['type'];
	$sql = "update $tbcreator set type='$type' where tbname=$tbname and qno=$qno";
	mysql_query($sql);
	if((($_GET["type"]=="checkbox") || ($_GET["type"]=="radio") || ($_GET["type"]=="multiple") || ($_GET["type"]=="dropdown")))
	{
		insertoptions($tbname,$qno);
	}
}


echo "</form>";
echo "</ul> </div></div>";
include("footer.php");

function insertoptions($tbname,$qno)
{
	if(!isset($_GET['Finishoptions']))
	{
		echo "<input type='hidden' name='edittype' value='1'>";
		echo "<input type='hidden' name='qno' value=$qno>";
		echo "<div class='post-details'>Option :<br>";
		echo "<input type='text' name='addoption'>";
		echo "<input type='submit' name='submit' value='Submit'>";
		echo "<input type='submit' name='Finishoptions' value='Finish'>";
	}
	if(isset($_GET['addoption']))
	{
		$conn = mysql_connect($dbhost,$dbuser,$dbpass);
        	mysql_select_db($dbname,$conn);
		$choice = $_GET['addoption'];
		$sql = "insert into options (tbname, qno, choice) values ($tbname, $qno, '$choice')";
		mysql_query($sql);
	}
}  


?>

