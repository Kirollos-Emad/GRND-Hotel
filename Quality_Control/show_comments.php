<html>
<head>
    <title>comments </title>
    <link rel="stylesheet" href="styles/header-style.css">
    <link rel="stylesheet" href="styles/show_comments-style.css">
</head>
<body>
    <!-- Header -->
    <?php include("includes/templates/header.html"); ?>
    <div class = "after-header">
        <h1 style = "border: 6px solid gray; background-color: #f0f0f0; width: 100%; text-align: center;">
           comments
        </h1>

    <?php
            include("../includes/connection.php");

            $sql = "select RoomId, RoomRateComment FROM tbl_room_rate Where RoomRateComment is not NULL ";
            $result = $con->query($sql);
            
            if($result)
            {
                echo "<table> <tr> <th>Room Number</th> <th>Room Type</th> <th>Comment</th>";
                
                while($data1 = $result->fetch_array())
                {
                    $sql2 = "select RoomNo, RoomTypeId  FROM tbl_room WHERE RoomId = " . $data1['RoomId'];
                    $result2 = $con->query($sql2);
                    $data2 = $result2->fetch_array();

                    $sql_get_room_type = "select RoomType FROM tbl_room_details WHERE RoomTypeId = " . $data2['RoomTypeId'];
                    $result3 = $con->query($sql_get_room_type);
                    $data3 = $result3->fetch_array();
                    echo "<tr>
                          <td>" . $data2['RoomNo'] ."</td>
                          <td>" . $data3['RoomType'] ."</td>
                          <td>" . $data1['RoomRateComment'] ."</td>
                          </tr>";
    
                }
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