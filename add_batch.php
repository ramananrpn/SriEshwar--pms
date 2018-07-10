<?php
 include("db-connection.php");
if(isset($_POST['signup']))
{
    if (empty($_POST['batch'])) 
    {
        ?>
                        <script>
                        alert("Please Fill The Details");
                        </script>
        <?php
         }

    else
    {   
         $batch = $_POST['batch'];
       $s = "INSERT INTO batch(batch_no) VALUES ('$batch')";

            if($conn->query($s)===TRUE)
            {
                ?>
                    <script language="javascript">
                         alert("Batch added")
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
<div class="container" style="margin-top: 50px;width: 500px;">
    <form method="POST" action="">
    <div class="md-form">
    <input value=" " type="text" id="batch" name="batch" class="form-control"  data-toggle="tooltip" data-placement="top" title="year-of-start to year-of-ending" style="font-size: 20px;">
        <p style="color: rgb(38, 38, 38);font-size: 18px;">&nbsp;**FORMAT  : year-of-start to year-of-ending[2016 - 2020]**</p>
    <label class="active" for="batch" style="font-size: 20px;">Enter Batch</label>            
    </div>

      <div class="text-center">
        <button class="btn btn-deep-orange" type="submit" name="signup" id="signup">Add Batch</button>
    </div>
    </form>
    </div>

    
<!--tooltips-->
<script type="text/javascript">
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
</script>

</body>
  <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>


</body>

</html>