<?php
$host="localhost";
$user="root";
$pass="";
$dbname="auto";

$conn=new mysqli($host,$user,$pass,$dbname);

if($conn->connect_error)
{
    die("connection failed: ".$conn->connection_error);

}
?>