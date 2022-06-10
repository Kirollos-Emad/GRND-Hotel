<?php
 	include("includes/connection.php");
	 error_reporting(0);
    if(isset($_POST['press']))
    {
        
     $firstname = $_POST['fn'];
    $lastname = $_POST['ln'];
    $phone_num = $_POST['pnum'];
   $national_id =  $_POST['ni'];
     $email = $_POST['mail'];
    $password =  $_POST['psw'];
   $password2 = $_POST['psw2'];
     $image_id=  $_POST['Nim'];
     $image = $_POST['image'];
     $gender = $_POST['gender'];
 	$role   ="guest";
 	$status="deactivated";
     if(!preg_match("/^[a-zA-Z\s]+$/",$firstname))
     {
        echo"<script>alert('Please Enter your first Name as character ')</script>";
        exit();
     }
     if(!preg_match("/^[a-zA-Z\s]+$/",$lastname))
     {
        echo"<script>alert('Please Enter your last Name as character ')</script>";
        exit();
     }
     if(!preg_match('/^[0-9]*$/',$phone_num))
     {
        echo"<script>alert('Please Enter Numberic Consist of 11 numbers')</script>";
        exit();
    }
    if(!preg_match('/^[0-9]*$/',$national_id))
    {
        echo"<script>alert('Please Enter Numberic Consist of 9 numbers ')</script>";
        exit();
    }
     if( $password==$password2)
    {
        $sql="SELECT * FROM tbl_user WHERE UserMail='$email'";
        $result=mysqli_query($con,$sql);
        if(!$result ->num_rows >0)
        {
            $sql = "insert INTO tbl_user( UserFirstName, `UserLastName`, `UserGender`, `UserPhoneNumber`, `UserNationalIdNumber`, `UserNationalIdImage`, `UserImage`, `UserMail`, `UserPassword`, `UserRole`, `UserAccountStatus`) 
       VALUES ('$firstname','$lastname','$gender','$phone_num','$national_id','$image_id','$image','$email','$password','$role','$status')";   
       $result=mysqli_query($con,$sql);
       if($result)
       {
           echo"<script>alert('wow! User Registration Done.')</script>";
       }else
       {
           echo"<script>alert('Woop! Something wrong went.')</script>";
       }   
        }else
        {
            echo"<script>alert('Email Already Exists.')</script>";
        }
       
    }else
    {
        echo"<script>alert('password not matching.')</script>";
     }
     
    
}
?>