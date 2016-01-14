<?php

try
{
include "databaseConnect.php";
include "getTerms.php";

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

/*
@@This Part of the code will check to see how many entries 
@@are in a table. As long as it is less than 10,000 it will
@@keep populating the table.
*/
$numrows = mysqli_num_rows(mysqli_query($database,'select * from stores'));

//for($i=0;$i<100;$i++)
//{
	$randomInt=rand(1, 500 );
	addTerms($randomInt);
	$numrows = mysqli_num_rows(mysqli_query($database,'select * from stores'));	
//}
}
catch(exceptionError $e)
{
	echo $e->getMessage();
}

?>
