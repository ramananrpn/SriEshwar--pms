<?php
include("db-connection.php");

        $sec   = $_REQUEST["dept_sec"];
       $dept  = $_REQUEST["dept_name"];
         $batch= $_REQUEST["batch"];
  
  ?>
<?php
if (isset($_REQUEST["add"])) {
  /*$fed = $_REQUEST["fed"];
   $id=$_REQUEST["mid"];*/
   echo $fed;
   echo $id;
  $q = "UPDATE project_details SET dean_comment = '".$fed."' WHERE proj_id='".$id."'";

       if (mysqli_query($conn, $q)) 
       {

       ?>
                        <script>
                        alert("Feedback Added Succesfully");
                        </script>
        <?php
       } 
      else
      {
      echo "Error updating report: " . mysqli_error($conn);
      }
}


?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Display Projects</title>
  

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
  width: 90px;
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
    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" style="">
      <thead>
         <tr>
          <!--<th style="width: 80px;"> S.No </th>-->
           <th> Project ID </th>
          <th style="width: 190px;">Project Team<br>Members </th>
          <th style="width: 160px;"> Project Title  </th>
          <th style="width: 160px;"> Name of the Guide </th>
      <!--<th> Abstract </th>-->
          <th style="width: 120px;"> Category </th>
          <th> Completed<br>so far<br>(%) </th>
          <th> Estimated Budget  </th>
          <th > Expected Outcome </th>
		  <th></th>
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
           <td> <?php echo $pid; ?> </td>
          <td style="width: 190px;"> <?php echo $tm["Team_members"]; ?> </td>
         
          <td style="width: 160px;"> <?php echo $row["project_title"]; ?> </td>
          <td style="width: 160px;"> <?php echo $row["project_guide"]; ?> </td>
      <!--<td style="width:150px;"> <?php echo $abs; ?> </td>-->
          <td style="width: 120px;"> <?php echo $row["project_category"]; ?> </td>
          <td> <?php echo $row["com_so_far"]; ?></td>
          <td> <?php echo $row["estimated_budget"]; ?> </td>
          <td style="width: 120px;"> <?php echo $row["expected_outcome"]; ?> </td>
		  <td id="view"  style="font-size:12px;text-decoration: underline;" onclick="check(this);"><a class="button btnFade btnBlueGreen" style="color: white;">view full details</a></td>
      
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
    
    window.location="viewdetails.php?pmsid="+h;
  }
  
  </script>
   <td   >
        <a  class="button btnFade btnBlueGreen showmodal" href="#" data-toggle="modal" data-target="#feedmodal" id="<?php echo $row['proj_id']?>" style="background-color: #9900ff" ><b style="font-size:10px;color: white;" >Add Comment</b></a>
      </td>
         
       
        <!--Modal: Comment form-->
<div class="modal fade" id="feedmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header light-blue darken-3 white-text">
                <h4 class="title"><i class="fa fa-pencil"></i>Comment/Feedback </h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mb-0" >
            
            <form method="POST" action="">
                <div class="md-form form-sm">
                    <i class="fa fa-pencil prefix"></i>
                    <textarea type="text" id="fed" name="fed" class="md-textarea mb-0"></textarea>
                    <label for="fed">Comment/Feedback </label>
                    <input type="hidden" name="mid" id="mid" value="<?php echo $row['proj_id']?>" >
                </div>

                <div class="text-center mt-1-half">
                    <button class="btn btn-info" type="submit" name="add" id="add"
                    >Add Comment </button>
                </div>
                </form>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Comment form-->
        </tr>
              
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


<!-- -->
 <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

  <script src='js/disp.js'></script>

    <script src="js/index.js"></script>
     <!--AXAJ FOR ADD COMMENT-->

           <!--MODAL AJAX-->
      <script type="text/javascript">
 $(document).ready(function(){  
      $('.showmodal').click(function(){  
           var p_id = $(this).attr("id");  
            
           $.ajax({  
                url:"update_comment.php",  
                method:"post",  
                 dataType:"json",
                data:{p_id:p_id},  
                success:function(data){  
                   console.log(data);
                
                     $('.modal-body #fed').innerHTML(data.dean_comment);  
                    $('.modal-body #mid').innerHTML(data.proj_id);  
                    
                     $('#feedmodal').modal("show");  
                }  
           });  
      });  
 });  

</script>

        <!--AXAJ FOR ADD COMMENT-->  
</body>
</html>
