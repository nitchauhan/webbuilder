<?php
include("php/connect.php");
if(isset($_POST['select']))
{
	session_start();
	$id = $_POST['id'];
	// echo "<script>alert(".$id.");</script>";
	$destfolder = $_SESSION["userid"];
    echo "00000000000";
    echo $destfolder;
    echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

	if ($id == 1)
	{
		recurse_copy("m",$destfolder);
	}

	// $temp_name = $_POST['temp_name'];                        
	$sql = "INSERT INTO `websitemaster`(`User_ID`, `Site_path`,`Isactive`,`templateid`) VALUES ('$destfolder','$destfolder',true,'$id')";
	$update = mysqli_query($db,$sql);
    if (!$update)
    {
            echo("ERRROIR++++>>" . mysqli_error($db));
    } 
    else
    {
        $_SESSION['sitepathname'] = $destfolder."\\"."index.html";
        header('location:dashboard.php')  ;
    }

	

}
function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
}



?>