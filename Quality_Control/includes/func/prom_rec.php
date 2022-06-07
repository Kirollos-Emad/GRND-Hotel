<?php
    include("../../../includes/connection.php");

    $sql_update_rec = "update tbl_user SET  UserRole = 'quality_control' WHERE UserId = " . $_POST['id'];
    $con->query($sql_update_rec);

?>