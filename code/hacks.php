<?php

  $hacks = array (
    'ch' => array (
      'name' => 'Chrome',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Chrome, Safari 3+, Opera 9+, Firefox 3.5+',
            'language' => 'language-css',
            'code' => "body:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}"
          ),
          array (
            'version' => 'Chrome and Safari (version?)',
            'language' => 'language-css',
            'code' => "::made-up-pseudo-element, .selector {}"
          )
        )
      )
    ),
    'fx' => array (
      'name' => 'Firefox',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Firefox 3.5+, Chrome, Safari 3+, Opera 9+',
            'language' => 'language-css',
            'code' => "body:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}"
          ),
          array (
            'version' => 'Firefox 3.5+',
            'language' => 'language-css',
            'code' => "body:not(:-moz-handler-blocked) .selector {}"
          )
        )
      )
    ),
    'ie' => array (
      'name' => 'Internet Explorer',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'IE6 and below',
            'language' => 'language-css',
            'code' => "* html .selector  {} \n.suckyie6.selector {} /* .suckyie6 can be any unused class */"
          ),
          array (
            'version' => 'IE7 and below',
            'language' => 'language-css',
            'code' => ".selector, {}"
          )
        )
      )
    ),
    'sa' => array (
      'name' => 'Safari',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Safari 3+, Firefox 3.5+, Chrome, Opera 9+',
            'language' => 'language-css',
            'code' => "body:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}"
          ),
          array (
            'version' => 'Safari (version?) and Chrome',
            'language' => 'language-css',
            'code' => "::made-up-pseudo-element, .selector {}"
          )
        )
      )
    ),
    'op' => array (
      'name' => 'Opera',
      'hacks' => array(
        'selector' => array(
          array (
            'version' => 'Opera 9+, Safari 3+, Firefox 3.5+, Chrome',
            'language' => 'language-css',
            'code' => "body:nth-of-type(1) .selector {} \nbody:first-of-type .selector {}"
          ),
          array (
            'version' => 'Opera 9.27 and below, Safari 2',
            'language' => 'language-css',
            'code' => "html:first-child .selector {}"
          )
        )
      )
    )
  );
?>


<?php 
  // Browser
  foreach($hacks as $name => $browser): 
?>

  <article data-high="3" data-text="" class="<?php echo $name; ?>">
    <section data-cols="1">
        <h2 class="th"><?php echo $browser['name']; ?></h2>
    </section>

    <section data-cols="1">
      <h3><span class="entypo-lamp"></span>Selector Hacks</h3>
    </section>
  
    <?php 
      // Type of hack
      foreach($browser['hacks'] as $hack): 
    ?>
  
      <section data-cols="2">
      
        <?php 
          // Single hack
          for($i = 0; $i < count($hack); $i++): 
        ?>
          <div>
            <pre class="<?php echo $hack[$i]['language']; ?>"><code><?php echo "/* " . $hack[$i]['version'] . " */\n";
            echo $hack[$i]['code']; ?></code></pre>
          </div>
        <?php endfor; ?>
        
      </section>
  
    <?php endforeach; ?>
  
    </article>
  
<?php endforeach; ?>