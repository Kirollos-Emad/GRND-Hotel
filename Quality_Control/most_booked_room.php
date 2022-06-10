<html>
<head>
    <title>most booked room </title>
    <link rel="stylesheet" href="styles/header-style.css">
    <link rel="stylesheet" href="styles/show_comments-style.css">
</head>
<body>
    <!-- Header -->
    <?php include("includes/templates/header.html"); ?>
    <div class = "after-header">
        <h1 style = "border: 6px solid gray; background-color: #f0f0f0; width: 100%; text-align: center;">
           Booking information
        </h1>

    <?php
            include("../includes/connection.php");

        //     $sql = "select RoomId, RoomNo FROM tbl_room";
        //     $result = $con->query($sql);
        //     $data1 = $result->fetch_array();
        //     if($result)
        //     {
        //         echo "<table> <tr> <th>Room Number</th> <th>Number of Recervations</th> ";

        //             $sql2 = "select count(RoomId) FROM tbl_reservation_archives WHERE RoomId = " . $data1['RoomId']." GROUP by RoomId " ;
        //             $result2 = $con->query($sql2);
        //             while($data2 = $result2->fetch_array()){

        //             }
        //             echo "<tr>
        //             <td>" . $data1['RoomNo'] ."</td>
        //             <td>" . $data2['count(RoomId)'] ."</td>
                   
        //             </tr>";

          
        //   echo "</table>";

        //             // $sql_get_room_type = "select RoomType FROM tbl_room_details WHERE RoomTypeId = " . $data2['RoomTypeId'];
        //             // $result3 = $con->query($sql_get_room_type);
        //             // $data3 = $result3->fetch_array();
                   
        //     }
        //     else
        //     {
        //         echo "<h1 style = \"text-align: center; padding-top: 100px;\">No Data Available</h1>";
        //     }

        $sql = "SELECT tbl_room.RoomNo ,count(tbl_reservation_archives.RoomId) from tbl_room ,tbl_reservation_archives WHERE tbl_room.RoomId=tbl_reservation_archives.RoomId GROUP by tbl_room.RoomNo";
            $result = $con->query($sql);
            
            if($result)
            {
                echo "<table> <tr> <th>Room Number</th> <th>Number of Recervations</th> ";

                    while($data1 = $result->fetch_array()){

                    
                    echo "<tr>
                    <td>" . $data1['RoomNo'] ."</td>
                    <td>" . $data1['count(tbl_reservation_archives.RoomId)'] ."</td>
                   
                    </tr>";
                    }
          
          echo "</table>";

          echo "<table> <tr> <th>Most Booked Room</th> ";
          $sql2="SELECT tbl_room.RoomNo ,count(tbl_reservation_archives.RoomId) from tbl_room ,tbl_reservation_archives WHERE tbl_room.RoomId=tbl_reservation_archives.RoomId GROUP by tbl_room.RoomNo ORDER BY count(tbl_reservation_archives.RoomId) DESC LIMIT 1";
          $result2=$con->query($sql2);
          $data2=$result2->fetch_array();
          echo "<tr>
                    <td>" . $data2['RoomNo'] ."</td>
                    
                   
                    </tr>";
            echo "</table>";


        }
            else
            {
                echo "<h1 style = \"text-align: center; padding-top: 100px;\">No Data Available</h1>";
            }
    ?>

</div>
</body>
</html>