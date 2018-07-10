<?php
session_start();
include("db-connection.php");
if($_SESSION['dean_login_flag']==0)
    header("location:index.php");
else
$un=$_SESSION['login_user'];
$q=mysqli_query($conn,"SELECT * from login_users where userid='".$un."'");
                    $rows = mysqli_num_rows($q);
                    if($rows==1)
                    {
                        $dean=mysqli_fetch_assoc($q);
                    }
?>
<?php
if(isset($_POST['passsub']))
{
    $old = $_POST['old'];
    if($dean['password']==$old)
    {
        $new = $_POST['new'];
        $newcon=$_POST['newcon'];
        if ($new==$newcon) 
        {
            $passq = "UPDATE login_users SET password = '".$new."' WHERE userid = '".$dean['userid']."'";
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
    <title>SECE-PMS | Dean</title>

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!--==deptnavbar css==-->
    <link href="css/deptnavbar.css" rel="stylesheet">
       <!-- ICON-->
    <link rel="shortcut icon" type="image/x-icon" href="img/ss.png" />
     <script>
function display(depid,depname)
{
    
    var bat = document.getElementById("dark").value;
    if(bat=="Select Batch")
    {
         alert("Please Select Batch"); 
    }
    else{
    window.frames["iframe_a"].location = "dean_display.php?dept_sec="+depid+"&dept_name="+depname+"&batch="+bat;
   }
}

</script>   
</head>
<style type="text/css">
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
   <nav class="mb-1 navbar  navbar-expand-lg navbar-dark cyan" style="z-index: 999;height: 60px;">
                <a class="navbar-brand " href="#">

                <img class="img-fluid float-left" src="img/sece-logo.png"  style="height: 40px;width: 190px;"></a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse cyan" id="navbarSupportedContent">

                    <ul class="navbar-nav ml-auto navbar-right  " >
                        <li class="nav-item" style="margin-right: 20px;margin-top: 6px; ">
                          <h5><strong> Welcome <?php echo $un; ?></strong></h5>        

                        </li>
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
             <header style="margin-top: -7px;"  class=""  >
        <nav>
                            </div>
 <div >                 
<select id="dark" style="margin-top: 9px;margin-left: 5px;font-size: 20px;" name="dark" >
     <option disabled="" selected="">Select Batch</option>
   <?php
     
        $bat = "SELECT * FROM batch";
        $res_bat = $conn->query($bat);
        if($res_bat->num_rows > 0 )
        {
            while( $row = mysqli_fetch_assoc($res_bat))
                    {
                        $batch_name = $row["batch_no"];
    ?>
       
        <option><?php echo $batch_name; ?></option>   
    <?php
                    }
        }

     ?>
</select>
               </div> 
                <div style="margin-left: 22px;"> 
                        <a>CSE</a>
                        <div>
                                <a name="A" id="A" onclick="display(this.id,'cse');" target="iframe_a">CSE A</a>
                                <a name="B" id="B" onclick="display(this.id,'cse');">CSE B</a>
                                <a name="C" id="C" onclick="display(this.id,'cse');">CSE C</a> 
                        </div>
                </div>
               
                <div>
                        <a>ECE</a>
                        <div>
                                <a name="A" id="A" onclick="display(this.id,'ece');">ECE A</a>
                                <a name="B" id="B" onclick="display(this.id,'ece');">ECE B</a>
                                <a name="C" id="C" onclick="display(this.id,'ece');">ECE C</a>
                               
                        </div>
                </div>
                <div>
                        <a>EEE</a>
                        <div>
                                <a name="A" id="A" onclick="display(this.id,'eee');">EEE A</a>
                                <!--<a name="B" id="B" onclick="display(this.id,'eee');">EEE B</a>
                                <a name="C" id="C" onclick="display(this.id,'eee');">EEE C</a>-->
                                
                        </div>
                </div>
                <div>
                        <a id="" onclick="display(this.id,'civil');">CIVIL</a>
                        <!--<div>
                               <a name="A" id="A" onclick="display(this.id,'civil');">CIVIL A</a>
                                <a name="B" id="B" onclick="display(this.id,'civil');">CIVIL B</a>
                                <a name="C" id="C" onclick="display(this.id,'civil');">CIVIL C</a>
                                
                        </div>-->
                </div>
                <div>
                        <a>MECH</a>
                        <div>
                                <a name="A" id="A" onclick="display(this.id,'mech');">MECH A</a>
                                <a name="B" id="B" onclick="display(this.id,'mech');">MECH B</a>
                                <!--<a name="C" id="C" onclick="display(this.id,'mech');">MECH C</a>-->
                                
                        </div>
                </div>
                 <div>
                        <a><span>DOMAIN</span> EXPERT</a>
                        <div>
                                <a href="domain expert/CSE.pdf">CSE</a>
                                <a>ECE</a>
                                <a>EEE</a>
                                <a href="domain expert/civil.pdf">CIVIL</a>
                               <a>MECH</a>
                        </div>

 
        </nav>
</header>
<main>
    <iframe height=" auto 100% " width="100%" src="dean_home.php?id=<?php echo $un ;?>" name="iframe_a" style="margin-top: 0px; " onload="resizeIframe(this)" ></iframe>

    <script type="text/javascript">
    

  function resizeIframe(obj) {
    var x = obj.contentWindow.document.body.scrollHeight+300;
    obj.style.height = x +'px';
  }
</script>

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
                    
                    <input type="password" id="old" name="old" class="form-control" required autocomplete="off">
                    <label for="old">Current Password</label>
                </div>
                <div class="md-form form-sm">
                 
                    <input type="password" id="new" name="new" class="form-control" required autocomplete="off">
                    <label for="new">New Password</label>
                </div>
                 <div class="md-form form-sm">
                    
                    <input type="password" id="newcon" name="newcon" class="form-control" required>
                    <label for="newcon"   data-error="Password not match" data-success="Password Match">Confirm Password</label>
                </div>

                <div class="text-center mt-1-half">
                    <button class="btn btn-info mb-1" id="passsub" name="passsub" type="submit">Change <i class="fa fa-check ml-1"></i></button>
                </div>
            </form>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal:CHANGE PASSWORD -->
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
