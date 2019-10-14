#!/usr/bin/php
<?php
require('rmq/testRabbitMQClient.php');

//$client = new rabbitMQClient("testRabbitMQ.ini","testServer");

$username = $_POST['username'];
$password = $_POST['password'];

$response = login($username,$password);


//$request = array();
//$request['type'] = "login";
//$request['username'] = $username;
//$request['password'] = $password;

//$response = $client->send_request($request);


if($response != false)
{
        echo"username and password match".PHP_EOL;
        header('location:home.html');
}


?>
