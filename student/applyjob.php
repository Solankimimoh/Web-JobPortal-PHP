<?php
session_start();

    
    $id = $_REQUEST['id'];
    $student_id = $_SESSION['userid'];
    
    if($id=="" || $student_id=="" )
    {
        echo "Data Not Entered";
    }else
    {
                
        include("include/Database.php");
        $db = new Database();
        
        
        $checkApply ="SELECT * FROM `applyjob` WHERE `recruitment_id`=$id AND `student_id`=$student_id";
        
                    $rowCount1 = mysqli_query($db->db_connect(),$checkApply);
            if($rowCount1->num_rows>0)
            {
                ?>

<script>
    alert("You already applied for this");
        window.location.href = "viewrecruitment.php";

</script>
<?php
            }else
            {
                 $insertCompanyQuery = "INSERT INTO `applyjob`( `recruitment_id`, `student_id`) VALUES ($id,$student_id)";
        
        $rowCount = mysqli_query($db->db_connect(),$insertCompanyQuery);
        
        if($rowCount > 0)
        {
            ?>

<script>
    alert("Successfully Applied");
    window.location.href = "viewrecruitment.php";

</script>
<?php
        }else
        {
            echo "Error Occured";
        } 
            }
        
      
        
    }
   ?>
