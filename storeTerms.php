<?php

//include "databaseConnect.php";


try
{	

	/*
	@@This function will take a term from getTerms.php
	@@ then conntct to the urbanStorage Database. Then
	@@store the terms.
	*/
	function storeTerm($term)
	{
		$database=mysqli_connect("localhost","root","password","urbanStorage") or die("could not connect");
		//echo $term;
		//echo "\r\n";	
		$storeTerm="INSERT INTO stores (term,def,lastUpdated) VALUES ('$term','definition','today');";
		mysqli_query($database,$storeTerm);
		


	}
}
catch(Exception $e)
{
	echo 'message '. $e->getMessage();
}
?>
