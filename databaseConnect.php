<?php

//function coonnect()
//{
	$db=mysqli_connect("localhost","root","password","urbanStorage");
	
	
	if(mysqli_connect_errno())
	{
		echo"Failed to connect to mysql";	
	}	
	if(mysqli_ping($db))
	{
		echo "Connected to urbanStorage";
		echo "";
	}
	else
	{
		echo "error no database found";
	}
//}

?>
