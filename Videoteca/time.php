<?php
  $currently_selected = date('Y'); 
  
  $earliest_year = 1950; 
  
  $latest_year = date('Y'); 

  echo '<select name="anno" required>';

  foreach ( range( $latest_year, $earliest_year ) as $i ) {
    print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
  }
  echo '</select><br>';
?>