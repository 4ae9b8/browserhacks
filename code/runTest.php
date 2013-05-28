<?php
// Save type from last hack
$last_type = null;

// Indexes
$indexCSS = 0;
$indexJS = 0;

// CSS file
$cssDump = "pre span, .example-span, .js-succeed { padding: .2em; margin: .2em 0; display: block; border-radius: 3px; }\n.example-span, .js-succeed { background: lightgreen; }\n.example-span { display: inline-block !important; }\n\r";
// JS file
$jsDump = "var testClass = 'js-succeed';\n\r";

array_sort_by_column($hacks, 'type', SORT_DESC);

foreach($browsers as $kb => $vb):
  ?>
  <article data-high="3" class="<?php echo $kb; ?>" id="<?php echo $kb ?>">
    <section data-cols="1">
      <h2 class="th"><span class='browser-<?php echo $kb; ?>'></span> <a href="#<?php echo $kb ?>"><?php echo ucfirst($vb['name']); ?></a></h2>
  <?php
      foreach($hacks as $k):
        // Check if current hack is from current browser
        // If it isn't or if current hack is not from current type, break
        $checkBrowser = in_array($kb, $k['browser']);
        if(!$checkBrowser || empty($k['test'])) continue;
        
        // Increment indexes
        $indexCSS++;
        $indexJS++;

        // If current type is different from type of last hack, display type heading
        
        if($k['type'] != $last_type) {
          ?>
          </section>
          <section data-cols="1" data-type="<?php echo $k['type']; ?>-parent">
            <h3><!--<span class="<?php echo $hack_types[$k['type']]['icon']; ?>"></span>--><?php echo $hack_types[$k['type']]['title']; ?></h3>
          </section>
          <section data-cols="1" data-type="<?php echo $k['type']; ?>-childs">
          <?php
        }
        
        // Get the index of the current browser in the array of hacked browsers
        // Create the data-version output based on the $version variable
        $version = $checkBrowser ? array_search($kb, $k['browser']) : null; 
        $dv = ($k['data-version'][$version] != 0) ? "data-version='".$k['data-version'][$version]."'" : '';

        // CAPTION
        $caption = "<ul class='browser-list'>";

        $i = 0;
        foreach($k['browser'] as $b) {

          $label = ucfirst($browsers[$b]['name']);
          $displayVersion = returnVersion($k['data-version'][$i]);
          $displayVersion = str_replace('|','/', $displayVersion);  

          $caption .= "<li class='browser-list__item'><span class='browser-icon browser-".$b."'></span> <span class='browser-name'>".$label."</span>";
          if($k['data-version'][$i] != '') $caption .= " <span class='browser-version'>".$displayVersion."</span>";
          $caption .= "</li>"; 
          $i++;
        }

        $caption .= "</ul>";
        // END CAPTION

        // OUTPUT
        $dump  = "<div class='hack-wrapper'>";
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
            $cssDump .= "/* ".$k['label']." */\n";
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
            $jsDump .= "/* ".$k['label']." */\n";
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
        
        echo $dump;
        //END DUMP

        // Set new last type
        $last_type = $k['type'];
        endforeach; ?>
    </section>
  </article>
<?php endforeach; 

// Create/update test files
$CSSFile = "css/browserhacks-test-page.css";
$JSFile  = "js/browserhacks-test-page.js";

$currentCSSFile = file_get_contents($CSSFile);
$currentJSFile  = file_get_contents($JSFile);

if($currentCSSFile != $cssDump) file_put_contents("css/browserhacks-test-page.css", $cssDump);
if($currentJSFile  != $jsDump)  file_put_contents("js/browserhacks-test-page.js", $jsDump);
?>
