<? include("variables.php"); ?>

 its rachit
<?
$link = mysql_connect('localhost:3306', 'aca', 'webapp');
if(!$link){

echo 'nothing';
}
echo 'connected successfully';
?>

<?php
mysql_select_db("aca", $link);
$tname = "temp2";
$create_table = "create table " .$tname ."( id int, name varchar(30) )";


if(mysql_query($create_table, $link))
{
echo 'created'; }
mysql_close($link);
?>

<?php
$array = array("foo", "bar", "hallo", "world");
var_dump($array);
?>


