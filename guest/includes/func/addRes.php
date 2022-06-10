<?php
    include("../../../includes/connection.php");

    $sql_insert_rest = "insert INTO tbl_reservation(UserId, ReservationDays, ReservationBegining, ReservationEnding, ReservationEditedNumber, ReservationConfirmation)
    VALUES (".$_POST['user_id'].",".$_POST['res_days'].",'".$_POST['date_beg']."','".$_POST['date_end']."',0,'Waiting')";

    $con->query($sql_insert_rest);
?>