<?php
 include("db-connection.php");
session_start();
if($_SESSION['dean_login_flag']==0)
    header("location:index.php");
else
{
$un=$_SESSION['login_user'];
 $q=mysqli_query($conn,"SELECT * from login_users where userid='".$un."'");
                    $rows = mysqli_num_rows($q);
                    if($rows==1)
                    {
                        $dean=mysqli_fetch_assoc($q);
                    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
</head>
<style type="text/css">
	

.img-res{
    max-width:100% !important;
    height:auto;
    display:block;
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
<div class="row text-center" style="display: block;margin-top: 150px;" >
                    <img class=" img-fluid" src="img/welcome.png " style="height: 180px;"  > <span style="font-size: 90px;position: relative;top: 16px;color: rgb(51, 173, 255)"><strong><?php echo ucwords($dean['username']);?>!</strong></span>
                    </div>
</body>
</html>