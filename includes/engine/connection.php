<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "s_topsis2";

$conn = mysql_connect($dbHost,$dbUser,$dbPass)or die("<h1 style=\"text-align:center;font-family:arial\">ERROR [".mysql_errno()."] : ".mysql_error()."</h1>");
$db = mysql_select_db($dbName,$conn)or die("<h1 style=\"text-align:center;font-family:arial\">ERROR [".mysql_errno()."] : ".mysql_error()."</h1>");


