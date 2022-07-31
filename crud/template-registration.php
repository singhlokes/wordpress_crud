<?php
//Template Name:registration data in form
get_header();
?>

 <!-- insert data in database -->
<hr>
<div class="container">
	<h2>Insert data in database</h2>
	<form method="post" action="">
		<div class="row">
			<div class="col-md-2">
				<label>Enter Roll:</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="roll_number" id="roll_number"  placeholder="enter roll no">	
			</div>		
		</div>
		<div class="row">
			<div class="col-md-2">
				<label>Enter Name:</label>
			</div>
			<div class="col-md-6">
				<input type="text" name="userName" id="UserName" placeholder="user name" >	
			</div>		
		</div>
		<div class="row">
			<div class="col-md-2">
				<label>password:</label>
			</div>
			<div class="col-md-6">
				<input type="number" name="password" id="password" placeholder="enter vaild password....">	
			</div>		
		</div>
		<div class="row">
			<div class="col-md-2">
				<label>Email Id:</label>
			</div>
			<div class="col-md-6">
				<input type="email" name="emailId" id="emailId" placeholder="enter email name">
			</div>
		</div>
					
			<div style="margin:auto 200px; ">
				 <input type="submit" name="btnSave" value="Insert data"></a>
            
        </div>	
	</form>
</div>
<?php
if(isset($_POST['btnSave'])&&(!empty($_POST))){
	$stuData=[
		"roll_no"=>$_POST['roll_number'],	
		"student_name"=>$_POST['userName'],
		"password"=>$_POST['password'],
		"email" =>$_POST['emailId']	,
	];
	global $wpdb;
	$sql=$wpdb->insert("student_record",$stuData);	
	if($sql==true) {
		echo "<script>alert('save data')</script";
	}else{
		echo "<script>alert('unable save')</script";
	}
	
}
?> 

<!-- show data on front page -->
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST">
				<div class="text-center"><h2>Student Record Show</h2></div>
			<table border="1">
				<tr>
				<th>Id</th>
				<th>Roll</th>
				<th>Name</th>
				<th>pasword</th>
				<th>Email</th>				
				<th colspan="2">Action</th>
				<!-- <th>Delete</th> -->
				</tr>
				<?php
					global $wpdb;
					$table= 'student_record';
					$result = $wpdb->get_results ( "SELECT * FROM $table" );					
					if(!empty($result)){
					foreach ( $result as $resultData ) {   //here $result is an array
													// $print variable is for current row		
 				?>
				<tr>
				<td><?php echo $resultData->id;?></td>
				<td><?php echo $resultData->roll_no;?></td>
				<td><?php echo $resultData->student_name;?></td>
				<td><?php echo $resultData->password;?></td>
				<td><?php echo $resultData->email;?></td>				
				<td>					               
					<!-- <input type="submit" value="Edit" name="update"> -->
					<!-- <a href="http://localhost/testing/" name="update">edit</a> -->				
					<a href="http://localhost/wordpresslogic/edit-page/?rec_id=<?php echo $resultData->id; ?>">edit</a>
				</td>
				<td>

					<a href=" http://localhost/wordpresslogic/delete-page/?rec_id=<?php echo $resultData->id; ?>">Delete</a>
					<!-- <input type="submit" value="Delete" name="delete"></td> -->
				</tr>
				<?php
				}
				} 
				?>
			</table>
			</form>
		</div>
	</div>
</div>
<!-- update data in front page -->

<?php
get_footer();
?>