<?php
// this is a associative array which used to convert varibels into constant one by one 
$db['hostname']="localhost";
$db['username']="root";
$db['password']="";
$db["dbname"]= "cms";
foreach($db as $key => $value){
    define($key, $value);
}
$conn=mysqli_connect(hostname,username,password,dbname); //it is main connection lne foor database
if(!$conn){
    die(mysqli_connect_error($conn));
}
?>