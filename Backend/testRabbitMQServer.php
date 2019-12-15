#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogin($username,$password)
{
    //Connect to Mysql
    // "localhost","mysql_user","mysql_password","database_name"
	$db = mysqli_connect("localhost","fly490base","basepassword","skyscanner");
	$Query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

	$run = mysqli_query($db,$Query);
		echo "Checking database for username and password".PHP_EOL;
	
	// Return value of the query is $row
	$row = mysqli_fetch_array($run) ;

		if ($row['username'] == $username)
		{
			echo "$username is in the database \n".PHP_EOL;
		
			if ($row['password'] == $password)
			{
			  echo "Password matches\n".PHP_EOL;
			  return 1;
			}	
			else
			{
				echo "Password did NOT match\n".PHP_EOL;
				return 0;
			}
		}
		else 
		{
			echo "User $username Does not exist\n".PHP_EOL;
			return 0;
		}
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);

  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);
    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

