<?php

if(isset($_REQUEST['sbmt']))
{
    
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $id = $_REQUEST['id'];
    
    
    if($name=="" || $description=="")
    {
        echo "Data Not Entered";
    }else
    {
                
        include("include/Database.php");
        $db = new Database();
        
        
        $insertCompanyQuery = "UPDATE `company` SET `name`='$name',`description`='$description' WHERE `id`=$id";
        
        $rowCount = mysqli_query($db->db_connect(),$insertCompanyQuery);
        
        if($rowCount > 0)
        {
            header("Location: viewcompany.php");
        }else
        {
            echo "Error Occured";
        }
        
    }
    
}
else
{
    header("Location: addcompany.php");
}


?>