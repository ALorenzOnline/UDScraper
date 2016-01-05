<?php
try{
	
	
	function getDef($term)
	{
        	//include 'storeTerms.php';
		$url="http://www.urbandictionary.com/define.php?term=$term";
		$output=file_get_contents($url);
		$file="tempDef.txt";
		file_put_contents($file,$output,FILE_APPEND);

		$contents= file_get_contents($file);

		//Gets and entire string  by searching for 
		//the quote below and sorting them into an array
		$pattern=preg_quote('/<div class="meaning">(.*?)<\/div>/s',"/");
		$pattern = "/^.*$pattern.*\$/m";
		preg_match("/<div class='meaning'.*?>([^`]*?)<\/div>/",$contents,$matches);
		//var_dump($matches);
		
		$string="";
		foreach($matches as $def)
		{
			$string=$def;
			
					
		}
		
		
		$string=preg_replace('(\&quot;)','"',$string);
		$string=preg_replace('(\&#39;)',"'",$string);
		file_put_contents($file,"");		
		return $string;
		
	
	}
	//getDef("wook");
	
}catch(ErrorException $e){
	echo $e->getMessage();
}
?>

