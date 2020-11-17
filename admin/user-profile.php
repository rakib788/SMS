<?php
		if (isset($_POST['upload'])) {
			 $photo       = explode('.',$_FILES['photo']['name']);
             $photo       = end($photo);
             $photo_name  = $session. "." .$photo;

             $res =  "UPDATE `user` SET `photo`='$photo_name' WHERE `username`='$session'";
            $upload = $link->query($res);
            if ($upload) {
            	move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo_name);
            }
		}

		?>

<h1 class="text-primary"> <i class="fa fa-user"></i>My Profile <small>Users Overview</small></h1>
<ol class="breadcrumb">
 <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard" ></i> Dashboard</a></li> &nbsp; &nbsp;
 <li class="active"><i class="fa fa-user"></i> Profile</li>
</ol>

<?php
$session = $_SESSION['user_login'];

$sql = "SELECT * FROM `user` WHERE `username`='$session'";
$user_data = $link->query($sql);
$result = $user_data->fetch();

if (isset($_POST[''])) {
	# code...
}

?>

<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tr>
				<td>User Id</td>
				<td><?php echo $result['id']; ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo ucwords($result['name']); ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $result['username']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $result['email']; ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php echo ucwords($result['status']); ?></td>
			</tr>
			<tr>
				<td>Signup Date</td>
				<td><?php echo $result['datetime']; ?></td>
			</tr>
		</table>
		<a href="" class="btn btn-info btn-sm pull-right"  >Edit Profile</a>
	</div>
	<div class="col-sm-6">
		<a href="">
			<img width="170" height="170" class="img-thumbnail" src="../images/<?php echo $result['photo'];?>" alt="">
		</a>
		<br>
		<br>
		
		<form action="" method="POST" enctype="multipart/form-data">
			<label for="photo">Profile Picture</label><br>
			<input type="file"  name="photo" id="photo" required=""><br><br>
			<input type="submit" name="upload" value="Upload" class="btn btn-sm btn-info">
		
		</form>
	</div>
</div>