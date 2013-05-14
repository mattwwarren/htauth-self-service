<?php
/**
user.php

Author - Matt Warren <matt (at) warrencomputing (dot) net>
Last Modified - 07/Apr/2013

This file handles all the user creation functions.  
Set the username and password in the password file 
and then create/append to an entry in the group file.
**/
include 'config.php';

// Grab some plain variables from the form submission
$check_pw=$_POST['confirm'];
$username=$_POST['uname'];
$groups=$_POST['groupselect'];

// If the password is set, start processing the form with some basic structures
if (isset($_POST['pass']) and ($username != '')){
  $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
  $form_str = "Match!";
  $crypt_pass = crypt($pass, base64_encode($pass));
  $unpw_line = $username . ':' . $crypt_pass;
  $passfile = array();
  $to_write = array();
  $stored_un = array();
  $stored_pw = array();

  // Determine what to do with the user information
  // If there are two different passwords entered, don't do anything.
  if ($pass != $check_pw){
    showForm("Passwords do not match!");
    exit();
  } else {

    // If the password file exists, append to it.
    if (file_exists($htpw_file)){
      $passfile = file($htpw_file);
      $count = count($passfile);

      // Parse the password file
      foreach ($passfile as $line){
        $split_line = split(":", $line);
        $stored_un[] = $split_line[0];
        $stored_pw[] = $split_line[1];
      }
      
      // If the username is in there with a password, change their existing password.
      if (in_array($username , $stored_un)){
        $form_str = "User already exists!  Changing password.";
        $keys = array_keys($stored_un, $username);

        foreach ($keys as $key){
          $stored_pw[$key] = $crypt_pass;
        }

      } else {
        $stored_un[] = $username;
        $stored_pw[] = $crypt_pass;
      }

      for ($i = 0; $i < $count; $i++){
        $curr_un = $stored_un[$i];
        $curr_pw = $stored_pw[$i];
        $to_write[] = $curr_un . ':' . $curr_pw;
      }

      // This actually handles all the writing, once we've determined how to write it.
      $fp = fopen($htpw_file, 'w');
      fwrite($fp, implode("",$to_write));
      fwrite($fp, "\n");
      fclose($fp);
    } else {
      // Because the two write outs are slightly different, this is here twice.
      // FIXME: abstract out the writing of the password file.
      $fp = fopen($htpw_file, 'w');
      fwrite($fp, $unpw_line);
      fwrite($fp, "\n");
      fclose($fp);
    }

    // Get all possible groups
    $groupfile = file($htgp_file);
    $groupcount = count($groupfile);

    // Parse the group file
    foreach ($groupfile as $line){
      $split_line = split(":", $line);
      $stored_group[] = $split_line[0];
      $stored_users[] = $split_line[1];
    }
    
  // Open the group file and find the groups to edit
  $fp = fopen($htgp_file, 'w');
  foreach ($stored_group as $group){
    $group_index = array_search($group , $stored_group);
    $users_toadd = $stored_users[$group_index];
    // If the current group is in the selected list, add our user
    if (in_array($group , $groups)){
      $users_toadd = " " . trim($users_toadd) .  " $username" . "\r\n";
    }
    $gp_line = $group . ':' . $users_toadd;
    fwrite($fp, $gp_line);
  }
  fclose($fp);

  // Display the form again with the correct success/error message
  showForm($form_str);
  exit();
  }

} else {
  // No password provided, complain accordingly.
  showForm("Please provide a username and password.");
  exit();
}
?>
