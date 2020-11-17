		<h1 class="text-primary"> <i class="fa fa-dashboard"></i>Dashboard <small>Statistics Overview</small></h1>

		<ol class="breadcrumb">
		<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
		</ol>
<?php
$sql = "SELECT * FROM `student_info";
$student_count =$link->query($sql);
$total_student=$student_count->rowCount();

$res = "SELECT * FROM `user";
$user_count =$link->query($res);
$total_user =$user_count->rowCount();
?>

		<div class="row">
		<div class="col-sm-4">
		<div class="card-header bg-primary">
		<div class="row">
			<div class="col-md-3">
				<i class="fa fa-users fa-5x"></i>
			</div>
			<div class="col-md-9">
				<div class="pull-right" style="font-size: 40px">
					<?php echo $total_student; ?></div>
				<div class="clearfix"></div>
				<div class="pull-right">All Students</div>
			</div>
		</div>
		</div>
		<a href="index.php?page=all-students">	
		<div class="card-footer">
			<span class="pull-left">All Students</span>
			<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
			<div class="clearfix"></div>
		</div>
		</a>
		</div>
		<div class="col-sm-4">
		<div class="card-header bg-primary">
		<div class="row">
			<div class="col-md-3">
				<i class="fa fa-users fa-5x"></i>
			</div>
			<div class="col-md-9">
				<div class="pull-right" style="font-size: 40px">
					<?php echo $total_user;?></div>
				<div class="clearfix"></div>
				<div class="pull-right">All Users</div>
			</div>
		</div>
		</div>
		<a href="index.php?page=all-users">	
		<div class="card-footer">
			<span class="pull-left">All Users</span>
			<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
			<div class="clearfix"></div>
		</div>
		</a>
		</div>
		</div>
		<hr>
		<h4> New Student</h4>
		<div class="responsive">
		<table id="data" class="table table-bordered table-hover table-striped">
		<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Roll</th>
			<th>City</th>
			<th>Class</th>
			<th>PContact</th>
			<th>photo</th>
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
		</tr>
	<?php }?>
		</tbody>
		</table>
		</div>