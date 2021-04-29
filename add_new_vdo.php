<?php
	
	$destid = $_POST['destid'];
	echo $destid;
	$filename = $_POST['filename'];
	
	echo $filename;

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
			
			$file_text1 = $file_text1 . $line . "\n" . "<video width=\"400\" controls  id=\"$id\" onclick=\"img_popup(this)\">" . "<source src=\"../vdo/mov_bbb.mp4\" type =\"video/mp4\" >" ."</video>". "\n";
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