<!doctype html>
<!--[if lt IE 9]> <html class="ie"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Browserhacks</title>

    <meta charset="utf-8">
    <meta name="author" content="Hugo Giraudel, Tim Pietrusky">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="1 days">
    <meta name="description" content="An extensive list of browser specific CSS and JavaScript hacks from all over the interwebs.">

    <meta property="og:title" content="Browserhacks">
    <meta property="og:description" content="An extensive list of browser specific CSS and JavaScript hacks from all over the interwebs.">
    <meta property="og:image" content="http://browserhacks.com/img/browserhacks_200.jpg">
    <meta property="og:url" content="http://browserhacks.com">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="css/browserhacks.css">
    <link rel="shortcut icon" href="img/browserhacks.ico" type="image/x-icon">
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <link rel="stylesheet" href="css/browserhacks-ie.css">
      <script src="js/browserhacks-icons-IE7.js"></script>
    <![endif]-->
</head>

<?php
  // Load Browserhacks and run it
  include_once('code/Browserhacks.php');
  include_once('code/functions.php');
  Browserhacks::run();
?>

<body id="browserhacks" data-max-width="1024" data-theme="browserhacks" data-auto-extend="true">

    <ul class="nav-browser clearfix">
        <li class="ch"><a href="#ch"><span class='browserhacks-ch'></span></a></li>
        <li class="fx"><a href="#fx"><span class='browserhacks-fx'></span></a></li>
        <li class="ie"><a href="#ie"><span class='browserhacks-ie'></span></a></li>
        <li class="op"><a href="#op"><span class='browserhacks-op'></span></a></li>
        <li class="sa"><a href="#sa"><span class='browserhacks-sa'></span></a></li>
    </ul>
    
    <!-- Social -->
    <article data-high="2" class="header">
        <section data-cols="2">
            <div>
                <h1><a href="/" class="logo">Browser<span>hacks</span></a></h1>
            </div>
            <div data-type="search">
                <p class="form-wrapper">
                    <label for="search" class='visually-hidden'> Find a hack</label>
                    <input type="text" name="search" id="search" placeholder="Search e.g. IE 6 or chrome" spellcheck="false">
                </p>
            </div>
        </section>
        
        <section data-cols="3" class="btn-group">
            <div>
                <a href="https://github.com/4ae9b8/browserhacks" target="_blank">
                    <button data-type="2"><span class="browserhacks-github"></span> Add hacks / report bugs</button>
                </a>
            </div>
            <div>
                <a href="http://test.browserhacks.<?php echo Browserhacks::getTLD(); ?>" target="_blank">
                    <button data-type="2"><span class="browserhacks-magic"></span> Almighty test page</button>
                </a>
            </div>
            <div>
                <a href="http://twitter.com/Browserhacks" target="_blank">
                    <button data-type="2"><span class="browserhacks-twitter"></span> @browserhacks</button>
                </a>
            </div>
        </section>
    </article>
    
    <article data-high="1" data-type="description">
        <section data-cols="3" data-valign="center">
            <div>
                <h2 data-type="1"></span>What's this?</h2>
                <p>Browserhacks is an extensive list of <strong>browser specific CSS and JavaScript hacks</strong> from all over the interwebs.
                <!-- Special thanks to <a href="http://paulirish.com/2009/browser-specific-css-hacks/">Paul Irish' comprehensive post</a> and <a href="https://gist.github.com/983116">Nicolas Gallagher's additions</a>.-->
                <span class="desktop-only">Press the first letter of a browser to jump to the according section, like <span class="shortcut">F</span> for Firefox.</span></p>
            </div>
            <div>
                <h2 data-type="2">How to?</h2>
                <ol>
                    <li>Pick the hack you want</li>
                    <li>Copy it into your stylesheet</li>
                    <li>Add the style you want between the braces</li>
                    <li>Enjoy the new styles for the browser you targeted!</li>
                </ol>
            </div>
            <div>
                <h2 data-type="3"></span>Reminder!</h2>
                <p>Please keep in mind using a hack is not always the perfect solution. It can be useful to fix some weird browser specific bug, but in most cases you should fix your CSS/JS or use <a href="http://modernizr.com">feature detection</a>.</p>
            </div>
        </section>
    </article>
        
<?php
  // HTML for the hacks
  include_once('code/database.php');
  include_once('code/run.php');
?>
    

    <!-- Quotes -->
    <article data-high="4" id="quotes">
      <section data-cols="1" class="quotes">
        <div>
          <blockquote class="quote"></blockquote>
          <ul class="quote-authors"></ul>
        </div>
      </section>
    </article>


    <!-- Social -->
    <article data-high="4">
        <section data-cols="3" class="btn-group">
            <div>
                <a href="https://github.com/4ae9b8/browserhacks" target="_blank">
                    <button data-type="2"><span class="browserhacks-github"></span> Add hacks / report bugs</button>
                </a>
            </div>
            <div>
                <a href="http://test.browserhacks.<?php echo Browserhacks::getTLD(); ?>" target="_blank">
                    <button data-type="2"><span class="browserhacks-magic"></span> Almighty test page</button>
                </a>
            </div>
            <div>
                <a href="http://twitter.com/share?text=An+extensive+list+of+CSS/JS+@Browserhacks+from+all+over+the+interwebs+curated+by+@HugoGiraudel+and+@TimPietrusky&url=http://browserhacks.com" target="_blank">
                    <button data-type="2"><span class="browserhacks-twitter"></span> Spread the word</button>
                </a>
            </div>
        </section>
    </article>

    <!-- Top & Handcrafted -->
    <article data-high="3">
        <section data-cols="1">
            <div>
                <footer>
                    <p>    
                        <a href="#browserhacks" title="top" class="btn-top"><span class="browserhacks-arrow-up"></span></a>
                        &copy; Handcrafted 2013 by <a href="https://twitter.com/HugoGiraudel" target="_blank" class="avatar avatar--hugo">Hugo Giraudel</a> 
                        and <a href="https://twitter.com/TimPietrusky" target="_blank" class="avatar avatar--tim">Tim Pietrusky</a> 
                        with contributions of the <a href="http://4ae9b8.com" target="_blank">#4ae9b8</a> Team.</p>
                    </p>
                </footer>
            </div>
        </section>
    </article>  
    
    <!-- Template: Quote -->
    <script id="template_quote" type="text/template">
       <p class="quote-content"><%= quote %></p> 
       &mdash; <a href="<%= from %>" class="quote-author" target="_blank"><%= author %></a>
    </script>
    
    <!-- Template: Author -->
    <script id="template_author" type="text/template">
        <div class="quote-authors__avatar">
          <div class="avatar-<%= twitter %>"></div>
        </div>

        <a href="<%= from %>" class="quote-authors__name" target="_blank"><%= author %></a>
    </script>

    <script src="js/libs.js"></script>
    <script src="js/main.js"></script>
    <script>
    // @TIM: Move into new Backbone VIEW
    var isCtrl = false;

    $(document).on('keyup', function(e) {
        if(e.which == 17) isCtrl = false;
    });

    $(document).on('keydown', function (e) {
      var el;
      if(e.which == 17) isCtrl = true;

      if(e.which == 67 && !isCtrl) el = document.getElementById('ch');
      if(e.which == 83 && !isCtrl) el = document.getElementById('sa');
      if(e.which == 79 && !isCtrl) el = document.getElementById('op');
      if(e.which == 70 && !isCtrl) el = document.getElementById('fx');
      if(e.which == 73 && !isCtrl) el = document.getElementById('ie');

      if (typeof el !== "undefined") {
        el.scrollIntoView(true);
      }
    });
    </script>

    <?php if (Browserhacks::isLive()): ?>
        <script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-38522111-1']);_gaq.push(['_setDomainName', 'browserhacks.com']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
    <?php endif; ?>
    </body>
</html>
