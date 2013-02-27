<?php
include 'config.php';

$check_pw=$_POST['confirm'];

if (isset($_POST['pass'])){
  $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

  if ($pass != $check_pw){
    showForm("Passwords do not match!");
    exit();
  } else {
    showForm("Match!");
    exit();
  }
} else {
  showForm("Please provide a password");
  exit();
}
?>
