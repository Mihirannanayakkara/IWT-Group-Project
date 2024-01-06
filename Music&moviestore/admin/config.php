<?php
$servername="localhost";
$username="root";
$password="";
$dbname="666station";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
?>