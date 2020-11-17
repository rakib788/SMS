<h1 class="text-primary"> <i class="fa fa-user-plus"></i> Add Student <small class="text-info">Add New Student</small></h1>					
		<ol class="breadcrumb">
			<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li> &nbsp; &nbsp;
		 <li class="active"><i class="fa fa-user-plus"></i> Add Student</li>
		</ol>

	<?php

		if (isset($_POST['add-student'])) {
			$name       =  $_POST['name'];
			$roll       =  $_POST['roll'];
			$city       =  $_POST['city'];
			$pcontact   =  $_POST['pcontact'];
			$class      =  $_POST['class'];

			$picture = explode('.', $_FILES['picture']['name']);
			$picture_ex = end($picture);
			$picture_name = $roll.'.'.$picture_ex;


			$sql="INSERT INTO `student_info`( `name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$picture_name')";

			$result =$link->query($sql);
			
			if ($result) {
				$success= "Data Insert Success";
				move_uploaded_file($_FILES['picture']['tmp_name'],'student_image/'.$picture_name);
			}else{
				$error= "data Insert Error";
			}

		}


	?>

	<div class="row">
		<?php if (isset($success)) {
		echo '<p class="alert alert-success col-sm-6"> '.$success.'</p>';}?>
		<?php if (isset($error)) {
		echo '<p class="alert alert-danger col-sm-6">' .$error.'</p>';}?>

	</div>
	<div class="row">
	<div class="col-md-8">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" name="name" required="" placeholder="Enter your name" id="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="roll">Student Roll</label>
				<input type="text" name="roll" required=""  placeholder="Enter your Roll" id="roll" class="form-control" pattern="[0-9]{6}">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" name="city" required="" placeholder="City" id="city" class="form-control">
			</div>
			<div class="form-group">
				<label for="pcontact">Parent Contact</label>
				<input type="text" name="pcontact" required="" placeholder="01*********" id="pcontact" class="form-control" >
			</div>
			<div class="form-group">
				<label for="class">Class</label>
				<select name="class" id="class" required="" class="form-control">
					<option value="">select</option>
					<option value="1st">1st</option>
					<option value="2nd">2nd</option>
					<option value="3rd">3rd</option>
					<option value="4th">4th</option>
					<option value="5th">5th</option>
				</select>
			</div>
			<div class="form-group">
				<label for="picture">Picture</label>
				<input type="file" required="" name="picture" id="picture" class="form-control">
			</div>
			<div>
				<input type="submit" name="add-student" value="Add Student" class="btn btn-primary pull-right ">
			</div>
			<br>
			<br>
		</form>
	</div>
</div>