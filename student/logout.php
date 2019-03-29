<?php
session_start();
if (isset($_SESSION['userstudent'])) {
    unset($_SESSION["userstudent"]);
    ?>
    <script>
        window.location.href = "index.php";
    </script>
    <?php
}
?>