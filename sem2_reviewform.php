<?php
session_start();
include("db-connection.php");
/*project ID*/
   if(isset($_REQUEST["id"]))
    {

        $pid= $_REQUEST["id"];
    }
    ?>
    <?php

    $sql="SELECT * from project_details where proj_id='$pid'";
    $run=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($run)>0)
    {
        $proj=mysqli_fetch_assoc($run);
    }
    ?>
    
    <!--======PHP SEM 2 REVIEW 1====-->
    <?php
    if(isset($_REQUEST["add1"]))
    {
        $file = $_FILES["pic1"]["name"];
        $path="uploads/".$file;
        $tmp_name=$_FILES["pic1"]["tmp_name"];
        move_uploaded_file($tmp_name,$path);
        $status = $_POST["status"];
        $pic1=$_POST["pic1"];
        $rev1 =$_POST["rev1"];
        $comp = $_POST["comp"];
		$com_one_sem2 = $_POST["com_one_sem2"];
        $review = "UPDATE project_details SET project_status='".$status."',sem2_rev1 = '".$rev1."', sem2_rev1_pic = '".$file."',sem2_competition = '".$comp."' , com_one_sem2 = '".$com_one_sem2."' WHERE proj_id='$pid'";

       if (mysqli_query($conn, $review)) 
       {
       echo "Report updated successfully";
       header("Refresh:0");
       } 
      else
      {
      echo "Error updating report: " . mysqli_error($conn);
      }
    }
?>
<!--======PHP FOR REVIEW 2===========-->
 <?php
    if(isset($_REQUEST["add2"]))
    {
        $file = $_FILES["pic2"]["name"];
        $path="uploads/".$file;
        $tmp_name=$_FILES["pic2"]["tmp_name"];
        move_uploaded_file($tmp_name,$path);       
        $pic2=$_POST["pic2"];
        $rev2 =$_POST["rev2"];
		$com_two_sem2 = $_POST["com_two_sem2"];
        $review = "UPDATE project_details SET sem2_rev2 = '".$rev2."', sem2_rev2_pic = '".$file."', com_two_sem2 = '".$com_two_sem2."' WHERE proj_id='$pid'";

       if (mysqli_query($conn, $review)) 
       {
       echo "Report updated successfully";
       header("Refresh:0");

       } 
      else
      {
      echo "Error updating report: " . mysqli_error($conn);
      }
    }
?>
<!--======PHP FOR REVIEW 3===========-->
 <?php
    if(isset($_REQUEST["add3"]))
    {
        $file = $_FILES["pic3"]["name"];
        $path="uploads/".$file;
        $tmp_name=$_FILES["pic3"]["tmp_name"];
        move_uploaded_file($tmp_name,$path);
        $pic3=$_POST["pic3"];
        $rev3 =$_POST["rev3"];
		$com_three_sem2 = $_POST["com_three_sem2"];
        $review = "UPDATE project_details SET sem2_rev3 = '".$rev3."', sem2_rev3_pic = '".$file."', com_three_sem2 = '".$com_three_sem2."' WHERE proj_id='$pid'";

       if (mysqli_query($conn, $review)) 
       {

       echo "Report updated successfully";
       header("Refresh:0");
       } 
      else
      {
      echo "Error updating repo
      rt: " . mysqli_error($conn);
      }
    }
?>

<!--======PHP FOR Final Outcome===========-->
 <?php
    if(isset($_REQUEST["add4"]))
    {
        
        $prize=$_POST["prize"];
        $patent=$_POST["patent"];
    $papers = $_POST["papers"];
    $stp=$_POST["stp"];
    $stp_det=$_POST["stp_details"];
        $final = "UPDATE project_details SET  final_prizes_won = '".$prize."', final_patent = '".$patent."', final_research = '".$papers."',   final_startup = '".$stp."', final_stp_details = '".$stp_det."' WHERE proj_id='$pid'";

       if (mysqli_query($conn, $final)) 
       {
       echo "Report updated successfully";
       header("Refresh:0");
       } 
      else
      {
      echo "Error updating report: " . mysqli_error($conn);
      }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sri Eshwar PMS</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <!--<link rel="icon" type="image/png" href="assets/img/favicon.png" />-->

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
    
</head>
<style type="text/css">
   body{
  font-size: 16px;
}

input[type="checkbox"].switch{
  appearance: none;
  width: 3.5em;
  height: 1.5em;
  background: #ddd;
  border-radius: 3em;
  position: relative;
  cursor: pointer;
  outline: none;
  transition: all .2s ease-in-out;
}

input[type="checkbox"].switch:checked{
  background: #0ebeff;
}

input[type="checkbox"].switch:after{
  position: absolute;
  content: "";
  width: 1.5em;
  height: 1.5em;
  border-radius: 50%;
  background: #fff;
  box-shadow: 0 0 .25em rgba(0,0,0,.3);
  transform: scale(.7);
  left: 0;
  transition: all .2s ease-in-out;
}

input[type="checkbox"].switch:checked:after{
  left: calc(100% - 1.5em);
}
</style>
<body>
    <div class="image-container set-full-height" style="background-image: url('assets/img/1.jpg')">

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-sm-offset-0">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                    
                        <div class="card wizard-card" data-color="orange" id="wizard">
                            
                        <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                        <?php         
                        if (empty($proj['sem2_rev1'])||empty($proj['sem2_rev2'])||empty($proj['sem2_rev3'])) {
                           
                        
                    ?>
                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                       <?php echo $proj['project_title'] ?>
                                    </h3>
                                    <!--      Tabs       -->
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                     
                                    <?php
                                        if(empty($proj['sem2_rev1']))
                                        {
                                    ?>
                                        <li><a href="#rev1" data-toggle="tab">Review I</a></li>
                                        <?php
                                        }
                                        ?>
                                        <!--<li><a href="#status" data-toggle="tab">Status</a></li>-->
                                        <?php
                                        if(empty($proj['sem2_rev2']))
                                        {
                                    ?>
                                        <li><a href="#rev2" data-toggle="tab">Review II</a></li>
                                         <?php
                                        }
                                        ?>
                                         <?php
                                        if(empty($proj['sem2_rev3']))
                                        {
                                    ?>
                                        <li><a href="#rev3" data-toggle="tab">Review III</a></li>
                                        <?php
                                        }
                                        ?>

                                         <?php
                                        if(1)
                                        {
                                    ?>
                                        <li><a href="#fc" data-toggle="tab">Final Outcome</a></li>
                                        <?php
                                        }
                                        ?>   
                                        <!--<li><a href="#review3" data-toggle="tab">Review III</a></li>-->
                                    </ul>
                                </div>
                                
                                <!--         Values of each tab          -->
                                                                
                                <div class="tab-content">
                                    
                                    <!--     Tabs for Review 1    -->
                                    
                                    <div class="tab-pane" id="rev1">
                                                <form action="#" method="post" enctype="multipart/form-data"> 
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
                                             <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Status of the Project</label>
                                                        <textarea class="form-control" type="text" name="status"></textarea>
                                                    </div>
                                                </div>											
												
												
                                            <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Competition Participated</label>
                                                        <textarea class="form-control" type="text" name="comp"></textarea>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-sm-offset-2">
                                                <div class="col-sm-5">
                                                <div class="" style="margin-top: 10px;">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Review I</label>
                                                        <select class="form-control" name="rev1">
                                                            <option disabled="" selected=""></option>
                                                            <option value="good"> Good </option>
                                                            <option value="satisfied"> satisfied </option>
                                                            <option value="bad"> Bad </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                    
                                                <div class="col-sm-offset-1" style="margin-top: 20px;">
                                                <div class="picture-container" style="text-align:center">
                                                    <div class="picture">
                                                        <img src="assets/img/quickadd.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="pic1">
                                                    </div>
                                                    
                                                </div>
                                                <label>Photosnap of the project</label>
                                            </div>
                                                    
                                                </div>                                                                                  
                                                
                                                <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Comment</label>
                                                        <textarea class="form-control" type="text" name="com_one_sem2" rows="6"></textarea>
                                                    </div>
                                                </div>
                                                </div>                                    
                                            </div>
                                       <br>
                                        <div class="col-sm-5 col-sm-offset-4" style="text-align:center;margin-top: 20px;"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add1' value='Add' />
                                        
                                        </div>
                                            
                                                    </div>
                                    </form>
                                    </div>
                                    
                                    <!--     Tabs for Review 2    -->
                                    
                                    <div class="tab-pane" id="rev2">
                                        <form action="#" method="post" enctype="multipart/form-data"> 
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
											<div class="col-sm-5 ">
										                                          
                                                <div class="">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Review II</label>
                                                        <select class="form-control" name="rev2">
                                                            <option disabled="" selected=""></option>
                                                            <option value="good"> Good </option>
                                                            <option value="satisfied"> satisfied </option>
                                                            <option value="bad"> Bad </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                          
                                               
                                                <div class="col-sm-5 col-sm-offset-4">
                                                <div class="picture-container" style="text-align:center">
                                                    <div class="picture">
                                                        <img src="assets/img/quickadd.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="pic2">
                                                    </div>
                                                    
                                                </div>
                                                 <label>Photosnap of the project</label>
                                            </div>
                                                </div>  
                                                 <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Comment</label>
                                                        <textarea class="form-control" type="text" name="com_two_sem2" rows="6"></textarea>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                       
                                        <div class="col-sm-5 col-sm-offset-4" style="text-align:center"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add2' value='Add' />
                                        </div>
                                            </div>
                                    </form>
                                    </div>
                                                
                                    <!--     Tabs for review3    -->
                                    
                                    <div class="tab-pane" id="rev3">                                    
                                            <form action="#" method="post" enctype="multipart/form-data"> 
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
											<div class="col-sm-5 ">
										                            
												
                                                <div class="">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Review III</label>
                                                        <select class="form-control" name="rev3">
                                                            <option disabled="" selected=""></option>
                                                            <option value="good"> Good </option>
                                                            <option value="satisfied"> satisfied </option>
                                                            <option value="bad"> Bad </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                     
                                                <div class="col-sm-5 col-sm-offset-4">
                                                <div class="picture-container" style="text-align:center">
                                                    <div class="picture">
                                                        <img src="assets/img/quickadd.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="pic3">
                                                    </div>
                                                    
                                                </div>
                                                 <label>Photosnap of the project</label>
                                            </div>
                                                
                                                
                                                </div>
                                                
                                                   <div class="col-sm-5 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Comment</label>
                                                        <textarea class="form-control" type="text" name="com_three_sem2" rows="6"></textarea>
                                                    </div>
                                                </div>                                    
                                            </div>
                                       
                                        <div class="col-sm-5 col-sm-offset-4" style="text-align:center"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add3' value='Add' />
                                        </div>
                                                </div>
                                    </form>
                                    </div>
                                  
             <!--     Tabs for Final outcome    -->
                                    
                                    <div class="tab-pane" id="fc">
                                        <div class="row">
                                            <form action="#" method="post" enctype="multipart/form-data"> 
                                        
                                            <div class="col-sm-10 col-sm-offset-1">
                                            
                                            <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Prizes Won</label>
                                                        <textarea class="form-control" type="text" name="prize"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Patents Applied</label>
                                                        <textarea class="form-control" type="text" name="patent"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-10 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Research Papers Published</label>
                                                        <textarea class="form-control" type="text" name="papers"></textarea>
                                                    </div>
                                                </div>
     <div class="col-sm-10 col-sm-offset-1">
      <div class="form-group label-floating">
      <center>
    <strong class="control-label">Startup Planned</strong>
     <label class="formlabel" style="color: black;margin-left: 50px;">No      
<input type="checkbox"  class="switch" value="Yes" name="stp" id="stp">                 
     <span class="lever"></span>Yes 
     </label>                            
        <input type="hidden" class="switch" value="No"  name="stp" id="stpHidden" > 
        </center>
</div>
      </div>
<div class="col-sm-10 col-sm-offset-1">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Startup Details</label>
                                                        <textarea class="form-control" type="text" name="stp_details"></textarea>
                                                    </div>
                                                </div>
<!--===========================CHECKBOX VALUE SCRIPT========================--> 
              <script type="text/javascript">
              function checkbox()
              {
                if (document.getElementById("stp").checked) {
                  document.getElementById('stpHidden').disabled=true;

                }
              }
              </script>                              
  <!--======================================-->  
                                      
                                                                                       
                  </div>
                                            
                                       
                                        <div class="col-sm-5 col-sm-offset-4" style="text-align:center"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add4' onclick="checkbox()" value='Add' />
                                        </div>
                                    </form>
                                    </div>
                                                          
                                    
                                    
                                </div>
                              <?php
                    }
                    else
                    {
                    

                echo ' <h3 class="text-center " style="color: grey;opacity: 0.5;font-size: 50;text-align:center;margin-top:150px;;">You Submitted The Report for this Project.<br>Please Edit in Edit Menu</h3>';

                
                    }
                ?>   
                                
                               
                        </div>
                   
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center">
                 <!--Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/material-bootstrap-wizard">here.</a>-->
                 <br>
            </div>
        </div>
    </div>

</body>
    <script>
        
        $(document).ready(function() {

      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });

    });
            
    </script>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->
    <script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="assets/js/jquery.validate.min.js"></script>
</html>
