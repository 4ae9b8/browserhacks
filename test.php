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
    <!--[if IE]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE 7]>
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

<body id="browserhacks" data-max-width="1024" data-theme="browserhacks" data-auto-extend="true" class="test-page">
    <!--
    <ul class="nav-browser clearfix">
        <li class="ch"><a href="#ch"><span class='browserhacks-ch'></span></a></li>
        <li class="fx"><a href="#fx"><span class='browserhacks-fx'></span></a></li>
        <li class="ie"><a href="#ie"><span class='browserhacks-ie'></span></a></li>
        <li class="op"><a href="#op"><span class='browserhacks-op'></span></a></li>
        <li class="sa"><a href="#sa"><span class='browserhacks-sa'></span></a></li>
        <li class="an"><a href="#an"><span class='browserhacks-an'></span></a></li>
   </ul>
    -->

    <article data-high="2" class="header">
        <section data-cols="1">
            <div>
                <h1 class="header__title"><a href="/" class="logo">Browser<span>hacks</span></a> Testpage</h1>
            </div>
        </section>
        <section data-cols="2">
            <div>
                <h2><span class="fontawesome-cog"></span>How does it work?</h2>
                <p>When your browser matches a selector, the line turns <span class="example-span">green</span>. In most cases, it means your browser is likely to be targeted with a CSS hacks. You can't do much about it, sorry!</p>
                <p><strong>However</strong>, when the point is to target <em>everything but X</em> (which in most cases is IE), being <span class="example-span">green</span> means your browser is standard compliant so it's a very good thing!</p>
            </div>
            <div>
                <h2><span class="fontawesome-flag"></span>Want to report something?</h2>
                <p>You can help us making this tool even more accurate by reporting things you think are weird or even bugs. Or even better, if you ever happen to find a new hacks, just <a href="https://github.com/4ae9b8/browserhacks/issues?state=open">open an issue on a bug tracker on GitHub</a>. Thanks! :)</p>
                <div id="carbonads-container">
                    <div class="carbonad" style="margin: .5em auto">
                        <div id="azcarbon"></div>
                    </div>
                </div>
            </div>
        </section>
    </article>


    <?php
    // OUTPUT THE WHOLE SHIT
      // HTML for the hacks
    include_once('code/db_browsers.php');
    include_once('code/db_hackTypes.php');
    include_once('code/db_hacks.php');
    include_once('code/runTest.php');
    ?>

     <article data-high="3" class="footer-test">
        <section data-cols="1">
            <div>
                <footer>

                    <p>
                        <a href="#browserhacks" title="top" class="btn-top"><span class="browserhacks-arrow-up"></span></a>
                        Handcrafted 2013 by <a href="https://twitter.com/HugoGiraudel" target="_blank" class="avatar avatar--hugo">Hugo Giraudel</a>
                        and <a href="https://twitter.com/TimPietrusky" target="_blank" class="avatar avatar--tim">Tim Pietrusky</a>
                        with contributions of the <a href="https://github.com/4ae9b8?tab=members" target="_blank">#4ae9b8</a> Team.</p>
                    </p>
                </footer>
            </div>
        </section>
    </article>

    <script src="js/libs.js"></script>
    <!--<script src="js/lib/browserdetect-min.js"></script>-->
    <script src="js/browserhacks-test-page.js"></script>
    <?php if (Browserhacks::isLive()): ?>
        <script src="js/main-min.js"></script> 
        <script type="text/javascript">var _gaq = _gaq || [];_gaq.push(['_setAccount', 'UA-38522111-1']);_gaq.push(['_setDomainName', 'browserhacks.com']);_gaq.push(['_trackPageview']);(function() {var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
    <?php else: ?>
        <script src="js/main.js"></script>
    <?php endif; ?>
    </body>
</html>