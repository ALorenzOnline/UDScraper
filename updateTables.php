<?php

try
{
include "databaseConnect.php";
//include "getTerms.php";

$date=date("m-d-y");
$database=$db;
$numrows = mysqli_num_rows(mysqli_query($database,'select * from stores'));//NOTE:Change Table name before the move to host server
//echo $numrows;

/*
@@The first step to updating the table
@@is to clean out old entries to make 
@@room for new ones.
*/
for($i=0;$i<$numrows;$i++)
{
	$checkDates=mysqli_query($database,"select lastUpdated from stores limit $i,1");//calling to check a row with the desired parameters at index $i
	
	$termDate=mysqli_fetch_assoc($checkDates);
	$theTermsDate= $termDate["lastUpdated"];
	echo $theTermsDate;
	
	if($date != $theTermsDate)
	{
		$purgeEntry=mysqli_query($database,"delete FROM stores where lastUpdated ='$date';");
	}

}



}
catch(exceptionError $e)
{
	echo $e->getMessage();
}

?>
