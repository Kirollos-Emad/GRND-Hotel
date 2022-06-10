<html>
    <head>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles/header-style.css">
        <link rel="stylesheet" href="styles/cancel.css">
        <title>Cancel Reservation</title>

        <script>
            function cancel(id){
                jQuery.ajax({
                            url: "includes/func/cancel.php",
                            data: 'id=' + id,
                            type: "POST",
                            success: function(data){
                                
                            }
                        });
            }
        </script>
    </head>
    <body>
        <?php 
        include("includes/template/guest_header.html"); 

        echo "<div class = \"card\">
            <input type = \"button\" value = \"cancel my reservation\" onclick = \"cancel(". $_GET['user_id'].")\">
        </div>";
        ?>
    </body>
</html>