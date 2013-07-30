<?php
// Save type from last hack
$last_type = null;
$dump = "";
array_sort_by_column($hacks, 'type', SORT_DESC);

// Indexes
$indexCSS = 0;
$indexJS  = 0;

// Dump files
$cssDump = "pre span, .example-span, .js-succeed { padding: .2em; margin: .2em 0; display: block; border-radius: 3px; }\n.example-span, .js-succeed { background: lightgreen; }\n.example-span { display: inline-block !important; }\n\r";
$jsDump  = "var testClass = 'js-succeed';\n\r";


foreach($browsers as $key => $val):
  $dump .= "<article data-high='3' class='".$key."' id='".$key."'>";
  $dump .= "<section data-cols='1'>";
  $dump .= "<div>";
  $dump .= "<h2 class='th'><span class='browserhacks-".$key."'></span> <a href='#".$key."'>".ucfirst($val['name'])."</a></h2>";
  $dump .= "</div>";

  foreach($hacks as $k):
    // Check if current hack is from current browser
    // If it isn't or if current hack is not from current type, break
    $checkBrowser = in_array($key, $k['browser']);
    if(!$checkBrowser || empty($k['test'])) continue;
        
    // Increment indexes
    $indexCSS++;
    $indexJS++;

    // If current type is different from type of last hack, display type heading
    if($k['type'] != $last_type) {
      $dump .= "</section>";
      $dump .= "<section data-cols='1' data-type='".$k['type']."-parent'>";
      $dump .= "<div><h3>".$hack_types[$k['type']]['title']."</h3></div>";
      $dump .= "</section>";
      $dump .= "<section data-cols='1' data-type='".$k['type']."-childs'>";
    }
        
    // Get the index of the current browser in the array of hacked browsers
    // Create the data-version output based on the $version variable
    $version = $checkBrowser ? array_search($key, $k['browser']) : null; 
    $dv = ($k['data-version'][$version] != 0) ? "data-version='".$k['data-version'][$version]."'" : '';

    // CAPTION
    $caption = "<ul class='browser-list'>";

    $i = 0;
    foreach($k['browser'] as $b) {

      $label = ucfirst($browsers[$b]['name']);
      $displayVersion = returnVersion($k['data-version'][$i]);
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

    // OUTPUT
    $dump .= "<div class='hack-wrapper'>";
    $dump .= "<pre class='language-".$k['language']."' ".$dv.">";
    $dump .= "<code>";
    $dump .= (!empty($k['label'])) ? "/* ".$k['label']." */\n" : '';

    // If it's a CSS thing
    if($k['language'] == 'css') {
      
      $lines = explode("\n", $k['test']); // Explode on line breaks

      foreach($lines as $l) { // Foreach line
        
        // Wrap it in a span with a number
        $dump .= "<span class='test_css_".$indexCSS."'>".$l."</span>";
        
        // Append things to the dump
        $cssDump .= str_replace('.selector','.test_css_'.$indexCSS, $l)."\n\r";
        
        $indexCSS++; // Increment index
      }

    // If it's a JS thing
    } else if($k['language'] == 'javascript') {
      $lines = explode("\n", $k['test']); // Explode on line breaks
      
      foreach($lines as $l) { // Foreach line
        
        // Wrap it in a span with a number
        $name = "test_js_".$k['browser'][0]."_".$indexJS;
        $dump .= "<span class='".$name."'>var isHacked = ".$l."</span>";
        
        // Append things to the dump
        $jsDump .= "var ".$name." = ".$k['test']."\n";
        $jsDump .= "if (".$name.") $('.".$name."').addClass(testClass);\n\r";
        
        $indexJS++; // Increment index

      }

    // If it's neither CSS nor JS
    } else {
      $dump .= $k['code'];
    }

    $dump .= "</code>";
    $dump .= "</pre>";
    $dump .= $caption;
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

if($currentCSSFile != $cssDump) file_put_contents("css/browserhacks-test-page.css", $cssDump);
if($currentJSFile  != $jsDump)  file_put_contents("js/browserhacks-test-page.js", $jsDump);
?>
