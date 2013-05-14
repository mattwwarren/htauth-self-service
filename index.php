<?php
/**
index.php

Author - Matt Warren <matt (at) warrencomputing (dot) net>
Last Modified - 07/Apr/2013

Pretty self-explanatory, shows the basic form
**/
// These includes are order independent and go at the top
include 'user.php';
include 'config.php';
function showForm($error="LOGIN"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"DTD/xhtml1-transitional.dtd">

<html>
<body>
  <?php echo $error; ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="user">
    <table>
      <tr>
        <td>Username: <input type="text" name="uname"/></td>
      </tr>
      <tr>
        <td>Password: <input type="password" name="pass"/></td>
      </tr>
      <tr>
        <td>Confirm Password: <input type="password" name="confirm"/></td>
      </tr>
    <?php
    // This displays the group portion of the form and is in a separate file for text parsing
    // TODO: leave this out if the group file doesn't exist?
    include 'group.php';
    ?>
    <tr>
      <td align="center"><br/>
      <input type="submit" name="submit_user" value="Submit"/>
      </td>
    </tr>
    </table>
  </form>
  <div class=sidebar>
  <?php
  include 'readme.php';
  ?>
  </div>
</body>
</html>

<?php
}
?>
