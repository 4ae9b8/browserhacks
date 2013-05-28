<!doctype html>
<!--[if lt IE 9]> <html class="ie"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>Browserhacks - Tests</title>

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
    <link rel="stylesheet" href="css/browserhacks-test-page.css">
    <link rel="shortcut icon" href="img/browserhacks.ico" type="image/x-icon">
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <link rel="stylesheet" href="css/browserhacks-ie.css">
      <script src="js/browser-icons-IE7.jg"></script>
    <![endif]-->
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
            <h1><a href="/">Browserhacks</a></h1>
        </section>
        <p class="catch-phrase">
            #test { <span class="catch-phrase__anim">
                    <span>_</span><span>-</span><span>£</span><span>¬</span>
                    <span>¦</span><span>!</span><span>$</span><span>&amp;</span>
                    <span>*</span><span>(</span><span>)</span><span>=</span>
                    <span>%</span><span>+</span><span>@</span><span>,</span>
                    <span>.</span><span>/</span><span>`</span><span>[</span>
                    <span>]</span><span>#</span><span>~</span><span>?</span>
                    <span>:</span><span>&lt;</span><span>&gt;</span><span>|</span>
                </span><span class="catch-phrase__space">it</span>: now; }
        </p>
    </article>

    <article data-high="1" class="header-test">
        <section data-cols="2">
            <div>
                <h2><span class="fontawesome-cog"></span>How does it work?</h2>
                <p>When your browser matches a selector, the line turns <span class="example-span">green</span>. In most cases, it means your browser is likely to be targeted with a CSS hacks. You can't do much about it, sorry!</p>
                <p><strong>However</strong>, when the point is to target <em>everything but X</em> (which in most cases is IE), being <span class="example-span">green</span> means your browser is standard compliant so it's a very good thing!</p>
            </div>
            <div>
                <h2><span class="fontawesome-flag"></span>Want to report something weird?</h2>
                <p>You can help us making this tool even more accurate by reporting things you think are weird or even bugs. Or even better, if you ever happen to find a new hacks, just <a href="https://github.com/4ae9b8/browserhacks/issues?state=open">open an issue on a bug tracker on GitHub</a>. Thanks! :)</p>
            </div>
        </section>
    </article>

    <?php
    // OUTPUT THE WHOLE SHIT
    include_once('code/database.php');
    include_once('code/runTest.php');
    ?>

     <article data-high="3" class="footer-test">
        <section data-cols="1">
            <div>
                <footer>
                    <p>
                        <a href="#browserhacks" title="top" class="btn-top"><span class="fontawesome-circle-arrow-up"></span></a>
                    </p>

                    <p>
                        Handcrafted 2013 by <a href="https://twitter.com/HugoGiraudel" target="_blank" class="avatar avatar--hugo">Hugo Giraudel</a>
                        and <a href="https://twitter.com/TimPietrusky" target="_blank" class="avatar avatar--tim">Tim Pietrusky</a>
                        with contributions of the <a href="https://github.com/4ae9b8?tab=members" target="_blank">#4ae9b8</a> Team.</p>
                    </p>
                </footer>
            </div>
        </section>
    </article>

    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <script src="js/modernizr.custom.38859.js"></script>
    <script src="js/browserhacks-test-page.js"></script>

    <script type="text/javascript">
    // Fallback CSS animation
    if (!Modernizr.cssanimations){
      // @TODO: [TimPietrusky] - Find a better place for this
      var tips = ["_","-", "£", "¬", "¦", "!", "$", "&", "*", "(", ")", "=", "%", "+", "@", ",", ".", "/", "`", "[", "]", "#", "~", "?", ":", "<", ">", "|"];

      setInterval(function() {
        var i = Math.round((Math.random()) * tips.length);
        if (i == tips.length) --i;
        $(".catch-phrase__anim").html(tips[i]);
      }, 400);
    }
    </script>

    <?php if (Browserhacks::isLive()): ?>
        <script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-38522111-1']);_gaq.push(['_setDomainName', 'browserhacks.com']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
    <?php endif; ?>
    </body>
</html>