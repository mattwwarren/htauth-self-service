<?php
/**
group.php

Author - Matt Warren <matt (at) warrencomputing (dot) net>
Last Modified - 07/Apr/2013

This file handles the display of possible authentication groups
**/

// Include crap here for configs and other necessary variables
include 'config.php'
?>
<tr>
  <td><label>Add to Groups: </label>&nbsp;</td>
  <td><select name="groupselect[]" multiple="multiple" size="10" tabindex="1">
    <?php
    // Read in the group file.
    $groupreadfile = file($htgp_file);
    // If the file doesn't exist, throw a fit.
    if (file_exists($htgp_file)){
      // Initialize a counter. For each line, if there is a group name, display it
      $i = 1;
      foreach ($groupreadfile as $groupreadline){
        $groupreadsplit_line = split(":", $groupreadline);
        ++$i;
        if ( strlen($groupreadsplit_line[0]) > 1 ){
    ?>
    <option value="<?php echo $groupreadsplit_line[0]; ?>"><?php echo $groupreadsplit_line[0]; ?></option>
    <?php
        }
      }
    } else {
    // This is the fit.
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
