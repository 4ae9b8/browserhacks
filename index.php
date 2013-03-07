<!doctype html>
<html lang="en">
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
</head>

<?php
  // Load Browserhacks and run it
  include_once('code/Browserhacks.php');
  Browserhacks::run();
?>

<body id="browserhacks" data-max-width="1024" data-theme="browserhacks" data-auto-extend="true">

    <ul class="nav-browser clearfix">
        <li class="ch"><a href="#ch">Google Chrome</a></li>
        <li class="fx"><a href="#fx">Mozilla Firefox</a></li>
        <li class="ie"><a href="#ie">Internet Explorer</a></li>
        <li class="op"><a href="#op">Opera</a></li>
        <li class="sa"><a href="#sa">Safari</a></li>
    </ul>


    <article data-high="1">
        <section data-cols="1" >
            <h1>Browserhacks</h1>
                
            <p class="catch-phrase">
                #browser { 
                <span class="catch-phrase__anim">
                    <span>_</span>
                    <span>-</span>
                    <span>£</span>
                    <span>¬</span>
                    <span>¦</span>
                    <span>!</span>
                    <span>$</span>
                    <span>&amp;</span>
                    <span>*</span>
                    <span>(</span>
                    <span>)</span>
                    <span>=</span>
                    <span>%</span>
                    <span>+</span>
                    <span>@</span>
                    <span>,</span>
                    <span>.</span>
                    <span>/</span>
                    <span>`</span>
                    <span>[</span>
                    <span>]</span>
                    <span>#</span>
                    <span>~</span>
                    <span>?</span>
                    <span>:</span>
                    <span>&lt;</span>
                    <span>&gt;</span>
                    <span>|</span>
                </span>
                <span class="catch-phrase__space">hack</span>: now; }
            </p>
        </section>
    </article>  
    
    <!-- Social -->
    <article data-high="2">
        <section data-cols="2">
            <div data-type="search">
                <p class="form-wrapper">
                    <label for="search"><span class="fontawesome-search"></span> Find a hack</label>
                    <input type="text" name="search" id="search" placeholder="i.e. 'ie6'">
                </p>
            </div>
            <div data-type="top-buttons">
                <section data-cols="1" class="btn-group">
                    <div>
                        <a href="https://github.com/4ae9b8/browserhacks" target="_blank">
                            <button data-type="2"><span class="fontawesome-github"></span> Add hacks or report bugs</button>
                        </a>
                    </div>
                    <div>
                        <a href="http://twitter.com/share?text=An+extensive+list+of+CSS/JS+@Browserhacks+from+all+over+the+interwebs+curated+by+@HugoGiraudel+and+@TimPietrusky&url=http://browserhacks.com" target="_blank">
                            <button data-type="2"><span class="fontawesome-twitter"></span> Spread the word</button>
                        </a>
                    </div>
                    <div>
                        <a href="http://test.browserhacks.<?php echo Browserhacks::getTLD(); ?>" target="_blank">
                            <button data-type="2"><span class="fontawesome-magic"></span> Almighty test page</button>
                        </a>
                    </div>
                </section>
            </div>
        </section>
    </article>
    
    <article data-high="1" data-type="description">
        <section data-cols="3" data-valign="center" class="top-content">
            <div>
                <h2 data-type="1"><span class="fontawesome-info-sign"></span>What's this?</h2>
                <p>Browserhacks is an extensive list of <strong>browser specific CSS and JavaScript hacks</strong> from all over the interwebs. Special thanks to <a href="http://paulirish.com/2009/browser-specific-css-hacks/">Paul Irish' comprehensive post</a> and <a href="https://gist.github.com/983116">Nicolas Gallagher's additions</a>. </p>
            </div>
            <div>
                <h2 data-type="2"><span class="fontawesome-question-sign"></span>How to?</h2>
                <ol>
                    <li>Pick the hack you want</li>
                    <li>Copy it into your stylesheet</li>
                    <li>Add the style you want between the braces</li>
                    <li>Enjoy the new styles for the browser you targeted!</li>
                </ol>
            </div>
            <div>
                <h2 data-type="3"><span class="fontawesome-warning-sign"></span>Reminder!</h2>
                <p>Please keep in mind using a hack is not always the perfect solution. It can be useful to fix some weird browser specific bug, but in most cases you should fix your CSS/JS.</p>
            </div>
        </section>
    </article>
        
<?php
  // HTML for the hacks
  include_once('code/hacks.php');
?>
    

    <!-- Quotes -->
    <article data-high="4">
      <section data-cols="1" class="quotes">
          <blockquote class="quote"></blockquote>
          <ul class="quote-authors clearfix"></ul>
      </section>
    </article>


    <!-- Social -->
    <article data-high="4">
        <section data-cols="3">
            <div>
                <a href="https://github.com/4ae9b8/browserhacks" target="_blank">
                    <button data-type="1"><span class="fontawesome-github"></span> Add hacks or report bugs</button>
                </a>
            </div>
            <div>
                <a href="http://twitter.com/share?text=An+extensive+list+of+CSS/JS+@Browserhacks+from+all+over+the+interwebs+curated+by+@HugoGiraudel+and+@TimPietrusky&url=http://browserhacks.com" target="_blank">
                    <button data-type="1"><span class="fontawesome-twitter"></span> Spread the word</button>
                </a>
            </div>
            <div>
                <a href="http://test.browserhacks.<?php echo Browserhacks::getTLD(); ?>" target="_blank">
                    <button data-type="1"><span class="fontawesome-magic"></span> Almighty test page</button>
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
                        <a href="#browserhacks" title="top" class="btn-top"><span class="fontawesome-circle-arrow-up"></span></a>
                    </p>
                        
                    <p>    
                        &copy; Handcrafted 2013 by <a href="https://twitter.com/HugoGiraudel" target="_blank" class="avatar avatar--hugo">Hugo Giraudel</a> 
                        and <a href="https://twitter.com/TimPietrusky" target="_blank" class="avatar avatar--tim">Tim Pietrusky</a> 
                        with contributions of the <a href="http://4ae9b8.com" target="_blank">#4ae9b8</a> Team.</p>
                    </p>
                </footer>
            </div>
        </section>
    </article>  
    
    <script id="template_author" type="text/template">
        <div class="quote-authors__avatar">
          <img src="<%= avatar %>" alt="<%= author %>'s Twitter Avatar">
        </div>

        <a href="<%= from %>" class="quote-authors__name" target="_blank"><%= author %></a>
    </script>

    <script id="template_quote" type="text/template">
       <p class="quote-content"><%= quote %></p> 
       &mdash; <a href="<%= from %>" class="quote-author" target="_blank"><%= author %></a>
    </script>

    <script src="js/libs.js"></script>
    <script src="js/main.js"></script>

    <!--[if (gte IE 6)&(lte IE 8)]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="js/selectivizr-min.js"></script>
    <![endif]-->   
    
    <?php if (Browserhacks::isLive()): ?>
        <script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-38522111-1']);_gaq.push(['_setDomainName', 'browserhacks.com']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
    <?php endif; ?>
    </body>
</html>
