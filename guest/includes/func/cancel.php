<?php

    include("../../../includes/connection.php");

    $sql_get_res_id = "select ReservationId FROM tbl_reservation WHERE UserId = " . $_POST['id'];
    $result_res_id = $con->query($sql_get_res_id);
    $row_res_id = $result_res_id->fetch_array();

    $sql_get_rooms = "select RoomTypeId, NumberOfRooms FROM tbl_reservation_comming WHERE ReservationId = " . $row_res_id['ReservationId'];
    $result_get_rooms = $con->query($sql_get_rooms);
    

    while($row_get_rooms = $result_get_rooms->fetch_array()){
        for($i = 0; $i < $row_get_rooms['NumberOfRooms']; $i++){
            $sql_update_ava = "update tbl_room SET Avalibilty = 'available' WHERE RoomTypeId = " . $row_get_rooms['RoomTypeId']. " LIMIT 1";
            $con->query($sql_update_ava);
        }
    }
    $sql_del_rooms = "delete FROM tbl_reservation_comming WHERE ReservationId = " . $row_res_id['ReservationId'];
    $con->query($sql_del_rooms);
    
    $sql_del_res = "delete FROM tbl_reservation WHERE ReservationId = " . $row_res_id['ReservationId'];
    $con->query($sql_del_res);
?> 
