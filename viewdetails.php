<?php

include("db-connection.php");
$pmsid = $_REQUEST["pmsid"];

?>


<html>
<head>
<title>view full details </title>

<!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
      <style type="text/css">
       
      </style>
  <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="js/mdb.js"></script>

  
</head>
<body>
<button type="button" class="btn btn-outline-secondary btn-rounded waves-effect" style="position: fixed; bottom: 0px;right: 0px;top: 10px;height: 50px; 
border-radius: 100px;" onclick="printpg('viewdetails');"><i class="fa fa-print" style="font-size: 30px;top: 25px;right: 30px;position: fixed;"></i></button>

<?php
  $selid = "SELECT * FROM project_details WHERE proj_id='".$pmsid."'";
  $runid=mysqli_query($conn,$selid);
    
    if(mysqli_num_rows($runid)>0)
    {
        $pms=mysqli_fetch_assoc($runid);
    }
  $selid_mem = "SELECT * FROM team_details WHERE proj_id='$pmsid'";
  $runid_mem=mysqli_query($conn,$selid_mem);
    
    if(mysqli_num_rows($runid_mem)>0)
    {
        $pms_mem=mysqli_fetch_assoc($runid_mem);
    }

?>
<div id="viewdetails">

<table class="table table-responsive table-bordered " >
  <tr>
  <th colspan="2" style="font-size: 25px;"><center><?php echo $pms['project_title'] ;?></center></th>
  </tr>
  <tr>
  <th  style="width:300px;"><strong>  CATEGORY :</strong>  <?php echo $pms['project_category'];?> </th>
  <th> <strong> DOMAIN :</strong>   <?php echo $pms['domain_name'];?></th>
  </tr>
  <tr>
  <th style="width:300px;"> <strong>Team Members :</strong></th>
  <th><?php echo $pms_mem['Team_members'];?></th>
  </tr>
  <tr>
  <th style="width:300px;"><strong> Project Guide :</strong></th>
  <th><?php echo $pms['project_guide'];?></th>
  </tr>
  <th style="width:300px;"> <strong> BUDGET OF THE PROJECT :</strong>  </th>
  <th> <?php echo $pms['estimated_budget'];?></th>
  </tr>
 
</table>

<!--Card-->
<center><div class="card" style="width:500px;height:auto">
<!--Card content-->
    <div class="card-body">
        <!--Title-->
        <h4 class="card-title"><center><strong> ABSTRACT</strong> </center></h4>
        <!--Text-->
        <p class="card-text"> <?php echo $pms['Abstract'];?></p>
    </div>

</div>
<br><br>
</center>
<!--/.Card-->
<center><h4><b>REVIEW REPORT [PHASE-1]</b></h4></center>
<center><table class="table table-responsive table-bordered" style="width:800px;">
<thead>
  <tr>
  <th><center>ZEROTH REVIEW </center></th>
  <th><center> REVIEW 1</center></th>
  <th><center> REVIEW 2</center></th>
  <th><center> REVIEW 3</center></th>
  </tr>
</thead>
<tbody>
<tr>
<td><center> <?php echo $pms['sem1_zero_rev'];?></center></td>
<td><center> <?php echo $pms['sem1_rev1'];?></center></td>
<td><center> <?php echo $pms['sem1_rev2'];?></center></td>
<td><center> <?php echo $pms['sem1_rev3'];?></center></td>
</tr>
<tr>
<td>Comment :<br><?php echo $pms['com_zero'];?></td>
<td>Comment :<br><?php echo $pms['com_one_sem1'];?></td>
<td>Comment :<br><?php echo $pms['com_two_sem1'];?></td>
<td>Comment :<br><?php echo $pms['com_three_sem1'];?></td>
</tr>
<tr>
<td><img src='<?php echo "uploads/".$pms['sem1_rev1_pic'];  ?>' class="img-fluid"/></td>
<td><img src='<?php echo "uploads/".$pms['sem1_rev1_pic'];  ?>' class="img-fluid"/></td>
<td><img src='<?php echo "uploads/".$pms['sem1_rev2_pic'];  ?>' class="img-fluid"/></td>
<td><img src='<?php echo "uploads/".$pms['sem1_rev3_pic'];  ?>' class="img-fluid"/></td>
</tr>
</tbody>
</table>  
</center>   


<center><h4><b>REVIEW REPORT [PHASE-2]</b></h4></center>
<center><table class="table table-responsive table-bordered" style="width:800px;">
<thead>
  <tr>
  
  <th><center> REVIEW 1</center></th>
  <th><center> REVIEW 2</center></th>
  <th><center> REVIEW 3</center></th>
  </tr>

</thead>
<tbody>
<tr>
<td><center> <?php echo $pms['sem2_rev1'];?></center></td>
<td><center> <?php echo $pms['sem2_rev2'];?></center></td>
<td><center> <?php echo $pms['sem2_rev3'];?></center></td>
</tr>
<tr>
<td>Comment :<br> <?php echo $pms['com_one_sem2'];?></td>
<td>Comment :<br> <?php echo $pms['com_two_sem2'];?></td>
<td>Comment :<br> <?php echo $pms['com_three_sem2'];?></td>
</tr>
<tr>
<td><img src='<?php echo "uploads/".$pms['sem2_rev1_pic'];  ?>' class="img-fluid"/></td>
<td><img src='<?php echo "uploads/".$pms['sem2_rev2_pic'];  ?>' class="img-fluid"/></td>
<td><img src='<?php echo "uploads/".$pms['sem2_rev3_pic'];  ?>' class="img-fluid"/></td>
</tr>
</tbody>
</table>   
 </center>   

</div>
<!--<div>
<input type="button" name="print" id="print" value="Print" onclick="printpg('viewdetails');"/>

</div>-->

<script>
function printpg(el)
{
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById("viewdetails").innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML=restorepage;
}
</script>      
</body>
</html>