<?php 
//Template Name:delete page form
get_header();
?>

<!-- delete record on wordpress -->
<?php
global $wpdb;
$table= 'student_record';
$rec_id=$_GET['rec_id'];
// echo $rec_id;
if (isset($_POST['delete'])) {
  	global $wpdb;
	$table= 'student_record';
	$rec_id=$_GET['rec_id'];
	$result = $wpdb->delete($table,array('id' => $rec_id),array('%d'));
	if($result > 0){
		echo "Record Deleted Sucessfully";
		// header ("location:/demo.php");
	}else{
	  exit( var_dump( $wpdb->last_query ) );
	}
}
$thepost = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE id = %d",$rec_id),

);

// print_r($thepost);
?>
<div class="container">
	<h2>Update data in database</h2>
	<form method="post">
		<div class="row">
			<div class="col-md-2">
				<label>Enter Roll:</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="roll_number" id="roll_number" value="<?php echo $thepost->roll_no ;?>" disabled="disabled">
			</div>		
		</div>		
		<div class="row">
			<div class="col-md-2">
				<label>Enter Name:</label>
			</div>
			<div class="col-md-6">
			<input type="text" name="userName" id="UserName" value="<?php echo $thepost->student_name ; ?>"disabled="disabled" >	
			</div>		
		</div>
		<div class="row">
			<div class="col-md-2">
				<label>password:</label>
			</div>
			<div class="col-md-6">
				<input type="number" name="password" id="password" value="<?php echo $thepost->password;?>"disabled="disabled" >	
			</div>		
		</div>
		<div class="row">
			<div class="col-md-2">
				<label>Email Id:</label>
			</div>
			<div class="col-md-6">
				<input type="email" name="emailId" id="emailId"  value="<?php echo $thepost->email; ?>" disabled="disabled" >
			</div>
		</div>					
			<div style="margin:auto 200px; ">
			<input type="submit" name="delete" value="Delete"></a>
            
        </div>	
	</form>
</div>
<div class="container">
	<a href="http://localhost/wordpresslogic/form/?rec_id=<?php echo $resultData->id;  ?>" class="regcenter"><button>Registration</button></a>
</div>
	
<?php 
get_footer();

?>