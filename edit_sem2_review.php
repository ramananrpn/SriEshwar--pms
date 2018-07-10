<?php
session_start();
if($_SESSION['staff_login_flag']==0)
    header("location:index.php");
else
$un=$_SESSION['login_user'];
/*project ID*/
   if(isset($_REQUEST["id"]))
    {
        $pid= $_REQUEST["id"];
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
   <nav class="mb-1 navbar navbar-expand-lg navbar-dark cyan" style="height: 60px;">

                <a class="navbar-brand" href="#">

                <img class="img-fluid float-left img-responive width-res" src="img/sece-logo.png"  style="height: 40px;width: 200px"></a>
                
                  <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse cyan" id="navbarSupportedContent">
<ul class="navbar-nav" style="font-size: 17px;">
            <li class="nav-item">
                <a class="nav-link" href="staffpage.php" ">Home</a>
            </li>
            <li class="nav-item ">
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
                
                   
<iframe height=" auto 100% " width="100%" src="edit_isem2form.php?id=<?php echo $pid; ?>" name="iframe_a" style="margin-top: -5px; " onload="resizeIframe(this)" ></iframe>

            </main>
<script type="text/javascript">
    

  function resizeIframe(obj) {
    var x = obj.contentWindow.document.body.scrollHeight+15;
    obj.style.height = x +'px';
  }
</script>
</script>
<footer class="page-footer" style="background-color: rgba(51, 187, 255,0.6);bottom: 0px;width: 100%;margin-top: -13px;">
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
