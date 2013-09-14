<?php
  $jsonString = file_get_contents( "code/db_hacks.json");
  $hacks      = json_decode($jsonString, true);

  for($i = 0; $i < count($hacks); $i++) {
      $hacks[$i]['id'] = md5($hacks[$i]['code']);
}
?>