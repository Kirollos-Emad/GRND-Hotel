<?php

    include("../../../includes/connection.php");

    $sql_get_room_type_id = "select RoomTypeId FROM tbl_room_details WHERE RoomType = '".$_POST['type']."'";
    $result_room_type_id = $con->query($sql_get_room_type_id);
    $row_room_type_id = $result_room_type_id->fetch_array();

    $sql_get_room_id = "select RoomId FROM tbl_room WHERE Avalibilty = 'available' AND RoomTypeId = " . $row_room_type_id['RoomTypeId'];
    $result_room_id = $con->query($sql_get_room_id);

    $sql_get_user_id = "select ReservationId FROM tbl_reservation WHERE UserId = " . $_POST['user_id'];
    $result_user_id = $con->query($sql_get_user_id);
    $row_user_id = $result_user_id->fetch_array();

    for($i = 0; $i<$_POST['type_rooms'];$i++)
    {
        $row_room_id = $result_room_id->fetch_array();

        $sql_upd_room = "update tbl_room SET Avalibilty ='not_available' WHERE RoomId = " . $row_room_id['RoomId'];
        $con->query($sql_upd_room);

        $sql_add_to_comming = "insert INTO tbl_reservation_comming(ReservationId, RoomTypeId, NumberOfRooms) VALUES (".$row_user_id["ReservationId"]." , ".$row_room_type_id['RoomTypeId']." , ".$_POST['type_rooms'].")";
        $con->query($sql_add_to_comming);
    }
?>