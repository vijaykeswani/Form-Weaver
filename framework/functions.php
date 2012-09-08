<?php
include ("variables.php");
session_start();
?>
<?php
function insertdata($use,$qno)
{
//echo "inserting";
//echo $use;
include ("variables.php");
session_start();
//Print_r($_SESSION);

$uniquef =$_SESSION["tbname"] ."u" . $qno;

$tbname= $_SESSION['tbname'];
$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
if($use=="add")
 $sql = "INSERT into $tbcreator VALUES(:tbname,:qno,:question,:help,:type,:required,:uniquef,:username,:name)";
else if($use=="edit") {
$sql = "DELETE FROM $tbcreator WHERE uniquef=:uniquef";
} 
$q = $conn->prepare($sql);
$jugaad2=0;
if($use=="add")
{$q->execute(array(':tbname'=>$tbname,
                        ':qno'=>$qno,
                        ':question'=>$_GET["question"],
                        ':help'=>$_GET["help"],
                        ':type'=>$_GET["type"],
                        ':required'=>$_GET["required"],
			':uniquef'=>$uniquef,
			':username'=>$_SESSION["id"],
			':name'=>$_SESSION["name"]));}
		
else if($use=="edit")
{$q->execute(array(':uniquef'=>$uniquef));
$sql2 = "DELETE FROM options WHERE tbname=:tbname && qno=:qno";
$q2=$conn->prepare($sql2);
$q2->execute(array(':tbname'=>$tbname,
                ':qno'=>$qno));


insertdata("add",$qno);
$jugaad2=1;
/*$sql2 = "DELETE from options where tbname=':tbname' && qno=':qno'";
$q2=$conn->prepare($sql2);
$q->execute(array(':tbname'=>$tbname,
		':qno'=>$qno));
*/
}


$_SESSION["jugaad"]=0;
if((($_GET["type"]=="checkbox") || ($_GET["type"]=="radio") || ($_GET["type"]=="multiple") || ($_GET["type"]=="dropdown")) && $jugaad2==0)
{
$_SESSION["jugaad"]=1;
//include ("insertoptions.php");
insertoptions($qno);
}   

}

?>  


<?php

function insertoptions($qno)
{
include("variables.php");
session_start();

//echo "included";
//echo "----------------qno=$qno-------------";
if(isset($_GET['choice']))
{
//echo $_SESSION['tbname'];
//echo  $_SESSION['qno'];
//echo $_GET['choice'];


$conn = new PDO ("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$sql = "INSERT into options VALUES(:tbname,:qno,:choice)";
$q = $conn->prepare($sql);
$q->execute(array(':tbname'=>$_SESSION["tbname"],
                        ':qno'=>$qno,
                        ':choice'=>$_GET["choice"]));


//if($q) echo "added";
}
echo "<div class='post-bottom-section'>
	<div class='primary'>";
//include("showallq.php");
display($qno);
echo "<form action='mform1.php' method='get'>
<input type='hidden' name='option' value='1' />
<input type='hidden' name='optionq' value='$qno' />
Option : <input type='text' name='choice' /> <br><br>
<input class='button' type='submit'/>
</form>
";

if(isset($_GET["edit"])) echo "<a class='more' href='mform1.php?edit=1'> finish adding options </a>";
else echo "<a class='more' href='mform1.php'><h5> add new ques </h5></a>";
}
echo "</div>
	</div>";
?>

<?php
function display($qno)
{
include("variables.php");
session_start();
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$tbname=$_SESSION["tbname"];
$sql = "select * from $tbcreator where tbname = $tbname order by qno";
$q = $conn->query($sql);

while($r = $q->fetch())
{
if($r['qno']==$qno)
{
echo "<hr>Question Number=" .$r['qno'] ."<br>Question=" .$r['question']  ."<br>Help=" .$r['help']  ."<br>Answer Type=" .$r['type']  ."<br>Required=" .$r['required'] ;
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

echo "<br><br>";
}

}

}
?>












