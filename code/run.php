<?php

// Re-ordering array by type
array_sort_by_column($hacks, 'type', SORT_DESC);

// Save type from last hack
$last_type = null;
$dump      = "";

// Dump files
$cssDump = ".example-span, .js-succeed { padding: .2em; margin: .2em 0; display: block; border-radius: 3px; }\n.example-span, .js-succeed { background: lightgreen; }\n.example-span { display: inline-block !important; }\n\r";
$jsDump  = "var testClass = 'js-succeed';\n\rfunction enable_test() {\n\r";

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

    $dump .= "<div class='browser-wrapper__hack' ".$legacy." id='hack-".$hack['id']."' data-version='".$hack['browsers'][$key]."'><div>";
    $dump .= !empty($hack['label']) ? "<p class='browser-wrapper__label'>/* ".$hack['label']." */</p>" : '';
    $dump .= "<pre class='language-".$hack['language']."'>";
    $dump .= "<code>".$hack['code']."</code>";
    $dump .= "</pre>";
    $dump .= "<ul class='browser-list'>".$caption."</ul>";
    $dump .= "<a href='#hack-".$hack['id']."' class='browser-wrapper__link'>#</a>";
    $dump .= "</div>";
    $dump .= "</div>";

    // If it's either CSS or JS, prepare the CSS/JS test files
    if($hack['language'] == 'css' || $hack['language'] == 'javascript') {
      $lines = explode("\n", $hack['test']);
      
      for($i = 0; $i < count($lines); $i++) {
        $name  = "hack_".$hack['id']."_".$i;

        if($hack['language'] == 'css') {
          $cssDump .= str_replace('.selector',".".$name, $lines[$i])."\n\r";
        } 
        else if($hack['language'] == 'javascript') {
          $jsDump .= "var ".$name." = ".$hack['test']."\n";
          $jsDump .= "if (".$name.") $('.".$name."').addClass(testClass);\n\r";
        }
      } 
    }
        
    // Set new last type
    $last_type = $hack['type'];

  endforeach;

  $dump .= "  </section>";
  $dump .= "</article>";

endforeach; 

$jsDump .= "}\n\rfunction disable_test() {\n    $('.'+testClass).removeClass(testClass);\n}\n\rfunction tests(state) {\n    if(state == true) enable_test();\n    if(state == false) disable_test();\n}";
echo $dump;

// Create/update test files
$CSSFile = "css/browserhacks-test-page.css";
$JSFile  = "js/browserhacks-test-page.js";

$currentCSSFile = file_get_contents($CSSFile);
$currentJSFile  = file_get_contents($JSFile);

if($currentCSSFile != $cssDump) {
  file_put_contents($CSSFile , $cssDump);
}

if($currentJSFile  != $jsDump) {
  file_put_contents($JSFile  ,  $jsDump);
}
?>
