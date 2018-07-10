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
    <!--======PHP ZEROTH REVIEW ====-->
    <?php
    if(isset($_REQUEST["add0"]))
    {
       
        
        $zero =$_POST["zero"];

        $review = "UPDATE project_details SET sem1_zero_rev = '".$zero."' WHERE proj_id='$pid'";

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
    <!--======PHP REVIEW 1====-->
    <?php
    if(isset($_REQUEST["add1"]))
    {
       
        $pic1=$_POST["pic1"];
        $rev1 =$_POST["rev1"];
        $com=$_POST["com_one_sem1"];

        $review = "UPDATE project_details SET sem1_rev1 = '".$rev1."', sem1_rev1_pic = '".$pic1."' , com_one_sem1='".$com."' WHERE proj_id='$pid'";

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
       
        $pic2=$_POST["pic2"];
        $rev2 =$_POST["rev2"];
        $com=$_POST["com_two_sem1"];
        $review = "UPDATE project_details SET sem1_rev2 = '".$rev2."', sem1_rev2_pic = '".$pic2."' , com_two_sem1='".$com."' WHERE proj_id='$pid'";

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
       
        $pic3=$_POST["pic3"];
        $rev3 =$_POST["rev3"];
        $com=$_POST["com_three_sem1"];

        $review = "UPDATE project_details SET sem1_rev3 = '".$rev3."', sem1_rev3_pic = '".$pic3."' , com_three_sem1='".$com."' WHERE proj_id='$pid'";

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
                        if (!empty($proj['sem1_rev1'])||!empty($proj['sem1_rev2'])||!empty($proj['sem1_rev3'])) {
                           
                        
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
                                        if(!empty($proj['sem1_zero_rev']))
                                        {
                                    ?>
                                        <li><a href="#zero" data-toggle="tab">Zeroth Review</a></li>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                        if(!empty($proj['sem1_rev1']))
                                        {
                                    ?>
                                        <li><a href="#rev1" data-toggle="tab">Review I</a></li>
                                        <?php
                                        }
                                        ?>
                                        <!--<li><a href="#status" data-toggle="tab">Status</a></li>-->
                                        <?php
                                        if(!empty($proj['sem1_rev2']))
                                        {
                                    ?>
                                        <li><a href="#rev2" data-toggle="tab">Review II</a></li>
                                         <?php
                                        }
                                        ?>
                                         <?php
                                        if(!empty($proj['sem1_rev3']))
                                        {
                                    ?>
                                        <li><a href="#rev3" data-toggle="tab">Review III</a></li>
                                        <?php
                                        }
                                        ?>  

                                        <!--<li><a href="#review3" data-toggle="tab">Review III</a></li>-->
                                    </ul>
                                </div>
                                
                                <!--         Values of each tab          -->
                                                                
                                <div class="tab-content">
                                     <!--     Tabs for ZEROTH REVIEW    -->
                                    
                                    <div class="tab-pane" id="zero">
                                                <form action="#" method="post"> 
                                        
                                            <div class="col-sm-10 col-sm-offset-1">
                                            
                                                <div class="col-sm-5 col-sm-offset-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Zeroth Review</label>
                                                       
                                                        <select class="form-control" name="zero">
                                                        <?php
                                                        switch($proj['sem1_zero_rev'])
                                                        {

                                                            case 'good':?>                            
                                                                    <option value="good" selected> Good </option>
                                                                    <option value="satisfied"> satisfied </option>
                                                                    <option value="bad"> Bad </option>
                                                                    <?php break;
                                                            case 'satisfied':?>   
                                                                    <option value="good"> Good </option>
                                                                    <option value="satisfied" selected> satisfied </option>
                                                                    <option value="bad"> Bad </option>
                                                                    <?php break;
                                                            case 'bad':?>   
                                                                    <option value="good"> Good </option>
                                                                    <option value="satisfied"> satisfied </option>
                                                                    <option value="bad" selected> Bad </option>
                                                                    <?php break;
                                                            case '100':?>   
                                                                    <option value="25"> 25% </option>
                                                                    <option value="50"> 50% </option>
                                                                    <option value="75"> 75% </option>
                                                                    <option value="100" selected> 100% </option>
                                                                    <?php break;
                                                        }
                                                                    ?>


                                                    </select>
                                                        
                                                    </div>
                                                </div>
                                            
                                                                                       
                                            </div>
                                       
                                        <div class="col-sm-5 col-sm-offset-4" style="text-align:center"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add0' value='Add' />
                                        </div>
                                    </form>
                                    </div>
                                    <!--     Tabs for Review 1    -->
                                    
                                    <div class="tab-pane" id="rev1">
                                        <div class="row">
                                                <form action="#" method="post"> 
                                        
                                            <div class="col-sm-10 col-sm-offset-1">
                                            
                                                <div class="col-sm-5 col-sm-offset-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Review I</label>
                                                        
                                                        <select class="form-control" name="rev1">
                                                        <?php
                                                        switch($proj['sem1_rev1'])
                                                        {

                                                            case 'good':?>                            
                                                                    <option value="good" selected> Good </option>
                                                                    <option value="satisfied"> satisfied </option>
                                                                    <option value="bad"> Bad </option>
                                                                    <?php break;
                                                            case 'satisfied':?>   
                                                                    <option value="good"> Good </option>
                                                                    <option value="satisfied" selected> satisfied </option>
                                                                    <option value="bad"> Bad </option>
                                                                    <?php break;
                                                            case 'bad':?>   
                                                                    <option value="good"> Good </option>
                                                                    <option value="satisfied"> satisfied </option>
                                                                    <option value="bad" selected> Bad </option>
                                                                    <?php break;
                                                            case '100':?>   
                                                                    <option value="25"> 25% </option>
                                                                    <option value="50"> 50% </option>
                                                                    <option value="75"> 75% </option>
                                                                    <option value="100" selected> 100% </option>
                                                                    <?php break;
                                                        }
                                                                    ?>


                                                    </select>

                                                        
                                                    </div>
                                                </div>
                                                 <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Comment</label>
                                                        <textarea class="form-control" type="text" name="com_one_sem1" rows="4"><?php echo $proj['com_one_sem1'] ?></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-5 col-sm-offset-4">
                                                <div class="picture-container" style="text-align:center">
                                                    <div class="picture">
                                                        <img src="assets/img/quickadd.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="pic1">
                                                    </div>
                                                    
                                                </div>
                                                    
                                                    
                                            </div>
                                                                                       
                                            </div>
                                       
                                        <div class="col-sm-5 col-sm-offset-4" style="text-align:center"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add1' value='Add' />
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                    
                                    <!--     Tabs for Review 2    -->
                                    
                                    <div class="tab-pane" id="rev2">
                                        <div class="row">
                                        <form action="#" method="post"> 
                                        
                                            <div class="col-sm-10 col-sm-offset-1">
                                            
                                                <div class="col-sm-5 col-sm-offset-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Review II</label>
                                                        
                                                        
                                                        <select class="form-control" name="rev2">
                                                        <?php
                                                        switch($proj['sem1_rev2'])
                                                        {

                                                            case 'good':?>                            
                                                                    <option value="good" selected> Good </option>
                                                                    <option value="satisfied"> satisfied </option>
                                                                    <option value="bad"> Bad </option>
                                                                    <?php break;
                                                            case 'satisfied':?>   
                                                                    <option value="good"> Good </option>
                                                                    <option value="satisfied" selected> satisfied </option>
                                                                    <option value="bad"> Bad </option>
                                                                    <?php break;
                                                            case 'bad':?>   
                                                                    <option value="good"> Good </option>
                                                                    <option value="satisfied"> satisfied </option>
                                                                    <option value="bad" selected> Bad </option>
                                                                    <?php break;
                                                            case '100':?>   
                                                                    <option value="25"> 25% </option>
                                                                    <option value="50"> 50% </option>
                                                                    <option value="75"> 75% </option>
                                                                    <option value="100" selected> 100% </option>
                                                                    <?php break;
                                                        }
                                                                    ?>


                                                    </select>

                                                        
                                                    </div>
                                                </div>
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Comment</label>
                                                        <textarea class="form-control" type="text" name="com_two_sem1" rows="4"><?php echo $proj['com_two_sem1'] ?></textarea>
                                                    </div>
                                                </div>                                                                                            
                                                <div class="col-sm-5 col-sm-offset-4">
                                                <div class="picture-container" style="text-align:center">
                                                    <div class="picture">
                                                        <img src="assets/img/quickadd.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="pic2">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                                                                       
                                            </div>
                                       
                                        <div class="col-sm-5 col-sm-offset-4" style="text-align:center"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add2' value='Add' />
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                                
                                    <!--     Tabs for review3    -->
                                    
                                    <div class="tab-pane" id="rev3"> 
                                        <div class="row">
                                            <form action="#" method="post"> 
                                        
                                            <div class="col-sm-10 col-sm-offset-1">
                                            
                                                <div class="col-sm-5 col-sm-offset-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Review III</label>
                                                                                                                
                                                        
                                                        <select class="form-control" name="rev3">
                                                        <?php
                                                        switch($proj['sem1_rev3'])
                                                        {

                                                            case 'good':?>                            
                                                                    <option value="good" selected> Good </option>
                                                                    <option value="satisfied"> satisfied </option>
                                                                    <option value="bad"> Bad </option>
                                                                    <?php break;
                                                            case 'satisfied':?>   
                                                                    <option value="good"> Good </option>
                                                                    <option value="satisfied" selected> satisfied </option>
                                                                    <option value="bad"> Bad </option>
                                                                    <?php break;
                                                            case 'bad':?>   
                                                                    <option value="good"> Good </option>
                                                                    <option value="satisfied"> satisfied </option>
                                                                    <option value="bad" selected> Bad </option>
                                                                    <?php break;
                                                            
                                                        }
                                                                    ?>


                                                    </select>

                                                        
                                                    </div>
                                                </div>
                                                     
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Comment</label>
                                                        <textarea class="form-control" type="text" name="com_three_sem1" rows="4"><?php echo $proj['com_three_sem1'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5 col-sm-offset-4">
                                                <div class="picture-container" style="text-align:center">
                                                    <div class="picture">
                                                        <img src="assets/img/quickadd.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture" name="pic3">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                                                                       
                                            </div>
                                       
                                        <div class="col-sm-5 col-sm-offset-4" style="text-align:center"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add3' value='Add' />
                                        </div>
                                    </form>
                                    </div>
                                    </div>
                                  <!--     Tabs for FINAL OUTCOME   -->
                                    
                                   <!-- <div class="tab-pane" id="fc">                                    
                                            <form action="#" method="post"> 
                                        
                                            <div class="col-sm-10 col-sm-offset-1">
                                            
                                                <div class="col-sm-5 col-sm-offset-4">
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
                                            </div>
                                                                                       
                                            </div>
                                       
                                        <div class="col-sm-5 col-sm-offset-4" style="text-align:center"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add3' value='Add' />
                                        </div>
                                    </form>
                                    </div>-->
                                    
                                    
                                    
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
