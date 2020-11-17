<?php

require_once 'dbcon.php';

$id = base64_decode($_GET['id']);

$sql = "DELETE FROM `student_info` WHERE id= '$id'";
$result =  $link->query($sql);
header("location:index.php?page=all-students");

?>