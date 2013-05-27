<?php
$last_type = null;

foreach($browsers as $kb => $vb):
  ?>
  <article data-high="3" class="<?php echo $kb; ?>" id="<?php echo $kb ?>">
    <section data-cols="1">
      <h2 class="th"><a href="#<?php echo $kb ?>"><?php echo $vb['name']; ?></a></h2>
  <?php
      foreach($hacks as $k):
        // Check if current hack is from current browser
        // If it isn't or if current hack is not from current type, break
        $checkBrowser = in_array($kb, $k['browser']);
        if(!$checkBrowser) continue;

        if($k['type'] != $last_type) {
          ?>
          </section>
          <section data-cols="1" data-type="<?php echo $k['type']; ?>-parent">
            <h3><span class="<?php echo $hack_types[$k['type']]['icon']; ?>"></span><?php echo $hack_types[$k['type']]['title']; ?></h3>
          </section>
          <section data-cols="2" data-type="<?php echo $k['type']; ?>-childs">
          <?php
        }

        // Get the index of the current browser in the array of hacked browsers
        $version = $checkBrowser ? array_search($kb, $k['browser']) : null; 

        // Create the data-version output based on the $version variable
        $dv = ($k['data-version'][$version] != 0) ? "data-version='".$k['data-version'][$version]."'" : '';

        // Create label if it's empty
        if(empty($k['label'])) {
          $label = "/* "; $i = 0;
          $targetBrowsers = $k['browser'];

          // For each target browser by the current hack
          foreach($targetBrowsers as $b) {
            // Display browser's name
            $label .= ucfirst($browsers[$b]['name']);
            // If a version is specified, display version
            $displayVersion = str_replace('|','/',$k['data-version'][$i]);
            if($k['data-version'][$i] != '') $label .= ' '.$displayVersion;
            $i++; // Increment
            // If it's not the last browser, put a comma
            if($i != count($targetBrowsers)) $label .= ", ";
          }

          $label .= " */\n"; // End label

        } else {
          $label = "/* ".$k['label']." */\n";
        }

        // Output the hack
        echo "<div><pre class='language-".$k['language']."' ".$dv."><code>".$label.$k['code']."</code></pre></div>";
        
        $last_type = $k['type'];
        endforeach; ?>
    </section>
  </article>
<?php endforeach; ?>