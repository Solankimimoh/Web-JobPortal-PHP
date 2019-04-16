<?php
session_start();

    
    $id = $_REQUEST['id'];
    $jobid = $_REQUEST['jobid'];
    
    if($id=="" || $jobid=="" )
    {
        echo "Data Not Entered";
    }else
    {
                
        include("include/Database.php");
        $db = new Database();
        
        
        $checkApply ="SELECT * FROM `selectedstudent` WHERE `recruitment_id`=$jobid AND `student_id`=$id";
        
                    $rowCount1 = mysqli_query($db->db_connect(),$checkApply);
            if($rowCount1->num_rows>0)
            {
                ?>

<script>
    alert("You already applied for this");
        window.location.href = "viewjobapply.php";

</script>
<?php
            }else
            {
                 $insertCompanyQuery = "INSERT INTO `selectedstudent`(`recruitment_id`, `student_id`) VALUES ($jobid,$id)";
        
        $rowCount = mysqli_query($db->db_connect(),$insertCompanyQuery);
        
        if($rowCount > 0)
        {
            ?>

<script>
    alert("Successfully Applied");
    window.location.href = "viewjobapply.php";

</script>
<?php
        }else
        {
            echo "Error Occured";
        } 
            }
        
      
        
    }
   ?>
