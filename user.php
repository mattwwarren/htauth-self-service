<?php
include 'config.php';

$check_pw=$_POST['confirm'];
$username=$_POST['uname'];

if (isset($_POST['pass'])){
  $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

  if (file_exists($htpw_file)){
    $passfile = file($htpw_file);
    $count = count($passfile);

    foreach ($passfile as $line){
      $split_line = split(":", $line);
      $stored_un[] = $split_line[0];
      $stored_pw[] = $split_line[1];
    }

    if ($pass != $check_pw){
      showForm("Passwords do not match!");
      exit();

    } else {
      $form_str = "Match!";
      $crypt_pass = crypt($pass, base64_encode($pass));
      $unpw_line = $username . ":" . $crypt_pass . PHP_EOL;

        if (in_array($username, $stored_un)){
          $form_str = "User already exists!  Changing password!";
          $keys = array_keys($stored_un, $username);

          foreach ($keys as $key){
            $stored_pw[$key] = $crypt_pass;
          }

          for ($i = 0; $i < $count; $i++){
            $curr_un = $stored_un[$i];
            $curr_pw = $stored_pw[$i];
            $to_write[] = $curr_un . ":" . $curr_pw;
          }

          file_put_contents($htpw_file, $to_write);

        } else {
          file_put_contents($htpw_file, $unpw_line, FILE_APPEND);
        }
      }

    } else {
      file_put_contents($htpw_file, $unpw_line);
    }

  showForm($form_str);
  exit();
  }
} else {
  showForm("Please provide a password");
  exit();
}
?>
