<?php




try
{	
	
	/*
	@@This function will take a term from getTerms.php
	@@ then conntct to the urbanStorage Database. Then
	@@store the terms.
	*/
	function storeTerm($term,$def)
	{
		include "databaseConnect.php";
		$date=date("m-d-y");
		$database=$db;
		//echo $term;
		//echo "\r\n";	
		$store="INSERT INTO stores (term,def,lastUpdated) VALUES ('$term','$def','$date');";
		mysqli_query($database,$store);
		


	}
}
catch(Exception $e)
{
	echo 'message '. $e->getMessage();
}
?>
