<?php
session_start();
include("db-connection.php");
	
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
	$com = $_REQUEST["com"];
	$budget = $_REQUEST["bud"];	
	$exp = $_REQUEST["out"];
	$creator=$_SESSION['login_user'];
 		/*AUTO GENERATING Project ID*/ 
		$sql="SELECT * from project_details";
		$result=mysqli_query($conn,$sql);

		$rows=mysqli_num_rows($result);
		$d=00;
		$id=$d+$rows;
		$proj_id="PMS-".++$id;  
		
		
	
	// inserting project details	
	$in_pro_det = "INSERT INTO project_details(proj_id,batch_no,dept_name,sec,project_category,project_title,domain_name,project_guide,Abstract,com_so_far,estimated_budget,expected_outcome,creator) 
	                VALUES('$proj_id','$bat_no','$dep_name','$section','$pro_cat','$ptitle','$dom_name',
					'$pro_guide','$abs','$com','$budget','$exp','$creator')";
					
					if ($conn->query($in_pro_det) == True)
					{
						//echo "<br>Inserted Project Details";
						 /*  ====  */
	$in_pro_mem ="INSERT INTO team_details(proj_id,Team_members) VALUES ('$proj_id','$mem_name')";
		
   
	if ($conn->query($in_pro_mem) == True)
	   //echo "<br>Inserted Member Details";
		/*echo '<script src="assets/js/sweetalert.min.js">
  swal("Good job!", "You clicked the button!", "success");
</script>';*/
		?>
                        <script>
                        alert("Project Created Successfully");
                        </script>
        <?php


					}
					else
						echo "projdetails not inserted";
				
// end project details
}


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>SriEshwarPMS | Create</title>

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
			<option disabled="" selected=""></option>
				<option value="cse"> CSE </option>
		<option value="ece"> ECE </option>
					<option value="eee"> EEE </option>
					<option value="mech"> MECH </option>
				<option value="civil"> CIVIL </option>
																
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
															 ?>
																
																<option><?php echo $batch_name; ?></option>   
																<?php
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
																<option disabled="" selected=""></option>
																<option value="A"> A </option>
																<option value="B"> B </option>
																<option value="C"> C </option>
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
																		 ?>
																		 <option><?php echo $category; ?></option>   
																			
																	<?php
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
			                                          	<input name="p_title" type="text" class="form-control">
			                                        </div>
												</div>
												<div class="input-group">
														<span class="input-group-addon">
															<!--<i class="material-icons">email</i>-->
														</span>
														<div class="form-group label-floating">
															<label class="control-label">Domain</label>
															<input name="dom_name" type="text" class="form-control">
															
														</div>
													</div>
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">lock_outline</i>-->
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label"><b>Project Members</b> <br> Example Format : Name [Roll Number] </label>
			                                          	<textarea name="t_mem" id="t_mem" class="form-control" placeholder=" " rows="6" title=""></textarea>
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
			                                          	<input name="p_guide" type="text" class="form-control">
			                                        </div>
												</div>
									
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">lock_outline</i>-->
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Abstract</label>
			                                          	<textarea name="abs" id="abs" class="form-control" placeholder="" rows="5" autocomplete="off"></textarea>
			                                        </div>
												</div>
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">email</i>-->
													</span>
													<div class="form-group label-floating">
														<label class="control-label">Completed so far</label>
														<select class="form-control" name="com" id="com">
															<option disabled="" selected=""></option>
															<option value="25%"> 25% </option>
															<option value="50%"> 50% </option>
															<option value="75%"> 75% </option>
															<option value="100%"> 100% </option>
														</select>
													</div>
												</div>
												
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">lock_outline</i>-->
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Budget</label>
			                                          	<input name="bud" id="bud" type="text" class="form-control" value="Rs.">
			                                        </div>
												</div>
												
												<div class="input-group">
													<span class="input-group-addon">
														<!--<i class="material-icons">lock_outline</i>-->
													</span>
													<div class="form-group label-floating">
			                                          	<label class="control-label">Expected Outcome</label>
			                                          	<input name="out" id="out" type="text" class="form-control" autocomplete="off">
			                                        </div>
												</div>
												
		                                	</div>
											
											
											
											
		                            	</div>
											<div style="text-align:center"><input type='submit' name="subbtn" id="subbtn" class='btn btn-fill btn-warning btn-wd' value='Add' />
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

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>
</html>
