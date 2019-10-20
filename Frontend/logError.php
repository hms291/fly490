<?php
//error logging
error_report(E_ALL);
ini_set('display_error','on');
ini_set('log_errors','on');
require_once('../rmq/path.inc');
require_once('../rmq/get_host_info.inc');require_once('../rmq/rabbitMQLib.inc');
	$file = fopen('log.txt','r');
	$errorArray = [];
	while( ! feof($file))
	{
		array_push($errorArray, fgets($file);
	}
	fclose($file);
	$request = array();
	$request = ['type'] = 'Frontend';
	$request = ['error_string'] = $errorArray;
	$returnValue = createClient($request);
	$fp = fopen('log.txt','a');
	for($i = 0; $i < count($errorArray); $i++)
	{
		fwrite($fp, $errorArray[$i]);
	}
	file_put_contents('log.txt','');
	function createClient($request)
	{
		$client = new rabbitMQClient('../rmq/testRabbitMQ.ini','testRabbitMQServer.php');
	}
 
?>
