<?php
//session_start();

	require('rmq/testRabbitMQClient.php');     //will have register client function
	$logs = array();     //will hold values for logging
	
	$username       = $_POST['usernamesignup'];
	$email          = $_POST['emailsignup'];
	$password       = $_POST['passwordsignup_confirm'];
	
	
	if ( $password1 != $password)
        {
           array_push($logs,$username,$password);
           require("registeredN.inc.php");
           //echo"Sorry passwords didn't match";
                exit();
        }
else
        {
            $response = register($username,$email,$password);
                if ($response != false)
                {
                  header('location:index.html?register=success');
                }
                else
                {
                  header('location:index.html?register=nosuccess');
                }
        }
	
	if($response != false)
        { #account was registered successfully
                array_push($logs,$username,$email,$password);
                require("registeredY.inc.php");
                echo"Created User successfully!!";
        }
        else
        { //account Already exist
                array_push($logs,$username);
                require("registeredN.inc.php");
                echo"Sorry username already exists";
        }

?>
