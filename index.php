<?php
include 'user.php';
function showForm($error="LOGIN"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"DTD/xhtml1-transitional.dtd">

<html>
<body>
  <?php echo $error; ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="user">
  Username: <input type="text" name="uname">
  Password: <input type="password" name="pass">
  <input type="submit" name="submit_user" value="Submit"/>
  </form>

</body>
</html>

<?php
}
?>
