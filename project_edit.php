<?php
session_start();

if($_SESSION['staff_login_flag']==0)
    header("location:index.php");
else
$un=$_SESSION['login_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SriEhwarPms | Project</title>

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<style type="text/css">
    
    .width-res{
        width: auto;
    }
    .centerpg {
    position: absolute;
   
    height: 50px;
    top: 50%;
   
    margin-left: -50px; /* margin is -0.5 * dimension */
    margin-top: -50px; 
}​
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
    <div class="collapse navbar-collapse cyan" id="navbarSupportedContent">
<ul class="navbar-nav" style="font-size: 17px;">
            <li class="nav-item ">
                <a class="nav-link" href="staffpage.php" >Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="staff-iframe.php">Create Project</a>
            </li>
             <li class="nav-item ">
                <a class="nav-link" href="add_review.php">Add Review Report</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">View/Edit Projects</a>
            </li>
        </ul>
                    
                        
                    <ul class="navbar-nav ml-auto">
                    
                        <li class="nav-item" style="margin-right: 20px;margin-top: 6px; ">
                          <h5><strong> Welcome <?php echo $un; ?></strong></h5>        

                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off" style=""></i> LOG OUT</a>
                        </li>
                       
                    </ul>
               </div>
            </nav>
            <!--/.Navbar -->


            <main>
                 <div class="container text-center" style="margin-top: 40px;">
    <?php
         include("db-connection.php");
         $run=mysqli_query($conn,"SELECT * from project_details where creator='".$un."'");
            if(mysqli_num_rows($run)>0){
                ?><table class="table table-hover" style=""> 
                <?php
                $c=1;
                 while($res=mysqli_fetch_assoc($run))
                        {    
                            ?><tr><?php  
                                ?>

                                <!--<td style="font-size: 20px;width: 110px;" ><?php echo $res['proj_id'] ;?></td>-->
                                <td style="font-size: 20px;width: 110px;" ><?php echo $c++ ;?></td>
                                <td style="font-size: 20px;"><?php echo $res['project_title'] ;?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-info waves-effect" onclick="window.location='edit_projdetails.php?id=<?php echo $res['proj_id'];?>'">Team Details</button>
                                </td>
                                <td style="">
                                <?php
                                if (!empty($res['sem1_rev1'])||!empty($res['sem1_rev2'])||!empty($res['sem1_rev3'])) {
                                ?>
                                <button type="button" style="" class="btn btn-outline-info waves-effect" onclick="window.location='edit_review_form.php?id=<?php echo $res['proj_id'];?>'">SEMESTER 7 Report</button>
                               <?php
                                 }
                                 
                                ?>
                                 <?php
                                if (!empty($res['sem2_rev1'])||!empty($res['sem2_rev2'])||!empty($res['sem2_rev3'])) {
                                ?>
                                <button type="button" class="btn btn-outline-info waves-effect" onclick="window.location='edit_sem2_review.php?id=<?php echo $res['proj_id'];?>'">SEMESTER 8 Report</button>
                                 <?php
                                 }
                                 
                                ?>
                                
                               </tr><?php
                               // echo '<br>';

                            }
                            ?></table><?php
                                }
            else{
                ?>
                <h1 class="text-center centerpg" style="color: grey;opacity: 0.5;font-size: 60px;">No Projects Added</h1>

                <?php
            }
    ?>

        </div>
        <!--<div id="blank" style="height:100px;width:100%;"></div>-->
            </main>

<footer class="page-footer" style="background-color: rgba(51, 187, 255,0.6);bottom: 0px;position: ;width: 100%;z-index: 999;">
          <div class="footer-copyright" >
            <div class="container center" >
            © 2017 Copyright reserved | Sri Eshwar College of Engineering
            </div>
          </div>
</footer>
    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="js/mdb.js"></script>


</body>

</html>
