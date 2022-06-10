<html>
<head>
    <title>new receptionist </title>
    
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="styles/header-style.css">
    <link rel="stylesheet" href="styles/show_comments-style.css">
<style>
    
      
    
   form{
    margin-top:10px;   
    margin-left:30%;
    padding:10px;
    border:5px solid;
    display: table;

   }
   
div.form-example {
    display: table-row;
}

label, input {
    display: table-cell;
    margin-bottom: 10px;
}

label {
    padding-right: 10px;
}
   
</style>
</head>
<body>
    <!-- Header -->
    <?php include("includes/templates/header.html"); ?>
    <div class = "after-header">
        <h1 style = "border: 6px solid gray; background-color: #f0f0f0; width: 100%; text-align: center;">
         Add new receptionist
        </h1>

   
            <form  method="post">
            <div class="form">
                       
                            <label for="firstname">First name</label>
                            <input type="text"  placeholder="First name"name="firstname"  required><br>
                            <label for="lastname">last name</label>
                            <input type="text"  placeholder="last name"name="lastname"  required><br>
                        
                    
                        
                            <label for="phone number">phone number</label>
                            <input type="text"  placeholder="phone number"name="phonenumber"  required><br>
                            <label for="nationalIdNumber">national IdNumber </label>
                            <input type="text"  placeholder="nationalIdNumber"name="nationalIdNumber"  required><br>
                        
                        
                            <label for="mail">mail</label>
                            <input type="mail"  placeholder="mail"name="mail"  required><br>
                            <label for="password">password </label>
                            <input type="password"  placeholder="password"name="password"  required><br>
                       
                    
                    <div class="gender">
                            <input type="radio" name="gender" value="male"> Male
                            <input type="radio" name="gender" value="female"> Female
                    </div>
                    <label for="IdPic">Choose a ID picture:</label>
                    <input type="file" id="avatar" name="IdPic" accept="image/jpeg">
                    <label for="IdPic">Choose a user picture:</label>
                    <input type="file" id="avatar" name="UserPic" accept="image/jpeg">
                    <button type="submit" name="submit">ADD</button>
            </div>
          </form>

        <?php
        include("../includes/connection.php");



        
        if(isset($_POST['submit'])){
        $firstname= $_POST['firstname'];
        $lastname= $_POST["lastname"];
        $phonenumber= $_POST["phonenumber"];
        $nationalIdNumber= $_POST["nationalIdNumber"];
        $mail= $_POST["mail"];
        $password= $_POST["password"];
        $gender= $_POST["gender"];
        $IdPic= $_POST["IdPic"];
        $UserPic= $_POST["UserPic"];
        $role="receptionist";
        $status="activated";
          
        
        $sql_ins_new_receptionist = "INSERT INTO `tbl_user`( `UserFirstName`, `UserLastName`, `UserGender`, `UserPhoneNumber`, `UserNationalIdNumber`, `UserNationalIdImage`, `UserImage`, `UserMail`, `UserPassword`, `UserRole`, `UserAccountStatus`) 
        VALUES ('$firstname','$lastname','$gender','$phonenumber','$nationalIdNumber','$IdPic','$UserPic','$mail','$password','$role','$status')";
        $con->query($sql_ins_new_receptionist);
        
        }
        
        ?>     
    

</div>
</body>
</html>