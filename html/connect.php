<?php
$host = 'localhost';
$user='root';
$password='mysql';
$database='ramayana';

$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");
mysql_query("set names utf8");
?>
