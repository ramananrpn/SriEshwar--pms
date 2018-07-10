
		<?php  
     header('Content-type: application/json; charset=UTF-8');
		 if(isset($_POST["p_id"]) )  
		 {  
		include("db-connection.php");
		$id=$_POST["p_id"];
		
		  $q = "SELECT  * from project_details where id='".$id."'";

		  $run = mysqli_query($conn,$q);
		if(mysqli_num_rows($run)>0)
		      {
		 	$item=mysqli_fetch_assoc($run);
       echo json_encode($item);
		 }
		?>
		
	
   
