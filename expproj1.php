<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMS | Explore Projects</title>

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
    window.frames["iframe_a"].location = "exp_display.php?dept_sec="+depid+"&dept_name="+depname+"&batch="+bat;
   }
}

</script>   

</head>
        <style type="text/css">
            /*scrollbar*/
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
  <!--Navbar -->
            <nav class="mb-1 navbar  navbar-expand-lg navbar-dark cyan" style="z-index: 999;height: 50px;">
                <a class="navbar-brand" href="#"><img class="img-fluid float-left img-" src="img/sece-logo.png"  style="height: 40px;width: 220px;margin-top: -10px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                  
                         <li class="nav-item ">
                            <a class="nav-link" href="index.php" style="background-color: #37aec8"><i class="fa fa-arrow-left mr-2" style=""></i>BACK TO HOME</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--/.Navbar -->
             <header style="margin-top: -7px;"  class=""  >
        <nav>
                            </div>
 <div >                 
<select id="dark" style="margin-top: 9px;margin-left: 5px;" name="dark" >
     <option disabled="" selected="">Select Batch</option>
   <?php
     include("db-connection.php");
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
    <iframe height=" auto 100% " width="100%" src="expproj_home.php" name="iframe_a" style="margin-top: 0px; " onload="resizeIframe(this)" ></iframe>

    <script type="text/javascript">
    

  function resizeIframe(obj) {
    var x = obj.contentWindow.document.body.scrollHeight+200;
    obj.style.height = x +'px';
  }
</script>
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

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="js/mdb.js"></script>


</body>

</html>