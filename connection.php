<?php
$user = "LetsReadTogether";
$password_key = "8y49Fwrf6JDy9KYG";
$database = "_letsreadtogther";
$host = "localhost";

$connect = mysqli_connect($host, $user, $password_key, $database);

if(!$connect)
{
    echo "Cannot Connect to the Database Server.".  mysqli_error($connect);
}
?>
