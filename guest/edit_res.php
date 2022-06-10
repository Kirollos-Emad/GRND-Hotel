<html>
    <head>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles/header-style.css">
        <link rel="stylesheet" href="styles/edit-res.css">
        <title>Edit Reservation</title>

        <script>
        function select(){
            var res_type = document.getElementById('res_type').value;

            jQuery.ajax({
                            url: "includes/func/edit-res.php",
                            data: 'res_type=' + res_type,
                            type: "POST",
                            success: function(data){
                                $("#days_dates").html(data);
                            }
                        });
        }

    </script>

    </head>
    <body>
        <?php include("includes/template/guest_header.html"); ?>

        <div class = "card">
            <h1 style = "text-align: center;">Please choose the reservation date and time</h1>
            
            <div class = "res_type">
                <label for = "res_type">Please Choose a Type</label>
                <select id = "res_type" onchange = "select()">
                    <option value = "day">Day use</option>
                    <option value = "nights">1 to 7 nights</option>
                    <option value = "long" >Long stay (more than 7 nights)</option>
                    <option value = "vac">Vacation (more than a month)</option>
                    <option value = "different">I have different plan</option>
                </select>
            </div>

            <div id = "days_dates"></div>
        </div>

    </body>
</html>