<?php
 include("../../../includes/connection.php");

  $sql_update_status="UPDATE tbl_user SET UserAccountStatus='activated' where UserId=".$_POST['id'];
  $con->query($sql_update_status);
?>