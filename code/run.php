<?php
// Save type from last hack
$last_type = null;

// Re-ordering array by type
function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

array_sort_by_column($hacks, 'type', SORT_DESC);

// Sort by browser
foreach($browsers as $kb => $vb):
  // Output browser heading
  ?>
  <article data-high="3" class="<?php echo $kb; ?>" id="<?php echo $kb ?>">
    <section data-cols="1">
      <h2 class="th"><span class='browser-<?php echo $kb; ?>'></span> <a href="#<?php echo $kb ?>"><?php echo ucfirst($vb['name']); ?></a></h2>
  <?php
      // Foreach hack
      foreach($hacks as $k):
        // Check if current hack is from current browser
        // If it isn't, break
        $checkBrowser = in_array($kb, $k['browser']);
        if(!$checkBrowser) continue;

        // If current type is different from type of last hack, display type heading
        if($k['type'] != $last_type) {
          ?>
          </section>
          <section data-cols="1" data-type="<?php echo $k['type']; ?>-parent">
            <h3><!--<span class="<?php echo $hack_types[$k['type']]['icon']; ?>"></span>--><?php echo $hack_types[$k['type']]['title']; ?></h3>
          </section>
          <section data-cols="2" data-type="<?php echo $k['type']; ?>-childs">
          <?php
        }

        // Get the index of the current browser in the array of hacked browsers
        // Create the data-version output based on the $version variable
        $version = $checkBrowser ? array_search($kb, $k['browser']) : null; 
        $dv = (!empty($k['data-version'][$version])) ? "data-version='".$k['data-version'][$version]."'" : '';

        // CAPTION
        $caption = "<ul class='browser-list'>";

        $i = 0;
        foreach($k['browser'] as $b) {

          $label = ucfirst($browsers[$b]['name']);
          $displayVersion = ($k['data-version'][$i] != '') ? str_replace('|','/',$k['data-version'][$i]) : '*';
            
          $caption .= "<li class='browser-list__item'><span class='browser-icon browser-".$b."'></span> <span class='browser-name'>".$label."</span>";
          $caption .= " <span class='browser-version'>".$displayVersion."</span>";
          $caption .= "</li>"; 
          $i++;
        }

        $caption .= "</ul>";
        // END CAPTION

        // Output the hack
        $dump  = "<div class='hack-wrapper' ".$dv.">";
        $dump .= "<pre class='language-".$k['language']."'>";
        $dump .= "<code>";
        $dump .= (!empty($k['label'])) ? "/* ".$k['label']." */\n" : '';
        $dump .= $k['code'];
        $dump .= "</code>";
        $dump .= "</pre>";
        $dump .= $caption;
        $dump .= "</div>";
        
        echo $dump;
        // Set new last type
        $last_type = $k['type'];
        endforeach; ?>
    </section>
  </article>
<?php endforeach; 
?>
