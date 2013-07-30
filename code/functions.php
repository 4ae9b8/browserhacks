<?php
function returnVersion($version) {
  $a = explode('|', $version);

  if(count($a) > 1) {
    $continuous = true;
    $len = count($a);

    for($i = 0; $i < $len-1; $i++) {
      $thisV = floor(floatval($a[$i]));
      $nextV = floor(floatval($a[$i+1]));
      if ($thisV+1 !== $nextV){
          $continuous = false;
          break;
      }
    }

    if ($continuous) 
      return $a[0]."-".$a[$len-1];
  }

  return $version;
}

// @TODO fix
function isLegacy($version, $limit) {

  // If $version is *
  if($version == "*")
    return false;

  // If last character of $version is +
  if(strpos($version, '+') !== false)
    return false;

  // If $version contains |, we break it down to have the last last int
  if(strpos($version, '|') !== false) {
    $a = explode('|', $version);
    $version = $a[count($a)-1];
  }

  // If $version contains - but not at the end
  if(strpos($version, '-') !== false && strpos($version, '-') !== strlen($version)-1) {
    $a = explode('-', $version);
    $version = $a[count($a)-1];
  }
 
  // If the version is less than or equals to $limit
  if(floatval($version) <= $limit) 
    return true;

  // Else
  return false;
}

// Re-ordering array by type
function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}
?>