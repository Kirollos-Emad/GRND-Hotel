<html>
<head>
    <title>room report </title>
    <link rel="stylesheet" href="styles/header-style.css">
    <link rel="stylesheet" href="styles/show_comments-style.css">
</head>
<body>
    <!-- Header -->
    <?php include("includes/templates/header.html"); ?>
    <div class = "after-header">
        <h1 style = "border: 6px solid gray; background-color: #f0f0f0; width: 100%; text-align: center;">
           Room Report
        </h1>

    <?php
            // include("../includes/connection.php");
            //     $sql="select RoomId, RoomNo FROM tbl_room";
            //     $result=$con->query($sql);
            //     if($result->num_rows>0){
            //         echo "<table> <tr> <th>Room Number</th>  <th>no.of 5 starts Rating</th>";
            //         while($data1=$result->fetch_array()){
            //             $sql2="select count(RoomRate) FROM  tbl_room_rate WHERE RoomRate =5 AND RoomId = " . $data1['RoomId']."" ;
            //             $result2=$con->query($sql2);
            //             if($result2->num_rows>0){
            //                 $data2=$result2->fetch_array();
            //                 echo "<tr>
            //                 <td>" . $data1['RoomNo'] ."</td>
            //                 <td>" . $data2['count(RoomRate)'] ."</td>
            //                 </tr>";
            //             }
            //         }
            //         echo "</table>";
            //     }else{
            //         echo "<h1 style = \"text-align: center; padding-top: 100px;\">No Data Available</h1>";
            //     }
            include("../includes/connection.php");
                $sql="SELECT tbl_room.RoomNo,count(tbl_room_rate.RoomRate)  FROM tbl_room_rate ,tbl_room WHERE tbl_room_rate.RoomRate=5 AND tbl_room_rate.RoomId =tbl_room.RoomId GROUP by tbl_room.RoomNo";
                $result=$con->query($sql);
                if($result->num_rows>0){
                    echo "<table> <tr> <th>Room Number</th>  <th>no.of 5 starts Rating</th>";
                    while($data1=$result->fetch_array()){
                            echo "<tr>
                            <td>" . $data1['RoomNo'] ."</td>
                            <td>" . $data1['count(tbl_room_rate.RoomRate)'] ."</td>
                            </tr>";
                        }
                    
                    echo "</table>";
                }else{
                    echo "<h1 style = \"text-align: center; padding-top: 100px;\">No Data Available</h1>";
                }
                
            
    ?>

</div>
</body>
</html>