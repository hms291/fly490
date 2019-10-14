#!/usr/bin/php
<?php
require('rmq/testRabbitMQClient.php');


$username = $_POST['username'];
$password = $_POST['password'];

$response = login($username,$password);



if($response != false)
{
        echo"username and password match".PHP_EOL;
        header('location:home.html');
}


?>
