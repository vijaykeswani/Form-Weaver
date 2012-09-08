<head>
<title>
	Form Weaver
</title>

<link rel="stylesheet"   href="coolblue.css" />
</head>
<? include ("variables.php"); 
//echo "hi";
 session_start();
//Print_r ($_SESSION); ?>
<?php
$tbname = $_GET['tbname'];
//echo $tbname;
echo "<br>";
for($i=0;$i<11;$i++)
	$space.=" &nbsp ";

if(isset($_GET['action']))
{
	$action="mail.php?tbname=$tbname";
	echo  "<h2> $space Preview</h2>";
}
else
{
	$action="succ_sub.php?tbname=$tbname";
	$_SESSION['tbname']=$tbname;
	echo "<h2> $space Submit a response</h2>";
}

$method='get';
//function genr_html($tbname,$action,$method)
//{
	$html="";
	$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$fields="select * from $tbcreator where tbname=$tbname order by qno";
	
	
	echo "<div class='post-bottom-section'>
		<div class='primary'>";
	$html.="<form action=$action method=$method/>";
	//$html.="Name : <br>";
	//$html.="<input type='text' name='name' /><br><br>";
	$q=$conn->query($fields);
	while($r=$q->fetch())
	{
		//echo "hi";
		if($r["type"]=="text" || $r["type"]=="paragraph")
			$html.=create_txt($r["qno"],$r["question"],$r["help"],$r["type"]);
		else if($r["type"]=="dropdown")
			$html.=dropdown($r["qno"],$r["question"],$r["help"]);
		else if($r["type"]=="checkbox")
			$html.=checkbox($r["qno"],$r["question"],$r["help"]);
		else if($r["type"]=="radio")
			$html.=radio($r["qno"],$r["question"],$r["help"]);
		else if($r["type"]=="number")
			$html.=number($r["qno"],$r["question"],$r["help"]);
	}
	
	$html.="<br><input class='button' type='submit' value='Submit' />";
	$html.="</form>";
	echo $html;
	if(isset($_GET['action']))
	{
		echo "<a class='more' href='mail.php?tbname=$tbname'>Send The Form</a>";
	}
	//$_SESSION['tbname']=0;
	//return $html;
//}
function create_txt($qno,$question,$help,$type)
{
	include ("variables.php");
	session_start();
	$tbname=$_SESSION['tbname'];
	$conn2 = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$html1="";
	$html1.="<strong>$qno. <br> $question <br></strong>";
	$html1.="<input type='text' name='answer$qno'/><br>Help : $help<br><br>";	
	return $html1;
}

function radio($qno,$question,$help)
{
	include ("variables.php");
        session_start();
        $tbname=$_SESSION['tbname'];
	$conn1 = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$sql="select * from options where tbname=$tbname";
	$html1="";
	$html1.="<strong>$qno. <br> $question <br></strong>";
	$q1=$conn1->query($sql);
	while($r1=$q1->fetch())
	{
		if($r1['qno']==$qno)
		{
			$value=$r1['choice'];
			$html1.="<input type='radio' name='answer$qno' value='$value' > $value &nbsp &nbsp";
		}
	}
	$html1.="<br>Help : $help <br><br>";
	
	return $html1;
}


function checkbox($qno,$question,$help)
{
	include ("variables.php");
        session_start();
        $tbname=$_SESSION['tbname'];
        $conn3 = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$sql2="select * from options where tbname=$tbname";    
        $html1="";
	$html1.="<strong>$qno. <br> $question <br></strong>";
        $q3=$conn3->query($sql2);
	while($r2=$q3->fetch())
        {
		if($r2['qno']==$qno)
		{
	$jugaad3='answer'. $qno .'[]';
		$value=$r2['choice'];	
                $html1.="<input type='hidden' name='type[]' value='answer$qno' />";
		$html1.="<input type='checkbox' name='$jugaad3' value='$value' />$value";	
        	}
	}
        $html1.="<br>Help : $help <br><br>";
        return $html1;
}	

function number($qno,$question,$help)
{
	include ("variables.php");
        session_start();
        $tbname=$_SESSION['tbname'];
        $conn4 = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
        $html1="";
        $html1.="<strong>$qno. <br> $question <br></strong>";
        $html1.="<input type='number' name='answer$qno' /><br>Help : $help<br><br>";
        
        return $html1;
}

function dropdown($qno,$question,$help)
{
	include ("variables.php");
        session_start();
        $tbname=$_SESSION['tbname'];
        $conn5 = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
        $html1="";
        $html1.="<strong>$qno. <br> $question <br></strong>";
	$html1.="<select name='answer$qno'>";
	$sql3="select * from options where tbname=$tbname";
	$q4=$conn5->query($sql3);
	while($r3=$q4->fetch())
	{
		if($r3['qno']==$qno)
		{
		$value=$r3['choice'];
		$html1.="<option value='$value' > $value </option>";
		}
	}
	$html1.="</select>";
	$html1.="<br>Help : $help<br><br>";
	return $html1;
}
/*
if(isset($_GET['action'))
{
	echo "<a href='mail.php'>Send The Form</a>";
}
*/
?>
