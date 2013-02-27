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
      <tr>
        <td align="center"><br/>
        <input type="submit" name="submit_user" value="Submit"/>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>

<?php
}
?>
