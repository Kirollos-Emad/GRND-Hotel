<html>
<head>
    <title>edit my pin </title>
    <link rel="stylesheet" href="styles/header-style.css">
    <link rel="stylesheet" href="styles/show_comments-style.css">
    
</head>
<body>
    <!-- Header -->
    <?php include("includes/templates/header.html"); ?>
    <div class = "after-header">
        <h1 style = "border: 6px solid gray; background-color: #f0f0f0; width: 100%; text-align: center;">
           Edit pin
        </h1>
        
         
               
                
<?php
    
            
            //  $sql = "select EmpId, ManagerPIN FROM tbl_manager";
            //  $sql = "select ManagerPin FROM tbl_manager wehere EmpId = " . $_GET['user_id'];
            //  $result = $con->query($sql);
            
            //   if($result->num_rows > 0)
            //  {
            //     $data1 = $result->fetch_array();
            //          if($data1['ManagerPin']==0){
            //              echo"Your PIN is: ". $data1['ManagerPIN'] . "<br>";

            //              echo ('<form method = "POST" action "">
            //              <label>Please Enter a new PIN if you want to change it</label><br>
            //             <input type="password" id="pin" placeholder="Pin" name="Pin" inputmode="numeric" maxlength="8" required>
            //             <input type = "submit"  value = "Update" onclick = "up1"></form>');

                        
            //     }
              
            //     else{
            //         echo"You don't hava a PIN YOU must put it if you need to use it <br>";

            //         echo ('<label>Please Enter a new PIN</label><br>
            //         <form method = "POST" action "">
            //         <input type="password" id="pin" placeholder="Pin" name="Pin" inputmode="numeric" maxlength="8"  required>
            //         <input type = "submit"  value = "Update"></form>');

                
            // }
            //     }
            

               






            //     $data1=$result->fetch_array();
            //     if($data1['ManagerPin']==0){
            //         echo "you dont have pin";
            //     }else{
            //         echo $data1['ManagerPin'];
            //         echo "<p style:'color:powderblue;'>enter new pin</p>";
            //         echo ('<label for="Pin">Pin</label>
            //         <input type="text"  placeholder="Pin"name="Pin"  required><br>');
            //         echo ('<p><button onclick="sub()">update </button></p>');
            //         if(isset()){
            //         $pin=$data1['ManagerPin'];
            //         $sql_new_pin = "INSERT INTO tbl_manager(`ManagerPIN`) VALUES ('$pin')";
            //         $con->query($sql_new_pin);
            //         }
            //     }
        
       
        
            // include("../includes/connection.php");
            
            
            //  if(isset($_POST['submit'])){
            //  $pin=$_POST['Pin'];
            //  }
            // $sql = "select EmpId, ManagerPIN FROM tbl_manager";
            // $result = $con->query($sql);
            
            // if($result->num_rows > 0)
            // {
            //     $data1 = $result->fetch_array();
            //         if($data1['ManagerPIN']==0){
            //             echo"You don't hava a PIN YOU must put it if you need to use it <br>";
            //             echo "Please Enter a new PIN";
            //              $sql_new_pin = "UPDATE tbl_manager SET ManagerPIN = '$pin'";
            //              $con->query($sql_new_pin);
            //         }else{
            //             echo"Your PIN is: ". $data1['ManagerPIN'] . "<br>";
            //             echo "Please Enter a new PIN if you want to change it";
            //             $sql_new_pin = "UPDATE tbl_manager SET ManagerPIN = '$pin'" ;
            //             $con->query($sql_new_pin);
            //         }
            // }
             ?>
             
           



</div>
</body>
</html>