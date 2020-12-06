<?php

$hostname = "localhost"; // the hostname you created when creating the database
$username = "group6";      // the username specified when setting up the database
$password = "WE8aacMb1Tjp";      // the password specified when setting up the database
$database = "group6"; // the database name chosen when setting up the database 
$error="";

$link = mysqli_connect($hostname, $username, $password, $database);
if (!$link) {
   print "Error - Cannot connect to MYSQL";
   exit;
}