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

    if ($continuous) return $a[0]."-".$a[$len-1];
  }
  return $version;
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