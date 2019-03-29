<?php

if(isset($_REQUEST['sbmt']))
{
    
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    
    
    if($name=="" || $description=="")
    {
        echo "Data Not Entered";
    }else
    {
                
        include("include/Database.php");
        $db = new Database();
        
        
        $insertCompanyQuery = "INSERT INTO `company`( `name`, `description`) VALUES ('$name','$description')";
        
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