<html>
<head>
    <title>rating </title>
    <link rel="stylesheet" href="styles/header-style.css">
    <link rel="stylesheet" href="styles/show_rating-style.css">
</head>
<body>
    <!-- Header -->
    <?php include("includes/templates/header.html"); ?>
    <div class = "after-header">
        <h1 style = "border: 6px solid gray; background-color: #f0f0f0; width: 100%; text-align: center;">
           rating
        </h1>

        <?php
             include("../includes/connection.php");
                $sql="select RoomId, RoomNo FROM tbl_room";
                $result=$con->query($sql);
                if($result->num_rows>0){
                    echo "<table> <tr> <th>Room Number</th>  <th>Rating</th>";
                    while($data1=$result->fetch_array()){
                        $sql2="select round(avg(RoomRate),1) FROM  tbl_room_rate WHERE RoomId = " . $data1['RoomId']."" ;
                        $result2=$con->query($sql2);
                        if($result2){
                            $data2=$result2->fetch_array();
                            echo "<tr>
                            <td>" . $data1['RoomNo'] ."</td>
                            <td>" . $data2['round(avg(RoomRate),1)'] ."</td>
                            </tr>";
                        }
                    }
                    echo "</table>";
                }else{
                    echo "<h1 style = \"text-align: center; padding-top: 100px;\">No Data Available</h1>";
                }
                
        ?>

</div>
</body>
</html>