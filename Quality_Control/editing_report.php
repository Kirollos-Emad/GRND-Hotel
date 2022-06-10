<html>
<head>
    <title>editing report </title>
    <link rel="stylesheet" href="styles/header-style.css">
    <link rel="stylesheet" href="styles/show_comments-style.css">
</head>
<body>
    <!-- Header -->
    <?php include("includes/templates/header.html"); ?>
    <div class = "after-header">
        <h1 style = "border: 6px solid gray; background-color: #f0f0f0; width: 100%; text-align: center;">
           Editing report
        </h1>

    <?php
            include("../includes/connection.php");

            $sql = "select sum(ReservationEditedNumber) FROM tbl_reservation";
            $result = $con->query($sql);
            
            if($result)
            {
                echo "<table> <tr> <th>Number of edited reservations </th>";
                
                while($data1 = $result->fetch_array())
                {

                    
                    echo "<tr>
                          <td>" . $data1['sum(ReservationEditedNumber)'] ."</td>
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