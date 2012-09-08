<?php
include ("variables.php");
session_start();

if(isset($_SESSION["id"]))
{
if(session_destroy())
header( 'Location: full3.php') ;
else echo "failed please try again";
}
?>
