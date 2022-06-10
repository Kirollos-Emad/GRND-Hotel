<html>
<?php include("includes/connection.php"); ?>

<head>

<style>

.gradient-custom {
/* fallback for old browsers */
background: #f093fb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
</style>

</head>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Grand Hotel</title>
</head>
<body>
<div class="header">
            <p> Please fill in this form to create an account</p>
            <hr>
        </div>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    <a class="navbar-brand" href="#">Grand hotel</a>
   
    </div>
</nav>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <form name="my-form"  action="register_handling.php" method="POST">
                                <div class="form-group row">
                                    <label for="First_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="first_name" class="form-control" placeholder="Enter your first name"name="fn" required>
                                    
                                    <script>
                                        ReactDOM.render(
                                            <textAreaCounter text="fn"/>, document.getElementById('first_name')
                                        );
                                    </script>
                                    
                                
                                </div>
                                </div>


                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">last Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="last_name" class="form-control"  placeholder="Enter your last name" name="ln" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone number</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control"  placeholder="Enter your phone number" name="pnum" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="National_id" class="col-md-4 col-form-label text-md-right">National id</label>
                                    <div class="col-md-6">
                                        <input type="text" id="National_id" class="form-control"  placeholder="Enter your national number" name="ni" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Email" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <input type="text" id="Email" class="form-control"  placeholder="Enter your email" name="mail" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Password" class="col-md-4 col-form-label text-md-right">password</label>             
                                    <div class="col-md-6">
                                        <input type="password" id="Password" class="form-control"  placeholder="Enter your password" name="psw"  required>
                                    </div>
                                </div>
                                

                                <div class="form-group row">
                                    <label for="password2" class="col-md-4 col-form-label text-md-right">Confirm password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password2" class="form-control"  placeholder="Enter your confirm password" name="psw2"  required>
                                    </div>
                                </div>

                                <div class="form-group">
                                <label class="col-md-4 control-label" for="filebutton">National ID Image</label>
                                <div class="col-md-4">
                                 <input name="Nim" required class="input-file" id="filebutton" type="file" accept="image/jpeg">
                                 </div>
                                </div>
                                <div class="form-group">
                                <label class="col-md-4 control-label" for="filebutton">User image</label>
                                <div class="col-md-4">
                                 <input name="image"  required class="input-file" id="filebutton" type="file" accept="image/jpeg">
                                 </div>
                                </div>

                                <div class="gender">
                            <input type="radio" name="gender" value="male"> Male
                            <input type="radio" name="gender" value="female"> Female
                    </div>
                                  
       
                    <br>

                <div class="container">
                  <input type="submit" name="press" value="Register" onclick="checkInputs()" onsubmit="checkInputs()"
                 class="btn btn-success" id="btn"></input>
            </div>
            <br>
             <p style="text-align: center;">Already have an account? 
             
            <a style="text-decoration: none;"
                    href="login_handle.php">Sign in</a></p>
            </div>

            
            
        </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>