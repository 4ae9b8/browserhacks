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
    // Check if current hack is from current browser
    // If it isn't, break
    if(!isset($hack['browsers'][$key])) continue;

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

    // Output the hack
    $isLegacy    = false;


    $caption = "";

    // Creation of the caption (hacks legend) for the current hack
    foreach($hack['browsers'] as $name => $version) {
      // Get version of hacked browser for current hack
      $displayVersion = returnVersion($version);

      // Check if current hack is legacy
      $isLegacy       = isLegacy($displayVersion, $browsers[$name]['legacy']);

      // Replace pipes with slashes for better readability
      $displayVersion = str_replace('|','/', $displayVersion); 

      $caption .= "<li class='browser-list__item'>";
      $caption .= " <span class='browser-icon browserhacks-".$name."'></span>";
      $caption .= " <span class='browser-name'>".ucfirst($browsers[$name]['name'])."</span>";
      $caption .= " <span class='browser-version'>".$displayVersion."</span>";
      $caption .= "</li>"; 
    }
    
    $legacy = $isLegacy === true ? "data-legacy='true'" : "data-legacy='false'";

    $dump .= "<div class='browser-wrapper__hack' ".$legacy." id='hack-".$hack['id']."' data-version='".$hack['browsers'][$key]."'>";
    $dump .= "<pre class='language-".$hack['language']."'>";
    $dump .= "<code>";
    $dump .= !empty($hack['label']) ? "/* ".$hack['label']." */\n" : '';
    
    $lines = explode("\n", $hack['code']); // Explode on line breaks

    for($i = 0; $i < count($lines); $i++) {
      $dump .= "<span class='line'>".$lines[$i]."</span>\n";
    }
    
    $dump .= "</code>";
    $dump .= "</pre>";
    $dump .= "<ul class='browser-list'>";
    $dump .= $caption;
    $dump .= "</ul>";
    $dump .= "<a href='#hack-".$hack['id']."' class='browser-wrapper__link'>#</a>";
    $dump .= "</div>";
        
    // Set new last type
    $last_type = $hack['type'];

  endforeach;

  $dump .= "  </section>";
  $dump .= "</article>";

endforeach; 

echo $dump;
?>
