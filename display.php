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
  
      <link rel="stylesheet" href="css/styles2.css">

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
  
</head>

<body>
  <section>
  <!--for demo wrap-->
  
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" >
      <thead>
        <tr>
          <th> S.No </th>
          <th> Project<br>Team Members </th>
          <th> Project ID </th>
          <th> Project Title  </th>
          <th> Name of the Guide </th>
		  <th> Abstract </th>
          <th> Category </th>
          <th> Completed<br>so far<br>(%) </th>
          <th> Estimated Budget  </th>
          <th> Expected Outcome </th>
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
  while ( $row = mysqli_fetch_assoc($result))
  {
	  $abs = substr($row["Abstract"],0,50);
	  $pid = $row["proj_id"];
	  $i = 1;
	  $sel_pro_mem = "select * from  team_details where proj_id = '$pid' ";
	  $res=$conn->query($sel_pro_mem);
	   if ($res->num_rows > 0 )
	  { 
		while ( $tm= mysqli_fetch_assoc($res))
			{
		
	 
	  ?>
        <tr>
          <td> <?php echo $i; ?> </td>
          <td> <?php echo $tm["Team_members"]; ?> </td>
          <td> <?php echo $pid; ?> </td>
          <td> <?php echo $row["project_title"]; ?> </td>
          <td> <?php echo $row["project_guide"]; ?> </td>
		  <td style="width:150px;"> <?php echo $abs; ?> </td>
          <td> <?php echo $row["domain_name"]; ?> </td>
          <td> <?php echo $row["com_so_far"]; ?> </td>
          <td> <?php echo $row["estimated_budget"]; ?> </td>
          <td> <?php echo $row["expected_outcome"]; ?> </td>
		  <td><a href="staffpage.php" class="button btnFade btnBlueGreen"><b style="font-size:12px;text-decoration: underline;">view full details</b></a>
		  </td>
        </tr>
        
	  <?php
			}
	  }
	  $i++;
  }
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
