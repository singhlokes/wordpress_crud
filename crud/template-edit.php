<?php
//Template Name:edit form 
get_header();
?>

<?php
global $wpdb;
$table= 'student_record';
$rec_id=$_GET['rec_id'];
// echo $rec_id;
if (isset($_POST['update'])) {
    $result = $wpdb->update($table, array("roll_no"=>$_POST['roll_number'],
		"student_name"=>$_POST['userName'], "password"=>$_POST['password'],"email"=>$_POST['emailId']), array('id' => $rec_id), array('%d','%s', '%d', '%s'),
 	array('%d'));

	if($result > 0){
		echo "Successfully Updated";
		// header ("Location:http://localhost/testing/form/");
	}else{
	  exit( var_dump( $wpdb->last_query ) );
	}
}
$thepost = $wpdb->get_row($wpdb->prepare( "SELECT * FROM $table WHERE id = %d",$rec_id),

);

// print_r($thepost);
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<!-- <div class="container"> -->
			<h2>Update data in database</h2>
			<form method="post">
				<div class="row">
					<div class="col-md-3">
						<label>Enter Roll:</label>
					</div>
					<div class="col-md-3">
						<input type="text" name="roll_number" id="roll_number" value="<?php echo $thepost->roll_no ;?>" >
					</div>		
				</div>		
				<div class="row">
					<div class="col-md-3">
						<label>Enter Name:</label>
					</div>
					<div class="col-md-5">
					<input type="text" name="userName" id="UserName" value="<?php echo $thepost->student_name ; ?>" >	
					</div>		
				</div>
				<div class="row">
					<div class="col-md-3">
						<label>password:</label>
					</div>
					<div class="col-md-6">
						<input type="number" name="password" id="password" value="<?php echo $thepost->password;?>" >	
					</div>		
				</div>
				<div class="row">
					<div class="col-md-3">
						<label>Email Id:</label>
					</div>
					<div class="col-md-6">
						<input type="email" name="emailId" id="emailId"  value="<?php echo $thepost->email; ?>"  >
					</div>
				</div>					
					<div style="margin:auto 200px; ">
					<input type="submit" name="update" value="Update"></a>
		            
		        </div>	
			</form>

		</div>
		
		<div class="col-md-6">			
			<a href="http://localhost/wordpresslogic/form/?rec_id=<?php echo $resultData->id;  ?>" class="regcenter"><button>Registration</button></a>
		</div>
		
	</div>	
</div>
<?php
get_footer();
?>
