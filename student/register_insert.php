<?php

if(isset($_REQUEST['sbmt']))
{
    
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $semester = $_REQUEST['semester'];
    $department = $_REQUEST['department'];
    $enrollment = $_REQUEST['enrollment'];
    $mobile = $_REQUEST['mobile'];
    
    
    if($email=="" || $password=="" || $enrollment=="" || $mobile=="")
    {
        echo "Data Not Entered";
    }else
    {
                
        include("include/Database.php");
        $db = new Database();
        
        
        $insertCompanyQuery = "INSERT INTO `student`(`email`, `password`, `semester`, `department`, `enrollment`, `mobile`) VALUES ('$email','$password','$semester','$department','$enrollment','$mobile')";
        
        $rowCount = mysqli_query($db->db_connect(),$insertCompanyQuery);
        
        if($rowCount > 0)
        {
            header("Location: login.php");
        }else
        {
            echo "Error Occured";
        }
        
    }
    
}
else
{
    header("Location: register.php");
}


?>