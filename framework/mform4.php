<? include("variables.php"); ?>
<? session_start(); 
Print_r ($_SESSION); ?>

<h1> review  </h1>


<?
$tbname = $_SESSION['tbname'];

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
if(isset($_POST["qno"]))
{
echo "hi update";
$sql = "UPDATE $tbcreator SET question=? WHERE qno=? AND tbname=$tbname";
$q = $conn->prepare($sql);
$q->execute(array($_POST["newquestion"],$_POST["qno"]));
}
?>

<form action="mform4.php" method="post">
qno: <input type="number" name="qno" />
new question <input type="text" name="newquestion" />
<input type="submit" />
</form>

<?php

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
echo "hi show";
$sql = "select * from $tbcreator where tbname=$tbname order by qno";
$q = $conn->query($sql);

while($r = $q->fetch())
{
echo "<hr>qno=" .$r['qno'] ."<br>question=" .$r['question']  ."<br>help=" .$r['help']  ."<br>questiontype=" .$r['type']  ."<br>required=" .$r['required'] ."<br><br>";

}
?>

<a href="mform5.php"> finish </a>













