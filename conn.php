<?php 
$server = "localhost";
$user = "root";
$password ="";
$dbname ="testdb";
$conn = mysqli_connect($server,$user,$password,$dbname);
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo" succesfuly connected";
}
?>