<?php

include("include/Database.php");
$db = new Database();

$id = $_GET['jobid'];
							
$deleteEvent =  "DELETE  FROM `applyjob` WHERE `id`=$id";

$rowCount = mysqli_query($db->db_connect(),$deleteEvent);


if($rowCount > 0)
{
	header("Location: viewjobapply.php");
}
else
{
	echo "Error Occured";
}

?>
