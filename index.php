<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Student Management system   </title>
  </head>
  <body>
   
   <div class="container">
    <br/>
     <a href="admin/login.php" class="btn btn-primary" style="float: right"  >Login</a>
     <br/>
     <br/>
     <h1 class="text-center">Welcome to Student Management System</h1>
     <br/>
    <div class="row">
      <div class="col-sm-6 offset-md-3">
         <form action="" method="POST">
       <table class="table table-bordered ">
         <tr>
           <th colspan="2" class="text-center"><label>Student Information</label></th>
         </tr>
         <tr>
           <th><label for="choose">Choose Class</label></th>
           <td>
             <select name="choose" class="form-control" id="choose">
               <option value="">select</option>
               <option value="1st">1st</option>
               <option value="2nd">2nd</option>
               <option value="3rd">3rd</option>
               <option value="4th">4th</option>
               <option value="5th">5th</option>
             </select>
           </td>
         </tr>
         <tr>
           <th><label for="roll">Roll</label></th>
           <td><input class="form-control" type="number" name="roll" pattern="[0-9][6]"></td>
         </tr>
         <tr>
           <td colspan="2" class="text-center"><input type="submit" name="show_info" value="show Info"></td>
         </tr>
       </table>
     </form>
      </div>
    </div> 
    <?php
    require_once './admin/dbcon.php';
    if (isset($_POST['show_info'])) {
      $choose = $_POST['choose'];
      $roll = $_POST['roll'];
    $sql="SELECT * FROM `student_info` WHERE `class`='$choose' and `roll`='$roll'";
    $result = $link->query($sql);
    if ($result->rowCount()==1) {
      $fetch =  $result->fetch();
    ?>
     <div class="row">
      <div class="col-sm-6 offset-sm-3">
        <table class="table table-bordered">
          <tr >
            <td rowspan="6">
              <img src="admin/student_image/<?php echo $fetch['photo'];?>" class="img-thumbnail" style="width: 150px" alt="">
            </td>
            <td>Name</td>
            <td><?php echo $fetch['name'];?></td>
          </tr>
          <tr>
            <td>Roll</td>
            <td><?php echo $fetch['roll'];?></td>
          </tr>
          <tr>
            <td>City</td>
            <td><?php echo ucwords($fetch['city']);?></td>
          </tr>
          <tr>
            <td>Pcontact</td>
            <td><?php echo $fetch['pcontact'];?></td>
          </tr>
          <tr>
            <td>class</td>
            <td><?php echo $fetch['class'];?></td>
          </tr>
          <tr>
            <td>Date</td>
            <td><?php echo $fetch['datetime'];?></td>
          </tr>
        </table>
      </div>
    </div> 
    <?php
    }else{
      ?>
      <script type="text/javascript">
      alert('Data Not Found');
      </script>
  <?php }}?>

   
   </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>