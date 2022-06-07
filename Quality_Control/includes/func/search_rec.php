<?php

    include("../../../includes/connection.php");

    $sql_get_rec_data = "select UserId, UserFirstName, UserLastName,UserImage,UserMail FROM tbl_user WHERE UserAccountStatus = 'activated' AND UserRole = 'receptionist' AND UserMail like '%".$_POST['val']."%'";
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
                        <input type = \"button\" Value = \"Promote\" onclick = \"\">
                    </div>
                </div>";
        }
    }
    else
    {
        echo "<h1 style = \"text-align: center; padding-top: 100px;\">No Data Available</h1>";
    }

?>