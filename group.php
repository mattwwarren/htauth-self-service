<?php
include 'config.php'
?>
<tr>
  <td><label>Add to Groups: </label>&nbsp;</td>
  <td><select name="groupselect[]" size="10" multiple="multiple" tabindex="1">
    <?php
    $groupreadfile = file($htgp_file);
    if (file_exists($htgp_file)){
      $i = 1;
      foreach ($groupreadfile as $groupreadline){
        $groupreadsplit_line = split(":", $groupreadline);
        ++$i;
        if ( strlen($groupreadsplit_line[0]) > 1 ){
    ?>
    <option value="<?php echo $i; ?>"><?php echo $groupreadsplit_line[0]; ?></option>
    <?php
        }
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
<?php
?> 
