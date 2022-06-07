<?php include("../includes/connection.php"); ?>
<html>
    <head>
        <title>Reception Promotion</title>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles/header-style.css">
        <link rel="stylesheet" href="styles/rec_prom.css">

        <script>
            function showSearch(val)
            {
            if(val.length == 0)
            {
                location.reload();
            }
            else
                {
                jQuery.ajax({
                            url: "includes/func/search_rec.php",
                            data: 'val=' + val,
                            type: "POST",
                            success: function(data){
                                $("#cards").html(data);
                            }
                        });
                }
            }

            function prom(id)
            {
                let text = "By clicking ok the receptionist will be promote to be a Quality Control";
                
                if (confirm(text) == true) 
                {
                    jQuery.ajax({
                        url: "includes/func/prom_rec.php",
                        data: 'id=' + id,
                        type: "POST",
                        success: function(data){
                            location.reload();
                        }
                    });
                }
            }
        </script>

    </head>
    <body>
        <?php include("includes/templates/header.html"); ?>

        <div class = "after-header">
        <h1 style = "border: 6px solid gray; background-color: #f0f0f0; width: 100%; text-align: center;">
            Please click on the image or the name to confirm or reject the reservation 
            </h1>

            <br>

            <div style = "text-align: center;">
                <label for = "search">Search by email</label>
                <input type = "text" onkeyup="showSearch(this.value)" id = "search">
            </div>

            <div class = "cards" id = "cards">

            <?php
                $sql_get_rec_data = "select UserId, UserFirstName, UserLastName,UserImage,UserMail FROM tbl_user WHERE UserAccountStatus = 'activated' AND UserRole = 'receptionist'";
                $result_rec_data = $con->query($sql_get_rec_data);

                if($result_rec_data->num_rows > 0)
                {
                    while($row_rec_data = $result_rec_data->fetch_array())
                    {
                        echo "<div class = \"card\">
                                <div class = \"img_name_mail\">
                                    <img src = \"../img/Guest/Guest_Image/" . $row_rec_data['UserMail'] .".jpg\">
                                    <div class = \"name_mail\">
                                        <h1>Name: ". $row_rec_data['UserFirstName'] . " " . $row_rec_data['UserLastName'] . "</h1>
                                        <h1>Mail: " . $row_rec_data['UserMail'] . "</h1>
                                    </div>
                                </div>
                                <div class = \"buttons\">
                                    <input type = \"button\" Value = \"Promote\" onclick = \"prom(".$row_rec_data['UserId'].")\">
                                </div>
                            </div>";
                    }
                }
                else
                {
                    echo "<h1 style = \"text-align: center; padding-top: 100px;\">No Data Available</h1>";
                }
            ?>

            </div>
        </div>
    </body>
</html>