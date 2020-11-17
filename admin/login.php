<?php
include_once 'dbcon.php';
session_start();
 if (isset($_SESSION['user_login'])) {
  header("location:index.php");
 }

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `user` WHERE username='$username'";
  $username_check = $link->query($sql);
  
  if ($username_check->rowCount()>0) {
    $row=$username_check->fetch();
    if ($row['password']==md5($password)) {
      if ($row['status']=='active') {
       $_SESSION['user_login'] = $username;
       header("location:index.php") ;
      }else{
        $status_inactive = "Your message Inactive";
      }

    }else{
        $wrong_password = "Password do not match";
    }
    
  }else{
    $username_not_found = "Username is not Found";
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
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Student Management System</h1>
      <br/>
      <div class="row">
        <div class="col-md-4 offset-4">
          <div class="card">
            <div class="card-header bg-info"><h4 class="text-center">Admin Login Form</h4></div>
            <div class="card-body bg-dark text-white ">
              <form action="login.php" method="POST">
               <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" required=""
                 value="<?php if(isset($username)){echo $username;}?>" placeholder="enter your username" class="form-control">
             </div>
             <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" required="" value="<?php if(isset($password)){echo $password;}?>" placeholder="******" class="form-control">
             </div>
             <input type="submit" name="submit" value="Login" class="btn btn-info btn-block">
          </form>
            </div>
          </div>
          <?php if (isset($username_not_found)) { echo '<div class="alert alert-danger">'.$username_not_found.'</div>';}?>

          <?php if (isset($wrong_password)) { echo '<div class="alert alert-danger">'
          .$wrong_password.'</div>';} ?>
          <?php if (isset($status_inactive)) { echo '<div class="alert alert-danger">'
          .$status_inactive.'</div>';} ?>
        </div>
      </div>
    </div>

  </body>
</html>
