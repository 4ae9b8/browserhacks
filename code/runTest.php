<?php

// Re-ordering array by type
array_sort_by_column($hacks, 'type', SORT_DESC);

// Save type from last hack
$last_type = null;
$dump      = "";

// Dump files
$cssDump = "pre span, .example-span, .js-succeed { padding: .2em; margin: .2em 0; display: block; border-radius: 3px; }\n.example-span, .js-succeed { background: lightgreen; }\n.example-span { display: inline-block !important; }\n\r";
$jsDump  = "var testClass = 'js-succeed';\n\r";

foreach($browsers as $key => $val):
  $dump .= "<article data-high='3' class='browser-wrapper ".$key."' id='".$key."'>";
  $dump .= "<section data-cols='1' class='browser-wrapper__heading'>";
  $dump .= "<div>";
  $dump .= "<h2 class='th'><span class='browserhacks-".$key."'></span> <a href='#".$key."'>".ucfirst($val['name'])."</a></h2>";
  $dump .= "</div>";

  foreach($hacks as $k):
    // Check if current hack is from current browser
    // If it isn't or if current hack is not from current type, break
    if(!isset($k['browsers'][$key]) || empty($k['test'])) 
      continue;

    // If current type is different from type of last hack, display type heading
    if($k['type'] != $last_type) {
      $dump .= "</section>";
      $dump .= "<section data-cols='1' class='browser-wrapper__subheading' data-type='".$k['type']."-parent'>";
      $dump .= "<div><h3>".$hack_types[$k['type']]['title']."</h3></div>";
      $dump .= "</section>";
      $dump .= "<section data-cols='1' data-type='".$k['type']."-childs'>";
    }

    $dump .= "<div class='browser-wrapper__hack' id='hack-".$k['id']."'>";
    $dump .= "<pre class='language-".$k['language']."' data-version='".$k['browsers'][$key]."'>";
    $dump .= "<code>";
    $dump .= !empty($k['label']) ? "/* ".$k['label']." */\n" : '';

    // If it's a CSS thing
    if($k['language'] == 'css') {
      
      $lines = explode("\n", $k['test']); // Explode on line breaks

      for($i = 0; $i < count($lines); $i++) {
        
        $name = "test_css_".$k['id']."-".$i;
        
        // Wrap it in a span with a number
        $dump .= "<span class='".$name."'>".$lines[$i]."</span>";
        
        // Append things to the dump
        $cssDump .= str_replace('.selector',".".$name, $lines[$i])."\n\r";
        
      }

    // If it's a JS thing
    } else if($k['language'] == 'javascript') {
      $lines = explode("\n", $k['test']); // Explode on line breaks
      
      for($i = 0; $i < count($lines); $i++) {
        
        // Wrap it in a span with a number
        $name = "test_js_".$key."_".$k['id']."-".$i;
        $dump .= "<span class='".$name."'>var isHacked = ".$lines[$i]."</span>";
        
        // Append things to the dump
        $jsDump .= "var ".$name." = ".$k['test']."\n";
        $jsDump .= "if (".$name.") $('.".$name."').addClass(testClass);\n\r";
      
      }

    // If it's neither CSS nor JS
    } else {
      $dump .= $k['code'];
    }

    $dump .= "</code>";
    $dump .= "</pre>";
    $dump .= "<ul class='browser-list'>";

    foreach($k['browsers'] as $name => $version) {

      $label = ucfirst($browsers[$name]['name']);
      $displayVersion = str_replace('|','/', returnVersion($version));  

      $dump .= "<li class='browser-list__item'>";
      $dump .= " <span class='browser-icon browserhacks-".$name."'></span>";
      $dump .= " <span class='browser-name'>".$label."</span>";
      $dump .= " <span class='browser-version'>".$displayVersion."</span>";
      $dump .= "</li>"; 
    }

    $dump .= "</ul>";
    $dump .= "</div>";
    
    //END DUMP

    // Set new last type
    $last_type = $k['type'];
    endforeach;

  $dump .= "</section>";
  $dump .= "</article>";

endforeach; 

// Dump the test page content
echo $dump;

// Create/update test files
$CSSFile = "css/browserhacks-test-page.css";
$JSFile  = "js/browserhacks-test-page.js";

$currentCSSFile = file_get_contents($CSSFile);
$currentJSFile  = file_get_contents($JSFile);

if($currentCSSFile != $cssDump) file_put_contents($CSSFile , $cssDump);
if($currentJSFile  != $jsDump)  file_put_contents($JSFile  ,  $jsDump);
?>
