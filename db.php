<?php

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "chat";

$connect =  new mysqli ($host,$user,$pass,$db_name);

function formatDate($date) 
{
	return date('n/j/y, g:i a', strtotime($date));
}
?>