<?php


$host="localhost";
$user="root";
$password="derek2016";
$dbname="mydatabase";


$con=new mysqli($host,$user,$password,$dbname);

if(!$con) {
        die("Connection failed : ". mysqli_connect_error());
}

?>