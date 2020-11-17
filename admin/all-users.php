	<h1 class="text-primary"> <i class="fa fa-users"></i> All Users <small class="text-info">All Users</small></h1>					
	<ol class="breadcrumb">
	<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li> &nbsp; &nbsp;
	<li class="active"><i class="fa fa-users"></i> All Users</li>
	</ol>

	<div class="table-responsive">
	<table id="data" class="table table-bordered table-hover table-striped">
	<thead>
	<tr>
	<th>Name</th>
	<th>Email</th>
	<th>Username</th>
	<th>Photo</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$sql="SELECT * FROM `user`";
	$result = $link->query($sql);
	$fetch=$result->fetchAll();
	?>
	<?php
	foreach ($fetch as $key => $value) {?>
	<tr>
	<td><?php echo $value['name']; ?></td>
	<td><?php echo $value['email']; ?></td>
	<td><?php echo $value['username']; ?></td>
	<td><img height="100" width="100" src="../images/<?php echo $value['photo']; ?>" alt=""></td>
	
	</tr>
	<?php }?>
	</tbody>
	</table>
	</div>