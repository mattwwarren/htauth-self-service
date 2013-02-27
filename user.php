<?php
include 'config.php';

$password="baz";

if (isset($_POST['pass'])){
  $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

  if ($pass != $password){
    showForm("Wrong password");
    exit();
  } else {
    showForm("Match!");
    exit();
  }
} else {
  showForm("No password provided!");
  exit();
}
?>
