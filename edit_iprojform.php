<?php
session_start();
include("db-connection.php");
	/*project ID*/
   if(isset($_REQUEST["id"]))
    {
        $pid= $_REQUEST["id"];
    }

?>

<!--DISPLAY DETAILS QUERY PHP-->
<?php

 $sql="SELECT * from project_details where proj_id='".$pid."'";
    $run=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($run)>0)
    {
        $proj=mysqli_fetch_assoc($run);
    }
$sql1="SELECT * from team_details where proj_id='".$pid."'";
    $run1=mysqli_query($conn,$sql1);
    
    if(mysqli_num_rows($run1)>0)
    {
        $proj1=mysqli_fetch_assoc($run1);
    }
    ?>

<?php
	

	if (isset($_REQUEST["subbtn"]) )
{
	$bat_no = $_REQUEST["batch"];
	$dep_name = $_REQUEST["dname"];
    $pro_cat = $_REQUEST["proj_cat"];
	$section = $_REQUEST["sec_name"];
	$ptitle = $_REQUEST["p_title"];
	$dom_name = $_REQUEST["dom_name"];
	$mem_name = $_REQUEST["t_mem"];
	$pro_guide = $_REQUEST["p_guide"];
	$abs = $_REQUEST["abs"];
	$com = $_REQUEST["comp"];
	$budget = $_REQUEST["bud"];	
	$exp = $_REQUEST["out"];
	$creator=$_SESSION['login_user'];
 		
		
		
	$update="UPDATE `project_details` SET `batch_no`='".$bat_no."',`dept_name`='".$dep_name."',`sec`='".$section."',`project_category`='".$pro_cat."',`project_title`='".$ptitle."',`domain_name`='".$dom_name."',`project_guide`='".$pro_guide."',`Abstract`='".$abs."',`com_so_far`='".$com."',`estimated_budget`='".$budget."',`expected_outcome`='".$exp."' WHERE proj_id = '".$pid."'";
    $int="UPDATE  `team_details` SET  `Team_members` ='$mem_name' WHERE proj_id ='$pid'";
    $res=mysqli_query($conn,$update);
    $res1=mysqli_query($conn,$int);             
                    if ($res&&$res1)
                    {?>
                        <script>
                        alert("Project Updated Successfully");

                        </script>
                    <?php
                    header("Refresh:0");
                    }
                    else 
                    {
                        ?>
                        <script>
                        alert("Project Not Updated");
                        </script>
                    <?php
                    }
				
// end project details
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
	  <!-- SWEET ALERT  -->
    <script src="assets/js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets/css/sweetalert.css">
       <!-- ICON-->
    <link rel="shortcut icon" type="image/x-icon" href="img/ss.png" />
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

		       	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Sri Eshwar PMS
		                        	</h3>
									<!--      Tabs       -->
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#details" data-toggle="tab">Basic Details</a></li>
			                           
			                        </ul>
								</div>
								
								<!--         Values of each tab          -->
																
		                        <div class="tab-content">
								
									<!--     Tabs for basic details    -->
									
		                        <div class="tab-pane" id="details">
									<form action="#" method="post">
		                            	<div class="row">
			                            	<!--<div class="col-sm-12">
			                                	<h4 class="info-text"> Let's start with the basic details.</h4>
			                            	</div>-->
		                                	<div class="col-sm-6">
												<div class="col-sm-13">
							<div class="input-group">
									<span class="input-group-addon">
															<!--<i class="material-icons">email</i>-->
									</span>
														
							<div class="form-group label-floating">
						<label class="control-label">Department</label>
				<select class="form-control" name="dname">
			    <?php
                switch($proj['dept_name'])
                {
                
                    case 'cse':?>                            
                            <option value="cse" selected> CSE </option>
                            <option value="ece"> ECE </option>
                            <option value="eee"> EEE </option>
                            <option value="mech"> MECH </option>
                            <option value="civil"> CIVIL </option>
                            <?php break;
                    case 'ece':?>   
                            <option value="cse"> CSE </option>
                            <option value="ece" selected> ECE </option>
                            <option value="eee"> EEE </option>
                            <option value="mech"> MECH </option>
                            <option value="civil"> CIVIL </option>
                            <?php break;
                    case 'eee':?>   
                            <option value="cse"> CSE </option>
                            <option value="ece"> ECE </option>
                            <option value="eee" selected> EEE </option>
                            <option value="mech"> MECH </option>
                            <option value="civil"> CIVIL </option>
                            <?php break;
                    case 'mech':?>   
                            <option value="cse"> CSE </option>
                            <option value="ece"> ECE </option>
                            <option value="eee"> EEE </option>
                            <option value="mech" selected> MECH </option>
                            <option value="civil"> CIVIL </option>
                            <?php break;
                    case 'civil':?>   
                            <option value="cse"> CSE </option>
                            <option value="ece"> ECE </option>
                            <option value="eee"> EEE </option>
                            <option value="mech"> MECH </option>
                            <option value="civil" selected> CIVIL </option>
                    <?php
                }
							?>								
            </select>
            </div>
        </div>
        
                                                    
                                                    
        <div class="input-group">
            <span class="input-group-addon">
                <!--<i class="material-icons">email</i>-->
            </span>

            <?php
                $bat = "SELECT * FROM batch";
                $res_bat = $conn->query($bat);
            ?>
            <div class="form-group label-floating">
                <label class="control-label">Batch</label>
                <select class="form-control" name="batch">
                <option disabled="" selected=""></option>
                <?php
                    if($res_bat->num_rows > 0 )
                    {
                        while( $row = mysqli_fetch_assoc($res_bat))
                        {
                            $batch_name = $row["batch_no"];
                            if($batch_name==$proj['batch_no'])
                                {?>
                                <option selected><?php echo $batch_name; ?></option>   
                                <?php
                                }
                            else
                            {?>
                                <option><?php echo $batch_name; ?></option>
                            <?php
                            }
                        }
                    }
                ?>
              </select>
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <!--<i class="material-icons">email</i>-->
            </span>
            <div class="form-group label-floating">
                <label class="control-label">Section</label>
                <select class="form-control" name="sec_name">
                <?php
                switch($proj['sec'])
                {
                
                    case 'A':?>                            
                            <option value="A" selected> A </option>
                            <option value="B"> B </option>
                            <option value="C"> C </option>
                            <?php break;
                    case 'B':?>   
                            <option value="A"> A </option>
                            <option value="B" selected> B </option>
                            <option value="C"> C </option>
                            
                            <?php break;
                    case 'C':?>   
                            <option value="A"> A </option>
                            <option value="B"> B </option>
                            <option value="C" selected> C </option>
                                             
                    <?php
                    default:?><option disabled="" selected=""></option>
				                <option value="A"> A </option>
								<option value="B"> B </option>
								<option value="C"> C </option>
                    <?php
                }
				?>
                </select>
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon">
                <!--<i class="material-icons">email</i>-->
            </span>
            <?php
                $cat = "SELECT * FROM category";
                $res_cat = $conn->query($cat);
            ?>
            <div class="form-group label-floating">
                <label class="control-label">Category</label>
                <select class="form-control" name="proj_cat">
                    <option disabled="" selected=""></option>
                     <?php
                        if($res_cat->num_rows > 0 )
                        {
                            while( $row = mysqli_fetch_assoc($res_cat))
                            {
                                $category = $row["project_category"];
                                if($proj['project_category']==$category)
                                {
                                    ?>
                                    <option selected><?php echo $category; ?></option>
                                    <?php
                                }
                                else 
                                {
                                    ?>
                                    <option><?php echo $category; ?></option>   
                                <?php 
                                }
                            }
                        }
                        ?>
                </select>
            </div>
        </div>
</div>
												
<div class="input-group">
    <span class="input-group-addon">
        <!--<i class="material-icons">lock_outline</i>-->
    </span>
    <div class="form-group label-floating">
        <label class="control-label">Project Title</label>
        <input name="p_title" type="text" class="form-control" value="<?php echo $proj['project_title'] ?>">
    </div>
</div>
<div class="input-group">
        <span class="input-group-addon">
            <!--<i class="material-icons">email</i>-->
        </span>
        <div class="form-group label-floating">
            <label class="control-label">Domain</label>
          <input name="dom_name" type="text" class="form-control" value="<?php echo $proj['domain_name'] ?>">
        </div>
</div>
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">lock_outline</i>-->
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Project Members</label>
			                                          	<textarea name="t_mem" id="t_mem" class="form-control" placeholder="" rows="6" title=""><?php echo $proj1['Team_members'] ?></textarea>
			                                        </div>
												</div>
																								
												
												
											</div>
		                                	
											
											<div class="col-sm-6">
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">lock_outline</i>-->
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Guide</label>
			                                          	<input name="p_guide" type="text" class="form-control" value="<?php echo $proj['project_guide'] ?>">
			                                        </div>
												</div>
									
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">lock_outline</i>-->
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Abstract</label>
			                                          	<textarea name="abs" id="abs" class="form-control" placeholder="" rows="5"><?php echo $proj['Abstract'] ?></textarea>
			                                        </div>
												</div>
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">email</i>-->
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Completed so far</label>
                                                        <select class="form-control" name="comp" id="comp">
                                                        <?php
                                                        switch($proj['com_so_far'])
                                                        {

                                                            case '25':?>                            
                                                                    <option value="25" selected> 25% </option>
                                                                    <option value="50"> 50% </option>
                                                                    <option value="75"> 75% </option>
                                                                    <option value="100"> 100% </option>
                                                                    <?php break;
                                                            case '50':?>   
                                                                    <option value="25"> 25% </option>
                                                                    <option value="50" selected> 50% </option>
                                                                    <option value="75"> 75% </option>
                                                                    <option value="100"> 100% </option>
                                                                    <?php break;
                                                            case '75':?>   
                                                                    <option value="25"> 25% </option>
                                                                    <option value="50"> 50% </option>
                                                                    <option value="75" selected> 75% </option>
                                                                    <option value="100"> 100% </option>
                                                                    <?php break;
                                                            case '100':?>   
                                                                    <option value="25"> 25% </option>
                                                                    <option value="50"> 50% </option>
                                                                    <option value="75"> 75% </option>
                                                                    <option value="100" selected> 100% </option>
                                                                    <?php break;
                                                            default:?><option disabled="" selected=""></option>
                                                                        <option value="25%"> 25% </option>
                                                                        <option value="50%"> 50% </option>
                                                                        <option value="75%"> 75% </option>
                                                                        <option value="100%"> 100% </option>
                                                            <?php

                                                        }
                                                                    ?>


                                                    </select>
														
													</div>
												</div>
												
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">lock_outline</i>-->
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Budget</label>
			                                          	<input name="bud" id="bud" type="text" class="form-control" value="<?php echo $proj['estimated_budget'] ?>">
			                                        </div>
												</div>
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">lock_outline</i>-->
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Expected Outcome</label>
			                                          	<input name="out" id="out" type="text" class="form-control"  value="<?php echo $proj['expected_outcome'] ?>">
			                                        </div>
												</div>
												
		                                	</div>
											
											
											
											
		                            	</div>
											<div style="text-align:center"><input type='submit' name="subbtn" id="subbtn" class='btn btn-fill btn-warning btn-wd' value='Update' />
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
	<script type="text/javascript"></script>
</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>
</html>
