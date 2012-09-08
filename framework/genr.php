
<? include ("variables.php"); 
echo "hi";
 session_start();
Print_r ($_SESSION); ?>
<?php
$_SESSION['ql']="";
$_SESSION['arr']="";
$tbname = $_SESSION['tbname'];
$action='a.php';
$method='post';
$_SESSION['ql'].="INSERT into $tbname VALUES(";
//function genr_html($tbname,$action,$method)
//{
	$html="";
	$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$fields="select * from $tbcreator where tbname=$tbname order by qno";
	$html.="<form action=$action method=$method/>";
	$html.="Name : <br>";
	$html.="<input type='text' name='$name' /><br><br>";
	
	$q=$conn->query($fields);
	while($r=$q->fetch())
	{
		echo "hi";
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
	$html.="</form>";
	$html.="<br><input type='submit' value='Submit' />";
	echo $html;
	//return $html;
//}
function create_txt($qno,$question,$help,$type)
{
	include ("variables.php");
	session_start();
	$tbname=$_SESSION['tbname'];
	$conn2 = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$html1="";
	$html1.="$qno. <br> $question <br>";
	$html1.="<input type='text' name='$qno' /><br> $help<br><br>";	
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
	$html1.="$qno. <br> $question <br>";
	$q1=$conn1->query($sql);
	while($r1=$q1->fetch())
	{
		if($r1['qno']==$qno)
		{
			$value=$r1['choice'];
			$html1.="<input type='radio' name='$qno' value='$value' /> $value";
		}
	}
	$html1.="<br> $help <br><br>";
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
	$html1.="$qno. <br> $question <br>";
        $q3=$conn3->query($sql2);
	while($r2=$q3->fetch())
        {
		if($r2['qno']==$qno)
		{
		$value=$r2['choice'];	
                $html1.="<input type='checkbox' name='$qno'.'$value' value='$value' />$value";
        	}
	}
        $html1.="<br> $help <br><br>";
        return $html1;
}	

function number($qno,$question,$help)
{
	include ("variables.php");
        session_start();
        $tbname=$_SESSION['tbname'];
        $conn4 = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
        $html1="";
        $html1.="$qno. <br> $question <br>";
        $html1.="<input type='number' name='$qno' /><br> $help<br><br>";
        
        return $html1;
}

function dropdown($qno,$question,$help)
{
	include ("variables.php");
        session_start();
        $tbname=$_SESSION['tbname'];
        $conn5 = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
        $html1="";
        $html1.="$qno. <br> $question <br>";
	$html1.="<select name='$qno'>";
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
	$html1.="<br>$help<br><br>";
	return $html1;
}

?>
