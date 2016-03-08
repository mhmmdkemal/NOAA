<?php
include("db.php");

try{
	$table = "oil";
	$sql = "select * from $table order by id desc limit 50";
	$result = mysqli_query($db_conn, $sql);
	
	while ($row = mysqli_fetch_array($result)) {
		echo "<li>" . $row["name"] . "<br/> Latitude : " . $row["latitude"] . "<br/> Longitude : " .
		$row["longitude"] . "<br/> Address : " . $row["location"] . "<br/> Description : " . $row["description"] . 
		"<br/> conf : " . $row["conf"] . "<br/> issue : " . $row["issue"]. "<br/> imgFile : " . $row["imgFile"] . "</li>";
	}
}catch(Exception $e){
	echo $e.getMessage();
}
?>