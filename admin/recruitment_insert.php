<?php

if(isset($_REQUEST['sbmt']))
{
    
    $company = $_REQUEST['company'];
    $jobTitle = $_REQUEST['jobTitle'];
    $jobExperience = $_REQUEST['jobExperience'];
    $description = $_REQUEST['description'];
    $maxCgpa = $_REQUEST['maxCgpa'];
    
    
    if($jobTitle=="" || $jobExperience=="" || $description=="" || $maxCgpa=="" )
    {
        echo "Data Not Entered";
    }else
    {
                
        include("include/Database.php");
        $db = new Database();
        
        
        $insertCompanyQuery = "INSERT INTO `recruitment`( `title`, `experience`, `description`, `cgpa`, `company_id`) VALUES ('$jobTitle','$jobExperience','$description','$maxCgpa',$company)";
        
        $rowCount = mysqli_query($db->db_connect(),$insertCompanyQuery);
        
        if($rowCount > 0)
        {
            header("Location: viewrecruitment.php");
        }else
        {
            echo "Error Occured";
        }
        
    }
    
}
else
{
    header("Location: addrecruitment.php");
}


?>