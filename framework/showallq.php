<?php include("variables.php");
session_start(); ?>

<?php
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$tbname=$_SESSION["tbname"];
$sql = "select * from formcreator where tbname = $tbname order by qno";
$q = $conn->query($sql);
echo "<br><br><div class='post-bottom-section'>
	<div class='primary'>
      	<ul class='archive'>";
       

while($r = $q->fetch())
{
	echo "<li>";
	echo "<div class='post-title'> Question Number=" .$r['qno']."</div>";
	echo "<div class='post-details'> Question=" .$r['question']  ."<br>Help=" .$r['help']  ."<br>Answer Type=" .$r['type']  ."<br>Required=" .$r['required']."</div>" ;
	$conn2 = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$sql2 = "select * from options where tbname = $tbname";
	$q2 = $conn2->query($sql2);
	$i = 1;
	while($r2 = $q2->fetch())
	{
		if($r['qno']==$r2['qno'])
		{
			echo "<br>Option " . $i ." = " .$r2['choice'];
			$i=$i+1;
		}
	}

	echo "</li>";

}
echo "</ul> </div></div>";
?>

