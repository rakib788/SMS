<?php 
include_once 'dbcon.php';
session_start();

if (isset($_POST['submit'])) {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $c_password = $_POST['c_password'];

    $photo       = explode('.',$_FILES['photo']['name']);
    $photo       = end($photo);
    $photo_name  = $username. "." .$photo;

    $input_error = array();

    if (empty($name)) {
     $input_error['name'] = "The Name field is required"; 
    }
    if (empty($email)) {
        $input_error['email'] = "The Email field is required"; 
    }

    if (empty($username)) {
        $input_error['username'] = "The Username field is required"; 
    }

    if (empty($password)) {
        $input_error['password'] = "The Password field is required"; 
    }
    if (empty($c_password)) {
        $input_error['c_password'] = "The Confirm Password field is required"; 
    }
    if (count($input_error)==0) {
          $email_check ="SELECT * FROM `user` WHERE email='$email'";
          $email_result =$link->query($email_check);

          if ($email_result->rowCount()==0) {
            $username_check= "SELECT * FROM `user` WHERE username='$username'";
            $username_result= $link->query($username_check);
            if ($username_result->rowCount()==0) {
              if (strlen($username)>3) {
                if (strlen($password)>2) {
                  if ($password==$c_password) {
                    $password = md5($password);
                    $sql="INSERT INTO `user`( `name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
                    $result = $link->query($sql);
                    if ($result) {
                      $_SESSION['data_insert_success'] = "Data Insert Success!";
                      move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo_name);
                      header("location:registation.php");

                    }else{
                      $_SESSION['data_insert_error'] = "Data Insert Error!";
                    }

                  }else{
                    $password_not_match = "Confirm Password Don't match";
                  }
                }else{
                  $password_lenght = "Password More then 3 character";
                }
              }else{
                $username_lenght = "Username more then 4 character ";
              }
            }else{
              $username_error="this Username already exists";
            }
          }else{
            $email_error="this email already exists";    
          }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" class="css">
  </head>
  <body>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-info"><h4 class=" text-center">User Registation Form</h4></div>
              <div class="card-body ">
                <?php if (isset($_SESSION['data_insert_success'])) {
                  echo '<div class="alert alert-success">' .$_SESSION['data_insert_success'].'</div>';
                }?>
                <?php if (isset($_SESSION['data_insert_error'])) {
                  echo '<div class="alert alert-info">' .$_SESSION['data_insert_error'].'</div>';
                }?>
                 
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" name="name" id="name"  placeholder="enter your name" class="form-control" value="<?php if(isset($name)){echo $name;} ?>">
                  </div>
                  <div>
                  <label class="error">
                    <?php if (isset($input_error['name'])) {echo $input_error['name'];}?>
                    </label>
                    </div>                
                  <div class="form-group">
                    <label for="email"  class="control-label">Email</label>
                    <input type="email"  name="email" id="email" value=" <?php if(isset($email)){echo $email;} ?>"   placeholder="example@gmail.com" class="form-control">
                  </div>
                  <div>
                  <label class="error">
                    <?php if (isset($input_error['email'])) {echo $input_error['email'];}?>
                    <?php if (isset($email_error)) {echo $email_error;}?>
                    </label>
                    </div> 
                  <div class="form-group">
                    <label for="username" class="control-label">UserName</label>
                    <input type="text" name="username" id="username" value="<?php if(isset($username)){echo $username;} ?>" placeholder="enter your username"   class="form-control">
                  </div>
                  <div>
                  <label class="error">
                    <?php if (isset($input_error['username'])) {echo $input_error['username'];}?>
                     <?php if (isset($username_error)) {echo $username_error;}?>
                     <?php if (isset($username_lenght)) {echo $username_lenght;}?>
                    </label> 
                    </div>
                  <div class="form-group" >
                    <label for="password" class="control-label">Password</label>
                    <input type="password" name="password" id="password" value="<?php if(isset($password)){echo $password;} ?>" placeholder="*******" class="form-control">    
                  </div>
                  <div>
                  <label class="error">
                    <?php if (isset($input_error['password'])) {echo $input_error['password'];}?>
                    <?Php if (isset($password_lenght)) {echo $password_lenght;}?>
                    </label> 
                    </div>
                  <div class="form-group">
                    <label for="c_password" class="control-label">Confirm Password</label>
                    <input type="password" name="c_password" id="c_password" 
                    value="<?php if(isset($c_password)){echo $c_password ;} ?>" 
                    placeholder="********" class="form-control">
                  </div>
                  <div>
                  <label class="error">
                    <?php if (isset($input_error['c_password'])) {echo $input_error['c_password'];}?>
                    <?php if (isset($password_not_match)) {echo $password_not_match;}?>

                    </label>
                    </div> 
                  <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                  </div>
                  <div class="col-md-6">
                     <input type="submit" name="submit" value="Registation" class="btn btn-primary btn-block">
                  </div>
                </form>
                <hr/>
                <p>If you have an account? Then please <a href="login.php" class="text-danger">Login</a> </p>
                <hr/>
                <footer>
                  <p> Copyright &copy: 2018- <?php echo date('Y'); ?> All Rights Reserved</p>
                </footer>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>
