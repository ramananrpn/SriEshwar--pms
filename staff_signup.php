<?php
 include("db-connection.php");
session_start();

$error="";
if(isset($_POST['signup'])){
    if (empty($_POST['uname']) || empty($_POST['pass']) || empty($_POST['id'])) 
    {
        ?>
                        <script>
                        alert("Please Fill The Details");
                        </script>
        <?php
    }

    else
    {       

                $uname = $_POST['uname'];
                $pass = $_POST['pass'];
                $cpass=$_POST['cpass'];
                $id=$_POST['id'];
            $acc= "SELECT * from login_users where userid ='".$id."'";
            $acc_check=mysqli_query($conn,$acc);

            if(mysqli_num_rows($acc_check)>0)
            {
                ?>
                    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
         User is Already Registered!!!
                    </div>
                <?php
            }
            else{
    if($pass==$cpass)
    {
            $s = "INSERT INTO login_users(userid,username,password) VALUES ('".$id."','".$uname."','".$pass."')";

            if($conn->query($s)===TRUE)
            {
                ?>
                    <script language="javascript">
                         alert("User is Successfully Registered")
                    </script>;
                <?php
            }
            else
            {
               ?>
                    <script language="javascript">
                         alert("Error")
                    </script>;
                <?php
            }
            }
            else{
                 ?>
                    <script language="javascript">
                         alert("Passwords do not Match")
                    </script>;
                <?php
            }

            }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Staff-signup</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
        <style>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
</head>

<body>
<div class="container" style="margin-top: 100px;width: 600px;">  
<!-- Register form -->
<form method="POST" action="">
    <p class="h5 text-center mb-4">Staff - Sign up</p>

    <div class="md-form">
        <i class="fa fa-user prefix grey-text"></i>
        <input type="text" id="uname" name="uname" class="form-control" required>
        <label for="uname">Your Name</label>
    </div>
    <div class="md-form">
        <i class="fa fa-user prefix grey-text"></i>
        <input type="text" id="id" name="id" class="form-control" required>
        <label for="uname">Your Login-ID</label>
    </div>
    <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="pass" name="pass" class="form-control" required>
        <label for="pass">Your Password</label>
    </div>
     <div class="md-form">
        <i class="fa fa-lock prefix grey-text"></i>
        <input type="password" id="cpass" name="cpass" class="form-control" required>
        <label for="cpass"  data-error="Password not match" data-success="Password Match">Confirm Password</label>
    </div>

    <div class="text-center">
        <button class="btn btn-deep-orange" type="submit" name="signup" id="signup">Sign up</button>
    </div>

</form>
<!-- Register form -->
        

<!--<footer class="page-footer" style="background-color: rgba(51, 187, 255,0.1);bottom: 0px;position: fixed;width: 100%;">
          <div class="footer-copyright" >
            <div class="container center" >
            © 2017 Copyright reserved | Sri Eshwar College of Engineering
            </div>
          </div>
</footer>-->
    <!-- SCRIPTS -->
<!--=====================FORM SCRIPT===========================-->
<script type="text/javascript">
var password = document.getElementById("pass")
  , confirm_password = document.getElementById("cpass");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>


</body>

</html>