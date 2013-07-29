<?php

// Re-ordering array by type
array_sort_by_column($hacks, 'type', SORT_DESC);

// Save type from last hack
$last_type = null;
$dump      = "";

// Sort by browser
foreach($browsers as $key => $val):

  // Output browser heading
  $dump .= "<article class='browser-wrapper ".$key."' data-high='3' id='".$key."'>";
  $dump .= "<section class='browser-wrapper__heading' data-cols='1'>";
  $dump .= "<div>";
  $dump .= "<h2 class='th'>";
  $dump .= "<span class='browserhacks-".$key."'></span> ";
  $dump .= "<a href='#".$key."'>".ucfirst($val['name'])."</a>";
  $dump .= "</h2>";
  $dump .= "</div>";

  foreach($hacks as $hack):
    // Check if current hack ($hack['browser']) is from current browser ($key)
    $checkBrowser = in_array($key, $hack['browser']);
    // If it isn't, break
    if(!$checkBrowser) 
      continue;

    // If current type ($hack['type']) is different from type of last hack ($last_type), 
    // then display type heading
    if($hack['type'] != $last_type) {
      $dump .= "</section>";
      $dump .= "<section class='browser-wrapper__subheading' data-cols='1' data-type='".$hack['type']."-parent'>";
      $dump .= "<div>";
      $dump .= "<h3>".$hack_types[$hack['type']]['title']."</h3>";
      $dump .= "</div>";
      $dump .= "</section>";
      $dump .= "<section class='browser-wrapper__hack-wrapper' data-cols='2' data-type='".$hack['type']."-childs'>";
    }

    // CAPTION
    // Creation of the caption (hacks legend) for the current hack
    $caption = "<ul class='browser-list'>";
    $i = 0;
    $isLegacy = false;

    foreach($hack['browser'] as $b) {
      $label          = ucfirst($browsers[$b]['name']);  

      // Get version of hacked browser ($b) for current hack
      $displayVersion = returnVersion($hack['data-version'][$i]);

      // Check if current hack is legacy
      $isLegacy       = isLegacy($displayVersion, $browsers[$b]['legacy']);

      // Replace pipes with slashes for better readability
      $displayVersion = str_replace('|','/', $displayVersion); 

      $caption .= "<li class='browser-list__item'>";
      $caption .= " <span class='browser-icon browserhacks-".$b."'></span>";
      $caption .= " <span class='browser-name'>".$label."</span>";
      $caption .= " <span class='browser-version'>".$displayVersion."</span>";
      $caption .= "</li>"; 
      $i++;
    }

    $caption .= "</ul>";
    // END CAPTION

    // Get the index of the current browser in the array of hacked browsers
    $version = array_search($key, $hack['browser']); 

    // Output the hack
    $legacyClass = $isLegacy == true ? 'legacy' : '';    

    $dump .= "<div class='browser-wrapper__hack ".$legacyClass."' data-version='".$hack['data-version'][$version]."'>";
    $dump .= "<pre class='language-".$hack['language']."'>";
    $dump .= "<code>";
    $dump .= !empty($hack['label']) ? "/* ".$hack['label']." */\n" : '';
    $dump .= $hack['code'];
    $dump .= "</code>";
    $dump .= "</pre>";
    $dump .= $caption;
    $dump .= "</div>";
        
    // Set new last type
    $last_type = $hack['type'];

  endforeach;

  $dump .= "  </section>";
  $dump .= "</article>";

endforeach; 

echo $dump;
?>
