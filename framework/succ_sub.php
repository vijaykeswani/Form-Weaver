
<?php include("variables.php"); ?>
<?php session_start();
//Print_r ($_SESSION);
 ?>
<head>
<link rel="stylesheet"   href="coolblue.css" />
</head>



<?php include("header.php"); ?>

<br><br>


<br><?php
$tbname = $_SESSION['tbname'];
$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql = "INSERT into `$tbname` VALUES(:userid";
//$userid="$_GET['name']";
//$arr = "':userid'=>'$userid'";
$arr[":userid"]="vijay";
$sql2="describe `$tbname`";
$q=$conn->query($sql2);
$j=0;
while($r=$q->fetch())
{
	if($j==0)	
	{
		$j=1;	
		continue;
	}
	$field=$r['Field'];
	$sql.=", :$field";
	//$arr.=",':$field'=>$_GET[$field]";

}
$sql.=")";
//echo $sql;
//echo "<br>";
$j=0;
$sql3="describe `$tbname`";
$q2=$conn->query($sql3);
while($r1=$q2->fetch())
{
        
	if($j==0)       
        {       
                $j=1;   
                continue;
        }
        
	$field=$r1['Field'];
        if(in_array($field,$_GET['type']))
	{
		$answer=implode('~',$_GET[$field]);
		$arr[":$field"]="$answer";
	}
	//$answer=implode('~',$_GET[$field]);
        //$arr[":$field"]="$answer";
	else
		$arr[":$field"]="$_GET[$field]";
	//echo $arr;
}

$q1=$conn->prepare($sql);

//$arr[':userid']='abc';
//$arr[':answer1']='a1';
$q1->execute($arr);
for($i=0;$i<40;$i++)
	$space.='&nbsp ';
	
echo "<pre><code>
	<p><h4> $space Thank You<br> $space Your response has been recorded</h4></p>
	</pre>
	</code>";

for($i=0;$i<12;$i++)
	$line.="<br>";
echo $line;

/*
$sql = "INSERT into options VALUES(:tbname,:qno,:choice)";
$q = $conn->prepare($sql);
$q->execute(array(':tbname'=>$_SESSION["tbname"],
                        ':qno'=>$_SESSION["qno"],
                        ':choice'=>$_GET["choice"]));
*/
include("footer.php");
?>
