<?php
include("db-connection.php");

        $sec   = $_REQUEST["dept_sec"];
       $dept  = $_REQUEST["dept_name"];
         $batch= $_REQUEST["batch"];
  
  ?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Display Projects</title>
  
  <link rel="stylesheet" href="css/disp.css">
  <!--<link rel="stylesheet" href="css/diplay_link_btn.css">-->
  
      <link rel="stylesheet" href="css/table.css">

<style>
a,
a:visited {
  text-decoration: none;
  color: #00AE68;
}

.clear {
  clear: both;
}


a.button {
  display: block;
  position: relative;
  float: left;
  width: 100px;
  padding: 0;
  margin: 10px 20px 10px 0;
  font-weight: 300;
  text-align: center;
  line-height: 30px;
  color: #FFF;
  border-radius: 5px;
  transition: all 0.2s ;
}

.btnBlueGreen {
  background: #00AE68;
}

.btnFade.btnBlueGreen:hover {
  background: #21825B;
  
}
tr:hover {
  background-color:rgba(77, 160, 255,0.6);
   width:100%;


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
.hide{
  display: none;
}

</style>    
  
</head>

<body>
  <section>
  <!--for demo wrap-->
  
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" style="" >
      <thead>
        <tr>
          <!--<th style="width: 70px;"> S.No </th>-->
           <th class=""> Project ID </th>
          <th style="width: 160px;">Project Team<br>Members </th>
         
          <th style="width: 160px;"> Project Title  </th>
          <th style="width: 160px;"> Name of the Guide </th>
      <!--<th> Abstract </th>-->
          <th style="width: 100px;"> Category </th>
          <th> Completed<br>so far<br>(%) </th>
          <th> Estimated Budget  </th>
          <th > Expected Outcome </th>
      <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
    <?php


$sel_pro_det = "Select * from project_details where dept_name='".$dept."' AND sec = '".$sec."' AND batch_no = '".$batch."'";
$result=$conn->query($sel_pro_det);


    if ($result->num_rows > 0 )
    { 
       $i = 1;
  while ( $row = mysqli_fetch_assoc($result))
  {
    $abs = substr($row["Abstract"],0,50);
    $pid = $row["proj_id"];
   
    $sel_pro_mem = "select * from  team_details where proj_id = '$pid' ";
    $res=$conn->query($sel_pro_mem);
     if ($res->num_rows > 0 )
    { 
    while ( $tm= mysqli_fetch_assoc($res))
      {
    
   
    ?>
        <tr>
          <!--<td style="width: 80px;"> <?php echo $i; ?> </td>-->
           <td class=""> <?php echo $pid; ?> </td>
          <td style="width: 190px;"> <?php echo $tm["Team_members"]; ?> </td>
         
          <!--<input type="hidden" name="pms_id" id="pms_id" value="<?php echo $pid; ?>">-->
          <td style="width: 160px;"> <?php echo $row["project_title"]; ?> </td>
          <td style="width: 160px;"> <?php echo $row["project_guide"]; ?> </td>
      
          <td style="width: 120px;"> <?php echo $row["project_category"]; ?> </td>
          <td> <?php echo $row["com_so_far"]; ?></td>
          <td> <?php echo $row["estimated_budget"]; ?> </td>
          <td style="width: 120px;"> <?php echo $row["expected_outcome"]; ?> </td>
      <!--<td><a id="view"  onclick="check(this);" class="button btnFade btnBlueGreen"><b style="font-size:12px;text-decoration: underline;">view full details</b></a>
      </td>-->
      <td id="view"  style="font-size:12px;text-decoration: underline;" onclick="check(this);"><a class="button btnFade btnBlueGreen">view full details</a></td>
        </tr>
        <!--==========SCRIPT TO GET ID FOR VIEW DETAILS===-->
        <script language="JavaScript">
  function check(ele)
  {
    var parent = ele.parentNode;
    //alert(parent);
    var mychild = parent.children;
    //alert(mychild);
    var h = mychild[0].innerText;
    //alert(h);
    //var h =document.getElementById('pms_id').value;
    //alert(h);
    window.location="viewdetails.php?pmsid="+h;
  }
  
  </script>
    <?php
      }
    }
    $i++;
  }
    }
    else

    {
      ?>
      <h1 class="text-center" style="text-align: center;color: rgba(51, 133, 255 , 0.5);margin-top: 50px; "> No Projects Done </h1>
      <?php
    }
?>
      </tbody>
    
    </table>
  </div>
</section>


<!-- follow me template -->

  <script src='js/disp.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
