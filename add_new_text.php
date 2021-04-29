<?php
	
	$destid = $_POST['destid'];
	echo $destid;
	$filename = $_POST['filename'];
	

	$myfile = fopen($filename, "r");
	
	$matched_flag = 0;
	$file_text1 = " ";
	$changed_flag = 0;
	$count = 0;
	while(! feof($myfile))
	{
		$line = fgets($myfile);	
		
		if (strpos($line, $destid) !== false )//&& $changed_flag == 0)
		{
			echo "matched";
			
			$matched_flag = 1;
			
			
			$id = "ewtext_hx" . time();
			
			$file_text1 = $file_text1 . $line . "\n" . "<p class=\"home-slide-content ewtext_h\" id=\"$id\" onclick=\"abcdef(this)\">" ."\n" . "Enter your text" . "\n" . "</p>" . "\n";
		}
		else
		{
			$file_text1 = $file_text1 . $line;
		}
	}
	
	// echo $file_text1;
	
	fclose($myfile);
	$myfile1 = fopen($filename, "w");
	fwrite($myfile1,$file_text1);
	fclose($myfile1);
	
	header("location: dashboard.php");

?>