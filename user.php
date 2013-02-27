<?php
include 'config.php';

$check_pw=$_POST['confirm'];
$username = $_POST['uname'];

if (isset($_POST['pass'])){
  $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

  if ($pass != $check_pw){
    showForm("Passwords do not match!");
    exit();
  } else {
    $crpyt_pass = crypt($pass, base64_encode($pass));
    $unpw_line = $username . ":" . $crypt_pass
    if (file_exists($htpw_file)){
      file_put_contents($htpw_file, $unpw_line, FILE_APPEND);
    } else {
      file_put_contents($htpw_file, $unpw_line);
    }
    showForm("Match!");
    exit();
  }
} else {
  showForm("Please provide a password");
  exit();
}
?>
