<?php

session_start();
require "include/Database.php";
$db = new Database();
if (isset($_REQUEST['sbmt'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    if ($email == "" || $password == "") {
        ?>
        <script>
            alert("Please enter the details");
            window.location.href = "index.php";
        </script>
        <?php
    } else {
        $selectUser = "SELECT * FROM `student` WHERE `email`=? AND `password`=?";
        // prepare and bind
        $stmt = $db->db_connect()->prepare($selectUser);
        $stmt->bind_param("ss", $email, $password);
        $rowCount = $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $result_1 = $row['id'];
        
        if ($result->num_rows > 0) {
            $_SESSION['userstudent'] = $email;
            $_SESSION['userid'] = $result_1;
            ?>
            <script>
                alert("Login SuccessFully");
                window.location.href = "home.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Invalid Email and Password ");
                window.location.href = "index.php";
            </script>
            <?php
        }
    }
} else {
    ?>
    <script>
        window.location.href = "index.php";
    </script>
    <?php
}
?>