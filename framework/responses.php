<head>
<title>
	Form Weaver
</title>

<link rel="stylesheet"   href="coolblue.css" />
</head>

<?php
include("variables.php");
include("header.php");
session_start();
echo "<div id='content-wrap'>
	<div id='content'>";
$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$name=$_GET['name'];
//$sql="select * from `$tbname`";
//$q=$conn->query($sql);
$id=$_SESSION['id'];
$sql2="select * from $tbcreator where name='$name' and username='$id' order by qno";
$q2=$conn->query($sql2);
if(!$q2)
	echo "Either the Form you requested does not exist<br>or you do not have neccesary permissions to view it";
else
{
echo "<h3>Viewing responses for Form : $name</h3>";
?>

<table>
	<tr>
<th>UserID</th>
<?
while($r1=$q2->fetch())
{
	$question=$r1['question'];
	$html.="<th>$question</th>";
	$tbname = $r1['tbname'];
}
$html.="</tr>";
$sql="select * from `$tbname`";
$q=$conn->query($sql);
while($r=$q->fetch())
{
	$html.= "<tr>";
$jugaad4=0;
	foreach ($r as $field)
{
if($jugaad4==0)
{
	$html.= "<td>$field </td>";
$jugaad4=1;
}
else $jugaad4=0;
}
	$html.= "</tr>";

//Print_r($r);
}

$html.= "</table>";
echo $html;
}
echo "</div></div><br><br><br><br><br><br>";
include("footer.php");
?>
