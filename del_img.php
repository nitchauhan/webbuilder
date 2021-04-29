<?php

if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploadimg/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }


      $destid = $_POST['destid'];
		echo $destid;
		$filename = $_POST['filename'];
		$old_src_data = $_POST['imgdataname'];
		
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
				echo $line;
				echo $old_src_data;
				$line = str_replace($old_src_data, "uploadimg/".$file_name, $line);
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
	
	if(isset($_POST['submit']))
	{
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
				continue;
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
		
		header("location: dashboard.html");
	}

?>