<?php

include("include/Database.php");
$db = new Database();

$id = $_GET['id'];
							
$deleteEvent =  "DELETE  FROM `selectedstudent` WHERE `id`=$id";

$rowCount = mysqli_query($db->db_connect(),$deleteEvent);


if($rowCount > 0)
{
	header("Location: viewselected.php");
}
else
{
	echo "Error Occured";
}

?>
