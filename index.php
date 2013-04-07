<?php
include 'user.php';
include 'group.php';
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
      <tr>
        <td align="center"><br/>
        <input type="submit" name="submit_user" value="Submit"/>
        </td>
      </tr>
    <tr>
      <td><label>Add to Groups: </label>&nbsp;</td>
      <td><select name="groupselect[]" size="10" multiple="multiple" tabindex="1">
        <?php
        $groupfile = file('/www/group2');
        if (file_exists($groupfile)){
          $i = 1;
          foreach ($groupfile as $line){
            $split_line = split(":", $line);
            ++$i
        ?>
        <option value="<?php echo $i; ?>"><?php echo $split_line[0]; ?></option>
        <?php
          }
        } else {
        ?>
        <option value="nofile">No group file exists!</option>
        <?php
        }
        ?>
      </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" tabindex="2" /></td>
    </tr>
    </table>
  </form>
</body>
</html>

<?php
}
?>
