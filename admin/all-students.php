	<h1 class="text-primary"> <i class="fa fa-users"></i> All Students <small class="text-info">All Students</small></h1>					
	<ol class="breadcrumb">
	<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li> &nbsp; &nbsp;
	<li class="active"><i class="fa fa-users"></i> All Students</li>
	</ol>

	<div class="table-responsive">
	<table id="data" class="table table-bordered table-hover table-striped">
	<thead>
	<tr>
	<th>ID</th>
	<th>Name</th>
	<th>Roll</th>
	<th>City</th>
	<th>Class</th>
	<th>PContact</th>
	<th>Photo</th>
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$sql="SELECT * FROM `student_info`";
	$result = $link->query($sql);
	$fetch=$result->fetchAll();
	?>
	<?php
	foreach ($fetch as $key => $value) {?>
	<tr>
	<td><?php echo $key+1; ?></td>
	<td><?php echo ucwords($value['name']); ?></td>
	<td><?php echo $value['roll']; ?></td>
	<td><?php echo ucwords($value['city']); ?></td>
	<td><?php echo $value['class']; ?></td>
	<td><?php echo $value['pcontact']; ?></td>
	<td><img height="100" width="100" src="student_image/<?php echo $value['photo']; ?>" alt=""></td>
	<td>
			

		
	<a  href="index.php?page=update_student&id=<?php echo base64_encode($value['id']); ?>" class="btn btn-sm btn-primary">
		<i class="fa fa-pencil"></i></a>
		
		<a href="delete_students.php?id=<?php echo base64_encode($value['id']); ?>" class="btn btn-sm btn-danger"> 
		<i class="fa fa-trash"></i></a>
	
		
	</td>
	</tr>
	<?php }?>
	</tbody>
	</table>
	</div>