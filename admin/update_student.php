<?php

$id = base64_decode($_GET['id']);

$sql = "SELECT * FROM `student_info` WHERE id = '$id'";
$stmt = $link->query($sql);
$result = $stmt->fetch();

if (isset($_POST['update-student'])) {
			$name       =  $_POST['name'];
			$roll       =  $_POST['roll'];
			$city       =  $_POST['city'];
			$pcontact   =  $_POST['pcontact'];
			$class      =  $_POST['class'];


			$sql="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`= '$pcontact' WHERE id = '$id'";
		    $result =$link->query($sql);
		    if ($result) {
		    	header("location: index.php?page=all-students");
		    }else{
		    	echo "error";
		    }
			
		}

?>

<h1 class="text-primary"> <i class="fa fa-pencil-square"></i> Update Student <small class="text-info">update Student</small></h1>					
		<ol class="breadcrumb">
			<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li> &nbsp; &nbsp;		
			<li><a href="index.php?page=all-students"><i class="fa fa-users"></i> All Students </a></li>&nbsp; &nbsp;
		 <li class="active"><i class="fa fa-pencil-square"></i> Add Student</li>
		</ol>


	
	<div class="row">
	<div class="col-md-8">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" name="name" required="" value="<?php echo $result['name'];?>" placeholder="Enter your name" id="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="roll">Student Roll</label>
				<input type="text" name="roll" required="" value="<?php echo $result['roll'];?>"  placeholder="Enter your Roll" id="roll" class="form-control" pattern="[0-9]{6}">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" name="city" required="" value="<?php echo $result['city'];?>" placeholder="City" id="city" class="form-control">
			</div>
			<div class="form-group">
				<label for="pcontact">Parent Contact</label>
				<input type="text" name="pcontact" value="<?php echo $result['pcontact'];?>" required="" placeholder="01*********" id="pcontact" class="form-control" pattern="[0-9]{11}">
			</div>
			<div class="form-group">
				<label for="class">Class</label>
				<select name="class" id="class" required=""  class="form-control">
					<option selected><?php echo $result['class'];?></option>
					<option value="1st">1st</option>
					<option value="2nd">2nd</option>
					<option value="3rd">3rd</option>
					<option value="4th">4th</option>
					<option value="5th">5th</option>
				</select>
			</div>
			<div>
				<input type="submit" name="update-student" value="update Student" class="btn btn-primary pull-right ">
			</div>
			<br>
			<br>
		</form>
	</div>
</div>