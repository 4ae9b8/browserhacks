<!doctype html>
<html lang="en">
<head>
    <title>Browserhacks</title>

    <meta charset="utf-8">
    <meta name="author" content="Hugo Giraudel, Tim Pietrusky">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="1 days">
    <meta name="description" content="An extensive list of browserhacks from all over the interwebs.">

    <meta property="og:title" content="browserhacks.com">
    <meta property="og:description" content="An extensive list of browserhacks from all over the interwebs.">
    <meta property="og:image" content="http://browserhacks.com/img/browserhacks_200.jpg">
    <meta property="og:url" content="http://browserhacks.com">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="css/crystallo-min.css">
    <link rel="stylesheet" href="css/browserhacks.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body id="browserhacks" data-max-width="1024" data-theme="browserhacks" data-auto-extend="true">

    <article data-high="1">
        <section data-cols="1" >
            <h1>Browserhacks</h1>
                
            <p class="catch-phrase">
                #browser { <span class="catch-phrase__anim"></span><span class="catch-phrase__space">hack</span>: now; }
            </p>
        </section>
    </article>
    
    <article data-high="2">    
        <section data-cols="1">
          <div>
              <input type="text" placeholder="What?">
          </div>
        </section>
    </article>
    
    <article data-high="1">
        <section data-cols="3" data-valign="center">
            <div>
                <h2><span class="fontawesome-info-sign"></span>What's this?</h2>
                <p>Browserhacks is an extensive list of browser specific CSS and JavaScript hacks from all over the interwebs. Special thanks to <a href="http://paulirish.com/2009/browser-specific-css-hacks/">Paul Irish' comprehensive post</a> and <a href="https://gist.github.com/983116">Nicolas Gallagher's additions</a>. </p>
            </div>
            <div>
                <h2><span class="fontawesome-question-sign"></span>How to?</h2>
                <p>Nothing easier.</p>
                <ol>
                    <li>Pick the hack you want,</li>
                    <li>Copy it into your stylesheet,</li>
                    <li>Add the style you want between the braces,</li>
                    <li>Enjoy the new styles for the browser you targeted!</li>
                </ol>
            </div>
            <div>
                <h2><span class="fontawesome-warning-sign"></span>Reminder!</h2>
                <p>Please keep in mind using a hack is not always the perfect solution. It can be useful to fix some weird browser specific bug, but in most case you might want to check your CSS to see if you can fix the problem with a clean solution before using some browser sniffing.</p>
            </div>
        </section>
    </article>
        
<?php
  // HTML for the hacks
  include_once('code/hacks.php');
?>
    
    <!-- Social -->
    <article data-high="4">
        <section data-cols="3">
            <div>
                <a href="https://github.com/4ae9b8/browserhacks" target="_blank">
                    <button data-type="2"><span class="fontawesome-github"></span>Fork me</button>
                </a>
            </div>
            <div>
                <a href="http://twitter.com/share?text=An+extensive+list+of+browserhacks+from+all+over+the+interwebs+curated+by+@HugoGiraudel+and+@TimPietrusky&url=http://browserhacks.com" target="_blank">
                    <button data-type="1"><span class="fontawesome-twitter"></span>Spread the word</button>
                </a>
            </div>
            <div>
                <a href="test.html" target="_blank">
                    <button data-type="2"><span class="fontawesome-road"></span>Test page</button>
                </a>
            </div>
        </section>
    </article>

    <!-- Top & Handcrafted -->
    <article data-high="3">
        <section data-cols="1">
            <div>
                <footer>
                    <p><a href="#browserhacks" title="top" class="btn-top"><span class="fontawesome-angle-up"></span></a>Handcrafted 2013 by <a href="http://twitter.com/HugoGiraudel" target="_blank">@HugoGiraudel</a> &amp; <a href="http://twitter.com/TimPietrusky" target="_blank">@TimPietrusky</a>.</p>
                </footer>
            </div>
        </section>
    </article>  


    <!-- hackTemplate -->
    <script id="hackTemplate" type="text/template">
        <section data-cols="2">
            <div>
            </div>
        </section>
    </script>

    <script src="js/libs.js"></script>
    <script src="js/main.js"></script>

    <!-- 
    <script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-5596313-7']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
    -->
    </body>
</html>