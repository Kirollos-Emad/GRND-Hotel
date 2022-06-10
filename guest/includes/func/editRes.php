<?php
    include("../../../includes/connection.php");

    $sql_get_edit_number = "select ReservationEditedNumber FROM tbl_reservation WHERE UserId = " . $_POST['user_id'];
    $result_get_edit_number = $con->query($sql_get_edit_number);
    $row_edit_number = $result_get_edit_number->fetch_array();
    $edit_number = 1+$row_edit_number['ReservationEditedNumber'];

    $update_res = "update tbl_reservation SET ReservationDays = ".$_POST['res_days'].",ReservationBegining ='".$_POST['date_beg']."', ReservationEnding = '".$_POST['date_end']."', ReservationEditedNumber = ".$edit_number."  where UserId = " . $_POST['user_id'];
    $con->query($update_res);
?>