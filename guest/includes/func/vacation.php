<script>
    function decrement()
    {
        var days = document.getElementById('days').value;

        if(days == 1){
            document.getElementById('days').value = 1;
        }else{
            days--;
            document.getElementById('days').value = days;
        }
    }

    function increment()
    {
        var days = document.getElementById('days').value;
            
        days++;
        document.getElementById('days').value = days;

    }

    function incrementRooms(days){
        var days = document.getElementById('days_' + days).value;
        days++;
        document.getElementById('days_' + days).value = days;
    }

    function decrementNights()
    {
        var days = document.getElementById('days').value;

        if(days == 2){
            document.getElementById('days').value = 2;
        }else{
            days--;
            document.getElementById('days').value = days;
        }
    }

    function decrementLong()
    {
        var days = document.getElementById('days').value;

        if(days == 8){
            document.getElementById('days').value = 8;
        }else{
            days--;
            document.getElementById('days').value = days;
        }
    }

    function decrementVac()
    {
        var days = document.getElementById('days').value;

        if(days == 31){
            document.getElementById('days').value = 31;
        }else{
            days--;
            document.getElementById('days').value = days;
        }
    }

    function incrementNights()
    {
        var days = document.getElementById('days').value;

        if(days == 7){
            document.getElementById('days').value = 7;
        }else{
            days++;
            document.getElementById('days').value = days;
        }
    }

    function incrementLong()
    {
        var days = document.getElementById('days').value;

        if(days == 30){
            document.getElementById('days').value = 30;
        }else{
            days++;
            document.getElementById('days').value = days;
        }
    }

    function incrementVac()
    {
        var days = document.getElementById('days').value;

        if(days == 30){
            document.getElementById('days').value = 30;
        }else{
            days++;
            document.getElementById('days').value = days;
        }
    }

    function getRooms()
    {
        var type = document.getElementById("types").value;
                
        jQuery.ajax({
        url: "includes/func/get_ava_rooms.php",
        data: 'type=' + type,
        type: "POST",
        success: function(data){
            $("#ava_rooms").html(data);
        }
        });
    }

    function addRoom(){
        jQuery.ajax({
        url: "includes/func/addNewRoom.php",
        data: 'type=' + type,
        type: "POST",
        success: function(data){
            $("#ava_rooms").html(data);
        }
        });
    }

    function Confirm(counter){
        var days = document.getElementById("days").value;
        var date_beg = document.getElementById("date_beg").value;
        var date_end = document.getElementById("date_end").value;
        var type;
        var type_rooms;
        var flag = 0;

        var parts = window.location.search.substr(1).split("&");
        var $_GET = {};
        for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        }

        if(date_beg == "")
        {
            alert("Please choose the date");
            
        }
        else{
            //$_GET['user_id']
            for(let i=0; i<counter; i++)
            {
                type_rooms = document.getElementById("type_rooms_" + i).value;
                if(type_rooms > 0){
                    flag++;
                }
            }

            if(flag > 0){
                    jQuery.ajax({
                        url: "includes/func/addRes.php",
                        data: 'user_id=' + $_GET['user_id'] + '&date_beg=' + date_beg + '&date_end=' + date_end + '&res_days='+ days,
                        type: "POST",
                        success: function(data){
                            
                        }
                    });

                    for(let i = 0; i<counter; i++){
                        type = document.getElementById("type_" + i).innerText;
                        type_rooms = document.getElementById("type_rooms_" + i).value;

                        if(type_rooms > 0)
                        {
                            jQuery.ajax({
                            url: "includes/func/addRoomsComming.php",
                            data: 'user_id=' + $_GET['user_id'] + "&type=" + type + "&type_rooms=" + type_rooms,
                            type: "POST",
                            success: function(data){
                                // location.reload();
                            }
                        });
                        }
                        
                    }
                    
            }
        }
    }
    

</script>

<?php

    include("../../../includes/connection.php");

    if($_POST['res_type'] == "day"){
        echo "<div class = \"days_number\">
                <label>Number of days is</label>
                <input style = \"width: 70px; text-align: center;\" type = \"text\" id = \"days\" value = \"1\"  disabled></input>
            </div>

            <div class = \"dates\">
                <label for= \"date_beg\"> Please choose date beginning</label>
                <input type = \"date\" id = \"date_beg\"><br>
                <label for= \"date_beg\"> Please choose date Ending</label>
                <input type = \"date\" id = \"date_end\">
                <br>
            </div>
            <div class = \"card2\">
                <h1 style = \"text-align: center;\">Please choose the reservation rooms</h1>";
                echo "<br>";
                $sql_get_room_types = "select RoomType, RoomTypeId FROM tbl_room_details";
                $result_room_types = $con->query($sql_get_room_types);

                
                $counter = 0;
                echo "<table id = \"types\">";
                echo "<tr><th>Room Type</th><th>MAX Number</th><th>Number</th></tr>";
                while($row_room_types = $result_room_types->fetch_array())
                {
                    $sql_get_room_avail = "select COUNT(RoomId) FROM tbl_room WHERE Avalibilty = 'available' AND RoomTypeId = " . $row_room_types['RoomTypeId'];
                    $result_room_avail = $con->query($sql_get_room_avail);
                    $row_room_avail = $result_room_avail->fetch_array();

                    echo "<tr>";
                    echo "<td id = \"type_".$counter."\">" .$row_room_types['RoomType'] . "</td>";
                    echo "<td>".$row_room_avail['COUNT(RoomId)']."</td>";
                    echo "<td>
                    <input type = \"number\" id = \"type_rooms_".$counter."\" value = \"0\" min = \"0\" max=\"".$row_room_avail['COUNT(RoomId)']."\">
                    </td>";
                    echo "</tr>";
                    $counter++;
                }
                echo "</table><br>";
                echo "<input type = \"button\" value = \"Confirm\" onclick = \"Confirm(".$counter.")\">";
           
    }
    else if($_POST['res_type'] == "nights"){
        echo "<div class = \"days_number\">
                <label>Number of days is</label>
                <input type = \"button\" value = \"-\" onclick = \"decrementNights()\">
                <input style = \"width: 70px; text-align: center;\" type = \"text\" id = \"days\" value = \"2\"  disabled></input>
                <input type = \"button\" value = \"+\" onclick = \"incrementNights()\">
            </div>

            <div class = \"dates\">
                <label for= \"date_beg\"> Please choose date beginning</label>
                <input type = \"date\" id = \"date_beg\"><br>
                <label for= \"date_beg\"> Please choose date Ending</label>
                <input type = \"date\" id = \"date_end\">
                <br>
            </div>
            
            <div class = \"card2\">
                <h1 style = \"text-align: center;\">Please choose the reservation rooms</h1>";
                echo "<br>";
                $sql_get_room_types = "select RoomType, RoomTypeId FROM tbl_room_details";
                $result_room_types = $con->query($sql_get_room_types);

                
                $counter = 0;
                echo "<table id = \"types\">";
                echo "<tr><th>Room Type</th><th>MAX Number</th><th>Number</th></tr>";
                while($row_room_types = $result_room_types->fetch_array())
                {
                    $sql_get_room_avail = "select COUNT(RoomId) FROM tbl_room WHERE Avalibilty = 'available' AND RoomTypeId = " . $row_room_types['RoomTypeId'];
                    $result_room_avail = $con->query($sql_get_room_avail);
                    $row_room_avail = $result_room_avail->fetch_array();

                    echo "<tr>";
                    echo "<td id = \"type_".$counter."\">" .$row_room_types['RoomType'] . "</td>";
                    echo "<td>".$row_room_avail['COUNT(RoomId)']."</td>";
                    echo "<td>
                    <input type = \"number\" id = \"type_rooms_".$counter."\" value = \"0\" min = \"0\" max=\"".$row_room_avail['COUNT(RoomId)']."\">
                    </td>";
                    echo " </tr> ";
                    $counter++;
                }
                echo "</table><br>";
                echo "<input type = \"button\" value = \"Confirm\" onclick = \"Confirm(".$counter.")\">";
    }

    else if($_POST['res_type'] == "long"){
        echo "<div class = \"days_number\">
                <label>Number of days is</label>
                <input type = \"button\" value = \"-\" onclick = \"decrementLong()\">
                <input style = \"width: 70px; text-align: center;\" type = \"text\" id = \"days\" value = \"8\"  disabled></input>
                <input type = \"button\" value = \"+\" onclick = \"incrementLong()\">
            </div>

            <div class = \"dates\">
                <label for= \"date_beg\"> Please choose date beginning</label>
                <input type = \"date\" id = \"date_beg\"><br>
                <label for= \"date_beg\"> Please choose date Ending</label>
                <input type = \"date\" id = \"date_end\">
                <br>
            </div>
            <div class = \"card2\">
                <h1 style = \"text-align: center;\">Please choose the reservation rooms</h1>";
                echo "<br>";
                $sql_get_room_types = "select RoomType, RoomTypeId FROM tbl_room_details";
                $result_room_types = $con->query($sql_get_room_types);

                
                $counter = 0;
                echo "<table id = \"types\">";
                echo "<tr><th>Room Type</th><th>MAX Number</th><th>Number</th></tr>";
                while($row_room_types = $result_room_types->fetch_array())
                {
                    $sql_get_room_avail = "select COUNT(RoomId) FROM tbl_room WHERE Avalibilty = 'available' AND RoomTypeId = " . $row_room_types['RoomTypeId'];
                    $result_room_avail = $con->query($sql_get_room_avail);
                    $row_room_avail = $result_room_avail->fetch_array();

                    echo "<tr>";
                    echo "<td id = \"type_".$counter."\">" .$row_room_types['RoomType'] . "</td>";
                    echo "<td>".$row_room_avail['COUNT(RoomId)']."</td>";
                    echo "<td>
                    <input type = \"number\" id = \"type_rooms_".$counter."\" value = \"0\"  min = \"0\" max=\"".$row_room_avail['COUNT(RoomId)']."\">
                    </td>";
                    echo " </tr> ";
                    $counter++;
                }
                echo "</table><br>";
                echo "<input type = \"button\" value = \"Confirm\" onclick = \"Confirm(".$counter.")\">";
    }

    else if($_POST['res_type'] == "vac"){
        echo "<div class = \"days_number\">
                <label>Number of days is</label>
                <input type = \"button\" value = \"-\" onclick = \"decrementVac()\">
                <input style = \"width: 70px; text-align: center;\" type = \"text\" id = \"days\" value = \"31\"  disabled></input>
                <input type = \"button\" value = \"+\" onclick = \"incrementVac()\">
            </div>

            <div class = \"dates\">
                <label for= \"date_beg\"> Please choose date beginning</label>
                <input type = \"date\" id = \"date_beg\"><br>
                <label for= \"date_beg\"> Please choose date Ending</label>
                <input type = \"date\" id = \"date_end\">
                <br>
            </div>
            <div class = \"card2\">
                <h1 style = \"text-align: center;\">Please choose the reservation rooms</h1>";
                echo "<br>";
                $sql_get_room_types = "select RoomType, RoomTypeId FROM tbl_room_details";
                $result_room_types = $con->query($sql_get_room_types);

                
                $counter = 0;
                echo "<table id = \"types\">";
                echo "<tr><th>Room Type</th><th>MAX Number</th><th>Number</th></tr>";
                while($row_room_types = $result_room_types->fetch_array())
                {
                    $sql_get_room_avail = "select COUNT(RoomId) FROM tbl_room WHERE Avalibilty = 'available' AND RoomTypeId = " . $row_room_types['RoomTypeId'];
                    $result_room_avail = $con->query($sql_get_room_avail);
                    $row_room_avail = $result_room_avail->fetch_array();

                    echo "<tr>";
                    echo "<td id = \"type_".$counter."\">" .$row_room_types['RoomType'] . "</td>";
                    echo "<td>".$row_room_avail['COUNT(RoomId)']."</td>";
                    echo "<td>
                    <input type = \"number\" id = \"type_rooms_".$counter."\" value = \"0\" min = \"0\" max=\"".$row_room_avail['COUNT(RoomId)']."\">
                    </td>";
                    echo " </tr> ";
                    $counter++;
                }
                echo "</table><br>";
                echo "<input type = \"button\" value = \"Confirm\" onclick = \"Confirm(".$counter.")\">";
    }

    else if($_POST['res_type'] == "different"){
        echo "<div class = \"days_number\">
                <label>Number of days is</label>
                <input type = \"button\" value = \"-\" onclick = \"decrement()\">
                <input style = \"width: 70px; text-align: center;\" type = \"text\" id = \"days\" value = \"1\"  disabled></input>
                <input type = \"button\" value = \"+\" onclick = \"increment()\">
            </div>

            <div class = \"dates\">
                <label for= \"date_beg\"> Please choose date beginning</label>
                <input type = \"date\" id = \"date_beg\"><br>
                <label for= \"date_beg\"> Please choose date Ending</label>
                <input type = \"date\" id = \"date_end\">
                <br>
            </div>
            <div class = \"card2\">
                <h1 style = \"text-align: center;\">Please choose the reservation rooms</h1>";
                echo "<br>";
                $sql_get_room_types = "select RoomType, RoomTypeId FROM tbl_room_details";
                $result_room_types = $con->query($sql_get_room_types);

                
                $counter = 0;
                echo "<table id = \"types\">";
                echo "<tr><th>Room Type</th><th>MAX Number</th><th>Number</th></tr>";
                while($row_room_types = $result_room_types->fetch_array())
                {
                    $sql_get_room_avail = "select COUNT(RoomId) FROM tbl_room WHERE Avalibilty = 'available' AND RoomTypeId = " . $row_room_types['RoomTypeId'];
                    $result_room_avail = $con->query($sql_get_room_avail);
                    $row_room_avail = $result_room_avail->fetch_array();

                    echo "<tr>";
                    echo "<td id = \"type_".$counter."\">" .$row_room_types['RoomType'] . "</td>";
                    echo "<td>".$row_room_avail['COUNT(RoomId)']."</td>";
                    echo "<td>
                    <input type = \"number\" id = \"type_rooms_".$counter."\" value = \"0\" min = \"0\" max=\"".$row_room_avail['COUNT(RoomId)']."\">
                    </td>";
                    echo " </tr> ";
                    $counter++;
                }
                echo "</table><br>";
                echo "<input type = \"button\" value = \"Confirm\" onclick = \"Confirm(".$counter.")\">";
    }
?>