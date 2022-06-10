
 <html>
	 
<style>
body{
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    height: 100vh;
    overflow: hidden;
    
}
/* .logo{
    margin-top: 10px;
    align-items:flex-start;
    justify-content:space-around ;
     min-height:8vh;
     background-color: rgb(255, 255, 255);
     font-family: 'poppins',sans-serif;
}
.logo h3{
    color:rgb(0, 0, 0);
    text-transform: uppercase;
    letter-spacing: 6px;
    font-size: 20px;
} */
.center{
    position: absolute;
    top: 50%;
    left: 50%;
    transform:translate(-50%,-50%);
    width: 400px; 
    border-radius: 10px;
    border-color: black;
    border-width: 1px;
    border-style: solid;
}
.center h1{
    text-transform: uppercase;
    text-align: center;
    padding: 0 0 20px 0;
    border-bottom: 1px solid silver;
}
.center form{
    padding: 0 20px;
    box-sizing: border-box;
}
form .txt_field{
    position: relative;
    border-bottom: 2px solid;
    margin: 30px 0;
}
.txt_field input{
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 16px;
    border: none;
    background: none;
    outline: none;
}
.txt_field label{
    position: absolute;
    top: 50%;
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);
    font-size: 20px;
    pointer-events: none;
    transition: .5s;
}
/* .txt_field span::before{
    content: "";
    position: absolute;
    top: 40px;
    left: 0;
    width: 100%;
    height: 2px;
    background: black;
    transition:.5s;
} */
.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
top: -5px;
color: black;
}
/* .txt_field input:focus ~ span::before,
.txt_field input:valid ~ span::before{
 width: 100px;
} */
input[type="submit"]{
    width: 100%;
    height: 50px;
    border: 1px solid;
    font-size: 18px;
    border-radius: 25px;
    color: white;
    background-color: rgb(17, 5, 5);
    font-weight: 700;
    cursor: pointer;
    outline: none;
}
input[type="submit"]:hover{
    border-color: rgb(0, 0, 0);
    transition: .5s;
}
.signup_link{
    margin: 30px 0;
    text-align: center;
    font-size: 16px;
    color: #666666;
}
.signup_link a{
    color: #2691d9;
    text-decoration: none;
}
.signup_link a:hover{
    text-decoration: underline; 
}
</style>


<head>
<script>
						function valiCheck()
						{
	
							var ss=document.getElementById('idun').value;
							var uu=document.getElementById('idpw').value;
	
	
							try
						{
							if((filter_var(ss,FILTER_VALIDATE_EMAIL)||(filter_var(uu, FILTER_VALIDATE_INT))))
							{
									alert("Email or password valid");
							}
						}
					
						catch (Exception ) 
						
							{
								alert("Email or password not valid");
							}
						}
				
 </script>
 <title>login</title>
</head>

<body>
<div class="center">
        
			<h1>login</h1>
		<form method = "post" action = "log.php">
		
		<div class="txt_field">
     		<input type="text" name="un"  id="idun" required >
			 <label>username</label>			
 
					</div>
					<div class="txt_field">
     		<input type="password" name="pw"  id="idpw" required>
		 		<label>password</label>
					</div>
			 <input type= "submit" name="save" value = "login">
		 			<div class="signup_link">
                not a GRND member? <a href="register.php">signup</a>
            </div>
			
		 </form>
		</div>
	

</body>


 </html>
 
 <?php
session_start();
 include("includes/connection.php");
 include("function.php");
		
 
  

		if(isset($_POST['save']))
		{
			
			$username = $_POST['un'];
			$password = $_POST['pw'];

			if(!empty($username)&&!empty($password))
			{
				
				echo "<script> valiCheck() </script>";	
				
				$sql = "select UserId, UserRole FROM tbl_user where UserMail = '".$username."' AND UserPassword = '".$password."'";
				$result = $con->query($sql);
				
				if($result->num_rows>0)
				{
					$user_data = $result->fetch_array();
				
					
					if($user_data['UserRole'] == "guest")
					{
						header("Location:http://localhost/project/guest_confirmation.html?user_id=".$user_data['UserId']);
						exit();
						
					}
					else if($user_data['UserRole'] == "receptionist")
					{
						header("Location:http://localhost/project/Receptionist/index.php?user_id=".$user_data['UserId']);
						exit();
					}
					else if($user_data['UserRole'] == "quality_control")
					{
						header("Location:http://localhost/project/Quality_Control/index.php?user_id=".$user_data['UserId']);
						exit();          
					}
					
					
				}	
				
				
			}else{
						echo "<script>
						alert(\"Please Fill The Form ...Click OK To Return\")
						</script>;";
					
					}
			}