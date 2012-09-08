<?php include ("variables.php"); ?>
hihi
<?php $temp = "temp1"; ?>
<?php

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

$sql = "select * from $tbcreator order by qno";
$q = $conn->query($sql);

while($r = $q->fetch())
{
echo "<hr>qno=" .$r['qno'] ."<br>question=" .$r['question']  ."<br>help=" .$r['help']  ."<br>questiontype=" .$r['type']  ."<br>required=" .$r['required'] ."<br><br>";
}
?>

