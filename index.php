<?php
session_start();
    if(isset($_SESSION['staff_login_flag'])){
        header('location:staffpage.php');
    }
    if(isset($_SESSION['dean_login_flag'])){
        header('location:dean.php');
    }
$_SESSION['login_flag']=0;
 include("db-connection.php");

$error="";
if(isset($_POST['login'])){
    if (empty($_POST['uname']) || empty($_POST['pass'])) 
    {
        ?>
                        <script>
                        alert("Please Fill The Details");
                        </script>
        <?php
    }

    else
    {
        $username=$_POST['uname'];
        $password=$_POST['pass'];

        // To protect MySQL injection for Security purpose
                $username = stripslashes($username);
                $password = stripslashes($password);
                $username = mysqli_real_escape_string($conn,$username);
                $password = mysqli_real_escape_string($conn,$password);
        if($username=="pmsadmin")
        {
                    $q=mysqli_query($conn,"SELECT * from login_users where userid='$username' AND password='$password'");
                    $rows = mysqli_num_rows($q);
                    if($rows==1)
                    {
                       $_SESSION['admin']=$username; // Initializing Session
                        $_SESSION['admin_login_flag']=1;
                        header("location: admin_pms.php"); // Redirecting To Other Page
                    }
                    else 
                    {
                         
                          ?> <!--Ending php-->
                                <script>
                                alert("Username or Password is invalid");
                                </script>
                            <?php /*Starting php again*/
                    }

        }

//========HIGHER OFFCIAL AND STAFF LOGIN ELSE PART===========//
        else
        {
                if($username=="secedean" || $username=="seceprincipal")
                {
                    $q=mysqli_query($conn,"SELECT * from login_users where userid='$username' AND password='$password'");
                    $rows = mysqli_num_rows($q);
                    if($rows==1)
                    {
                        $_SESSION['login_user']=$username; // Initializing Session
                        $_SESSION['dean_login_flag']=1;
                        header("location: dean.php"); // Redirecting To Other Page
                    }

                    else 
                    {
                         
                    ?> <!--Ending php-->
                        <script>
                        alert("Username or Password is invalid");
                        </script>
                    <?php /*Starting php again*/
                    }

                }
                else
                {
                    
                    $q=mysqli_query($conn,"SELECT * from login_users where userid='$username' AND password='$password'");
                    $rows = mysqli_num_rows($q);
                    if($rows==1)
                    {
                        $_SESSION['login_user']=$username; // Initializing Session
                         $_SESSION['staff_login_flag']=1;
                        header("location: staffpage.php"); // Redirecting To Other Page

                    }

                     else 
                    {
                         
                    ?> <!--Ending php-->
                        <script>
                        alert("Username or Password is invalid");
                        </script>
                    <?php /*Starting php again*/
                    }
                
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
    <title>SECE-PMS | Welcome</title>
    <!-- Font Awesome -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
     <link rel="stylesheet" href="css/material-icons.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
     <!-- Stylesheet -->
      <link rel="stylesheet" href="css/preloader.css" type="text/css" media="screen, print"/>
<!-- jQuery Plugin -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- ICON-->
    <link rel="shortcut icon" type="image/x-icon" href="img/ss.png" />
    <style type="text/css">
      body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    overflow-x: hidden;
    overflow-y: hidden;
  }

  main {
    flex: 1 0 auto;
  }
  </style>
</head>

<body style="background-image:url(img/bk.jpeg);background-size: 100% 100%" class="img-fluid">
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).on('load', function() { // makes sure the whole site is loaded 
            $('#status').fadeOut(); // will first fade out the loading animation 
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
</script> 
<!--========HEADER===========-->
<header class="container-fluid" style="z-index: 9; background-color: rgba(51, 187, 255,0.1);height: 110px;">
<!--======ESHWAR LOGO======-->

    <img class="img-fluid float-left" src="img/sece-logo.png"  style="height: 100px;">

<!--=========LOGIN BUTTON=====-->
   <button type="button" class="btn btn-primary float-right" style="margin-top: 30px;font-size: 18px;" data-toggle="modal" data-target="#login"><i class="fa fa-user mr-1" ></i> SIGN IN</button>

   
 
</header>
<!--=========MAIN===========-->

<main>
<div class="row">
    <div class="col-md-7 text-center text-md-left mb-5">
        <div class="text-center">
           <img class="img-fluid" src="img/pms.png"  style="height: 300px;margin-top: 20px;">
        </div>

        <!--EXPLORE PROJECTS BUTTON-->

        <div class="text-center" style="margin-top: 30px;">
           <a class="btn btn-default" href="expproj1.php" style="font-size: 18px;">Explore Projects<i class="fa fa-xing ml-3"></i></a>
        </div>
    </div>
    <div class="col-md-4 col-xl-4" style="margin-top: 50px;">
        <!--Card Wider-->
<div class="card card-cascade wider"  style="background-color: rgba(255, 255, 255 ,0.2)">

    <!--Card image-->
    <div class="view overlay ">
        <img src="" class="img-fluid">
        <a href="#!">
            <div class="mask"></div>
        </a>
    </div>
    <!--/Card image-->

    <!--Card content-->
    <div class="card-body text-center">
         <h4 class="card-title text-center">SriEshwar-PMS</h4>
        <p class="card-text" style="font-size: 18px;">SriEshwar-PMS is an Online Project Repository To Track the Final Year Projects Developed by the Students Of SECE.</p>
    
        <p class="text-center"><strong>Developed And Maintainted By </strong> 
            <br>
            Sathish M <br>
            Ramanan R<br>
              NavaneethaKrishnan<br>

              <p class="text-center">Guided By :  Mr. Arul Kumar , Asst.Prof , CSE </p>
                <strong><p class="text-center">Department of Computer Science & Engineering</p></strong> 
                 
        </p>
    </div>
    <!--/.Card content-->

</div>
<!--/.Card Wider-->
        <!--Panel-->
<!--<div class="card" style="background-color: rgba(255, 255, 255 ,0.1)">
   
    <div class="card-body">
        <h4 class="card-title text-center">SriEshwar-PMS</h4>
        <p class="card-text" style="font-size: 18px;">SriEshwar-PMS is an Online Project Repository To Track the Final Year Projects Developed by the Students Of SECE.</p>
    
        <p class="text-center"><strong>Developed And Maintainted By </strong> 
            <br>
            Sathish M <br>
            Ramanan R<br>
              Navaneetha Krishnan<br>

              <p class="text-center">Guided By :  Mr. Arul Kumar , Asst.Prof , CSE </p>
                <strong><p class="text-center">Department of Computer Science & Engineering</p></strong> 
                 
        </p>

    </div>
</div>-->
<!--/.Panel-->
    </div>
</div>

    <!--================MODAL BOXES=================-->

<!--===========MODAL : LOGIN FORM MODAL====-->

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header light-blue darken-3 white-text">
                <h4 class="title"><i class="fa fa-user"></i> Log in</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form name="loginform" method="POST" action="">
                    <div class="md-form form-sm"s>
                        <i class="fa fa-user prefix"></i>
                        <input type="text" id="uname" name="uname" class="form-control" required>
                        <label for="uname">Username</label>
                    </div>

                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" id="pass" name="pass" class="form-control" required>
                        <label for="pass">Your password</label>
                    </div>

                    <div class="text-center mt-2">
                        <button class="btn btn-info" name="login" type="submit">Log in <i class="fa fa-sign-in ml-1"></i></button>
                      
                    </div>
                </form>
                    <p><a href="#" class="float-right">Forgot Password?</a></p>
            </div>
             
            <!--Footer-->
            <!--<div class="modal-footer">
                <div class="options text-center text-md-right mt-1">
                    <p>Not a member? <a href="#">Sign Up</a></p>
                    <p><a href="#">Forgot Password?</a></p>
                </div>
                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>-->
        </div>
        <!--/.Content-->
    </div>
</div>
<!--// LOGIN FORM MODAL //-->
</main>

 <!--=========FOOTER=========-->
<footer class="page-footer" style="background-color: rgba(51, 187, 255,0.1);bottom: 0px;position: fixed;width: 100%;">
          <div class="footer-copyright" >
            <div class="container center" >
            © 2017 Copyright reserved | Sri Eshwar College of Engineering
            </div>
          </div>
</footer>

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
