<?php
 if(isset($_POST['submit']))
 {
	$olddata = $_POST['olddata'];
	$destid = $_POST['destid'];
	$oldfontname = $_POST['oldfontname'];
	$oldcolor = $_POST['oldfontcolor'];
	$newfontcolor = $_POST['newfontcolor'];
	$newfontname = $_POST['newfontname'];
	$newdata = $_POST['newdata'];
	$filename = $_POST['filename'];

	// $myfile = fopen("m/index.html", "r");
	$myfile = fopen($filename, "r");
	
	$matched_flag = 0;
	$file_text1 = " ";
	$changed_flag = 0;
	while(! feof($myfile))
	{
		$line = fgets($myfile);
		
		if ($matched_flag == 1)
		{
			$changed_flag = 1;
			$matched_flag = 0;
			$line = str_replace($olddata,$newdata,$line);
			$file_text1 = $file_text1 . $line;
			continue;
			
		}
		
		
		if (strpos($line, $destid) !== false && $changed_flag == 0)
		{
			// echo "matched";
			$matched_flag = 1;
			if (strpos($line,"style") !==true)
			{
				echo " in style ";
				$line = str_replace(">"," style = \" \" > ",$line);
				
			}
			
			// if (strpos($line,"font-family") !==true)
			// {
				// echo " in ff if ";
				// $line = str_replace(" style = \" "," style = \" font-family : '" .$newfontname ."'; ",$line);
				
			// }
			// else
			// {
				// echo " in ff else ";
				// $line = str_replace(" font-family : '" .$oldfontname ."'; "," font-family : '" .$newfontname ."'; ",$line);
			// }
			
			$line = substr($line,0,strpos($line,"style"));
			$line = $line .  "style = \" font-family : " .$newfontname ."; color : ". $newfontcolor ." !important; \" >" . "\n";
			
			
			
			
			$file_text1 = $file_text1 . $line;
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
}
else if(isset($_POST['submit_del']))
{
	echo "hahaa";
	$destid = $_POST['destid'];
	$tagname = $_POST['endtag'];
	$tag = "</".strtolower($tagname).">";
	// echo $destid;
	// echo htmlspecialchars($tag);
	
	$lineno =0;
	$filename = $_POST['filename'];

	// $myfile = fopen("m/index.html", "r");
	$myfile = fopen($filename, "r");
	
	$matched_flag = 0;
	$file_text1 = " ";
	$changed_flag = 0;
	$count = 0;
	while(!feof($myfile))
	{
		$line = fgets($myfile);	
		$lineno ++;
		// echo "\n" . $lineno;
		if($matched_flag == 1)
		{
			// echo htmlspecialchars($line);
			// echo "\n in 104";
			if(strpos($line,$tag) !== false)
			{
				// echo "\n in 107";
				// echo htmlspecialchars($line);
				$matched_flag = 0;
				continue;
			}
			continue;
		}
		else
		{

			if (strpos($line, $destid) !== false )//&& $changed_flag == 0)
			{
				// echo "matched";
				
				$matched_flag = 1;
				
				continue;
				
			}
			else
			{
				$file_text1 = $file_text1 . $line;
				// echo " - added \n";
			}
		}
	}
	
	// echo $file_text1;
	
	fclose($myfile);
	$myfile1 = fopen($filename, "w");
	fwrite($myfile1,$file_text1);
	fclose($myfile1);
	
	header("location: dashboard.php");

}
?>