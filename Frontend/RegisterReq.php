#!/usr/bin/php
<?php
require('rmq/testRabbitMQClient.php');


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$response = register($username,$email,$password);



if($response != false)
{
        echo"User Succefully created !".PHP_EOL;
        header('location:index.html');
}


?>
