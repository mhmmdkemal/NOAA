<?php

include("db.php");

try{
	
	$name = $_REQUEST['txtName'];
	$latitude = $_REQUEST['lat'];
	$longitude = $_REQUEST['lng'];
	$location = $_REQUEST['address'];
	$description = $_REQUEST['txtDesc'];
	$conf = $_REQUEST['txtconf'];
	$issue = $_REQUEST['txtissue'];
	$table = "oil";
			    $upload_dir= "uploads/";
				echo $_FILES["imgFile"]["type"];
				echo $_FILES["imgFile"]["size"];			
				//nested if to check a file is uploaded
				if (($_FILES["imgFile"]["type"] == "image/gif")||($_FILES["imgFile"]["type"] == "image/jpeg")
				||($_FILES["imgFile"]["type"] == "image/jpg")||($_FILES["imgFile"]["type"] == "image/pjpeg")
				||($_FILES["imgFile"]["type"] == "image/x-png")||($_FILES["imgFile"]["type"] == "image/png")
				&& ($_FILES["imgFile"]["size"] < 1000000)){//file size unit byte
							
								
					if ($_FILES["imgFile"]["error"] > 0){
						print('<p>File Upload Error:" . $_FILES["imgFile"]["error"] . </p>');			
					}else{
							$filename = $_FILES["imgFile"]["name"];
							$tempname = $_FILES["imgFile"]["tmp_name"];
						if (file_exists($upload_dir . $filename)){
							print ("<p>Error file name ". $filename ." already exists!</p>");			
							}else{
								if(move_uploaded_file($tempname, $upload_dir . $filename) == True){
								$imgURL = $upload_dir ."/". $filename;
								print ("<p>Uploaded successfully.</p>");										
								}else {
									print ("<p>Could not upload file.</p>");
								}			
						}	
					}//else
				}	
	$sql = "insert $table (name,
	latitude, longitude, location, description, conf, issue, imgFile)
	values ('$name',
	'$latitude', '$longitude', '$location', '$description',
	'$conf', '$issue', '$imgURL')";
	
	
	$result = mysqli_query($db_conn, $sql);
	
	if ($result == 1){
		echo "Record successfully inserted";
	} else{
		echo "Failed to insert a record";
	}
}catch(Exception $e){
	echo $e.getMessage();
} 
?>