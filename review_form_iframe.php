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
    <?php
    if(isset($_REQUEST["submit"]))
    {
       
        $pic=$_POST["pic1"];
        $rev1 =$_POST["rev1"];

        $review = "UPDATE project_details SET sem1_rev1 = '".$rev1."', sem1_rev1_pic = '".$pic."' WHERE proj_id='$pid'";

       if (mysqli_query($conn, $review)) 
       {
       echo "Report updated successfully";
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

                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                      <?php echo $proj['project_title']; ?>
                                    </h3>
                                    <!--      Tabs       -->
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                       
                                        <li><a href="#sem1" data-toggle="tab">Semester I</a></li>
                                        <li><a href="#sem2" data-toggle="tab">Semester II</a></li>
                                        <!--<li><a href="#review3" data-toggle="tab">Review III</a></li>-->
                                    </ul>
                                </div>
                                
                                <!--         Values of each tab          -->
                                                                
                                <div class="tab-content">
                                
                                    <!--     Tabs for basic details    -->
                                    
                                
                                    
                                    <!--     Tabs for status    -->
                                    
                                    <div class="tab-pane" id="sem1">
                                        <form action="#" method="post"> 
                                            <h4 class="text-center">ZEROTH REVIEW</h4>
                                            <div class=" container" style="width: 300px;">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">ZEROTH REVIEW</label>
                                                        <select class="form-control" name="rev2"  id="rev2">
                                                            <option disabled="" selected=""></option>
                                                            <option value="good"> Good </option>
                                                            <option value="satis"> Satisfied </option>
                                                            <option value="bad"> Bad </option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <h3 class="text-center">REVIEW REPORT</h3>
                                            <div class="col-sm-10 col-sm-offset-1">
                
                                                <div class="col-sm-4">
                                
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Review I</label>
                                                        <select class="form-control" name="rev1"  id="rev1">
                                                            <option disabled="" selected=""></option>
                                                            <option value="Good"> Good </option>
                                                            <option value="Satisfied"> Satisfied </option>
                                                            <option value="Bad"> Bad </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-4">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Review II</label>
                                                        <select class="form-control" name="rev2"  id="rev2">
                                                            <option disabled="" selected=""></option>
                                                            <option value="good"> Good </option>
                                                            <option value="satis"> Satisfied </option>
                                                            <option value="bad"> Bad </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--<div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="assets/img/addpic.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="wizard-picture">
                                                    </div>
                                                    <h6>Choose Picture</h6>
                                                </div>
                                            </div>-->
                                                
                                                <div class="input-group col-sm-4">
                                                    
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Review III</label>
                                                        <select class="form-control" name="rev3" id="rev3">
                                                            <option disabled="" selected=""></option>
                                                            <option value="good"> Good </option>
                                                            <option value="satis"> Satisfied </option>
                                                            <option value="bad"> Bad </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            <div class="col-sm-4">
                                                <div class="picture-container" style="text-align:center">
                                                    <div class="picture">
                                                        <img src="assets/img/addpic.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" name="pic1" id="pic1" />
                                                    </div>
                                                    <!--<h6>Choose Picture</h6>-->
                                                </div>
                                                <!--======REMOVE IMAGE=======-->
                                                <!--<button href="javascript:removeimg()">Remove image</button>
                                                <script type="text/javascript">
                                                    function removeimg() {
                                                    document.getElementById("pic1").remove();
                                                </script>-->
                                                <!--<div style="text-align:center">
                                                <input type='submit' class='btn btn-fill btn-warning btn-wd' name='addrev_1' id="addrev_1" value='Add' />
                                                </div>-->
                                            </div>
                                             <div class="col-sm-4">
                                                    <div class="picture-container" style="text-align:center">
                                                    <div class="picture">
                                                        <img src="assets/img/addpic.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" name="pic2" id="pic2" />
                                                    </div>
                                                    <!--<h6>Choose Picture</h6>-->
                                                </div>
                                                
                                                <!--<div style="text-align:center">
                                                <input type='submit' class='btn btn-fill btn-warning btn-wd' name='addrev_2' id="addrev_2" value='Add' />
                                                </div>-->
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="picture-container" style="text-align:center">
                                                    <div class="picture">
                                                        <img src="assets/img/addpic.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" name="pic3" id="pic3" />
                                                    </div>
                                                    <!--<h6>Choose Picture</h6>-->
                                                </div>
                                                
                                                <!--<div style="text-align:center">
                                                <input type='submit' class='btn btn-fill btn-warning btn-wd' name='addrev_3' id="addrev_3" value='Add' />
                                                </div>-->
                                            </div>                                  
                                               
                                            </div>
                                            <br>
                                       <div style="text-align:center">
                                                <input type='submit' class='btn btn-fill btn-warning btn-wd' name='submit' id="submit" value='Add' />
                                                </div>
                                        
                                    </form>
                                    </div>
                                                
                                    <!--     Tabs for review2    -->
                                    
                                    <div class="tab-pane" id="sem2">
                                        <form action="#" method="post">
                                        <div class="row">
                                            <!--<h4 class="info-text"></h4>-->
                                            <div class="col-sm-9 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Review II</label>
                                                    <textarea class="form-control" placeholder="" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="text-align:center"><input type='submit' class='btn btn-fill btn-warning btn-wd' name='add' value='Add' />
                                        </div>
                                        </form>
                                    </div>
                                    
                                    
                                    
                                </div>
                                
                                
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
    <!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->
    <script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="assets/js/jquery.validate.min.js"></script>
</html>
