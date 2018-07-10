<?php
 include("db-connection.php");
session_start();
if($_SESSION['staff_login_flag']==0)
    header("location:index.php");
else{
$un=$_SESSION['login_user'];
 $q=mysqli_query($conn,"SELECT * from login_users where userid='".$un."'");
                    $rows = mysqli_num_rows($q);
                    if($rows==1)
                    {
                        $staff=mysqli_fetch_assoc($q);
                    }
}
?>

<?php
if(isset($_POST['passsub']))
{
    $old = $_POST['old'];
    if($staff['password']==$old)
    {
        $new = $_POST['new'];
        $newcon=$_POST['newcon'];
        if ($new==$newcon) 
        {
            $passq = "UPDATE login_users SET password = '".$new."' WHERE userid = '".$staff['userid']."'";
             if(mysqli_query($conn,$passq))
             {
                ?>
        <script type="text/javascript">
            alert("Password Changed Successfully");
        </script>
        <?php
             }
             else
             {
               ?>
        <script type="text/javascript">
            alert("Password Not Changed : ERROR");
        </script>
        <?php  
             }
        }
         
        else
        {
             ?>
        <script type="text/javascript">
            alert("New Password & confirm password do not match");
        </script>
        <?php
        }
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert("Your Current Password is Wrong . Please Fill the Correct Password.");
        </script>
        <?php
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SriEhwarpms-staff</title>

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
       <!-- ICON-->
    <link rel="shortcut icon" type="image/x-icon" href="img/ss.png" />
</head>
<style type="text/css">
    
    .width-res{
        width: auto;
    }

    body{
        overflow-x: hidden;
        overflow-y: auto;
    }
     ::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

    ::-webkit-scrollbar
{
    width: 10px;
    background-color: #F5F5F5;
}

    ::-webkit-scrollbar-thumb
{
    background-color: #0ae;
    
    background-image: -webkit-gradient(linear, 0 0, 0 100%,
                       color-stop(.5, rgba(255, 255, 255, .2)),
                       color-stop(.5, transparent), to(transparent));
}

</style>

<body>

   <nav class="mb-1 navbar navbar-expand-lg navbar-dark cyan" style="height: 70px;">

                <a class="navbar-brand" href="#">

                <img class="img-fluid float-left img-responive width-res" src="img/sece-logo.png"  style="height: 50px;width: 220px"></a>
                
                  <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse cyan" id="navbarSupportedContent" style="z-index: 999">
<ul class="navbar-nav" style="font-size: 17px;z-index: 999;">
            <li class="nav-item active">
                <a class="nav-link" href="#" >Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="staff-iframe.php">Create Project</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="add_review.php">Add Review Report</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="project_edit.php">View/Edit Projects</a>
            </li>
           
           
        </ul>

                    <ul class="navbar-nav ml-auto">
                    
                        

                        <li class="nav-item" style="margin-right: 10px;margin-top: 6px; ">
                          <h5><strong> Welcome <?php echo $un; ?></strong></h5>        

                        </li>
                        <li class="nav-item active" style="margin-right: 10px; ">
                           <a class="nav-link" href="#passchange" data-toggle="modal" data-target="#passchange">Change Password</a>
                           

                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off" style=""></i> LOG OUT</a>
                        </li>
                         
                       
                    </ul>
               </div>
            </nav>
            <!--/.Navbar -->

            
<!--CHANGE PASSWORD MODAL-->
           
<div class="modal fade" id="passchange" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header light-blue darken-3 white-text">
                <h4 class="title"> Change Password</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mb-0">
                <form method="post" action="">
                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="old" name="old" class="form-control" required autocomplete="off">
                    <label for="old">Current Password</label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="new" name="new" class="form-control" required autocomplete="off">
                    <label for="new">New Password</label>
                </div>
                 <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    <input type="password" id="newcon" name="newcon" class="form-control" required>
                    <label for="newcon"   data-error="Password not match" data-success="Password Match">Confirm Password</label>
                </div>

                <div class="text-center mt-1-half">
                    <button class="btn btn-info mb-1" id="passsub" name="passsub" type="submit">Submit <i class="fa fa-check ml-1"></i></button>
                </div>
            </form>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal:CHANGE PASSWORD -->

            <main>

                
                    <div class="row text-center" style="position: relative;display: block;margin-top: 90px;top: 50%;bottom: 50%;z-index: 9" >

                    <img class=" img-fluid" src="img/welcome.png " style="height: 160px;"  > <span style="font-size: 70px;position: relative;top: 16px;color: rgb(51, 173, 255)"><strong><?php echo ucwords($staff['username']); ?> !</strong></span>
                    </div>
                    <br><br>
                    <div class="row text-center" style="display: block;z-index: 9">                               
                    <button type="button" class="btn btn-outline-primary waves-effect" onclick="window.location='staff-iframe.php'">Create Project</button>
                    <button type="button" class="btn btn-outline-secondary waves-effect" onclick="window.location='add_review.php'">Add Review Report</button>

                    <button type="button" class="btn btn-outline-default waves-effect" onclick="window.location='project_edit.php'">View / Edit Project</button>
                    </div>
                   
                   

            </main>

<footer class="page-footer" style="background-color: rgba(51, 187, 255,0.6);bottom: 0px;position: fixed;width: 100%;">
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

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="js/mdb.js"></script>


</body>

</html>
