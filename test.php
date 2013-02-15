<!doctype html>
<html lang="en">
<head>
    <title>Browserhacks - Tests</title>

    <meta charset="utf-8">
    <meta name="author" content="Hugo Giraudel, Tim Pietrusky">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="1 days">
    <meta name="description" content="An extensive list of browserhacks from all over the interwebs.">

    <meta property="og:title" content="browserhacks.com">
    <meta property="og:description" content="An extensive list of browserhacks from all over the interwebs.">
    <meta property="og:image" content="http://browserhacks.com/img/browserhacks_200.jpg">
    <meta property="og:url" content="http://browserhacks.com">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0">

    <link rel="stylesheet" href="css/browserhacks.css">
    <link rel="stylesheet" href="css/browserhacks-tests.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <script src="js/modernizr.custom.38859.js"></script>
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
        <li class="sa"><a href="#sa">Safari</a></li>
        <li class="op"><a href="#op">Opera</a></li>
    </ul>

    <article data-high="1">
        <section data-cols="1" >
            <h1><a href="/">Browserhacks</a></h1>
        </section>
        <p class="catch-phrase">
            #test { <span class="catch-phrase__anim">
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
                </span><span class="catch-phrase__space">it</span>: now; }
        </p>
    </article>

    <article data-high="1">
        <section data-cols="2">
            <div>
                <h2><span class="fontawesome-cog"></span>How does it work?</h2>
                <p>When your browser matches a selector, the line turns <span class="example-span">green</span>. In most cases, it means your browser is likely to be targeted with a CSS hacks. You can't do much about it, sorry!</p>
                <p><strong>However</strong>, when the point is to target <em>everything but X</em> (which in most cases is IE), being <span class="example-span">green</span> means your browser is standard compliant so it's a very good thing!</p>
            </div>
            <div>
                <h2><span class="fontawesome-cog"></span>Want to report something weird?</h2>
                <p>You can help us making this tool even more accurate by reporting things you think are weird or even bugs. Or even better, if you ever happen to find a new hacks, just <a href="https://github.com/4ae9b8/browserhacks/issues?state=open">open an issue on a bug tracker on GitHub</a>. Thanks! :)</p>
            </div>
        </section>
    </article>


<article data-high="3" data-text="" class="ch" id="ch">
    <section data-cols="1">
        <h2 class="th">Chrome</h2>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-link"></span>Selector hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* Safari (version?) and Chrome (not Canary) */
<span class="test59">::made-up-pseudo-element, .selector { background: lightgreen; }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-resize-small"></span>Media hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* Chrome, Safari 3+ */
<span class="test63">@media screen and (-webkit-min-device-pixel-ratio:0) { .selector { background: lightgreen; } }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-fire"></span>JavaScript hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-javascript"><code>/* Chrome */
<span class="js-test-chrome-1">var isChrome = Boolean(window.chrome);</span></code></pre>
    </section>
</article>

<article data-high="3" data-text="" class="fx" id="fx">
    <section data-cols="1">
        <h2 class="th">Firefox</h2>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-link"></span>Selector hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* Firefox 1.5/2 */
<span class="test65">body:empty .selector { }</span></code></pre>

    <pre class="language-css"><code>/* Firefox 2+ & IE 7 */
<span class="test54">.selector, x:-moz-any-link { background: lightgreen; }</span></code></pre>

    <pre class="language-css"><code>/* Firefox 3+ (Windows?) & IE 7*/
<span class="test55">.selector, x:-moz-any-link, x:default { background: lightgreen; }</span></code></pre>

    <pre class="language-css"><code>/* Firefox 3.5+ */
<span class="test56">body:not(:-moz-handler-blocked) .selector { background: lightgreen; }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-resize-small"></span>Media hacks</h3>
    </section>

    <section data-cols="1">  
    <pre class="language-css"><code>/* Firefox 3.5+, IE 9, Opera */
<span class="test57">@media screen and (min-resolution: +72dpi) { .selector { background: lightgreen; } }</span></code></pre>

    <pre class="language-css"><code>/* Firefox 3.6+ */
<span class="test67">@media screen and (-moz-images-in-menus:0) { .selector { background: lightpink; } }</span></code></pre>

    <pre class="language-css"><code>/* Firefox 4+ */ 
<span class="test68">@media screen and (min--moz-device-pixel-ratio:0) { .selector { background: lightpink; } }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-beaker"></span>Miscellaneous hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* Firefox 3+ */
<span class="test58">@-moz-document url-prefix() { .selector { background: lightgreen; } }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-fire"></span>JavaScript hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-javascript"><code>/* Firefox */
<span class="js-test-ff-4">var isFF = !!navigator.userAgent.match(/firefox/i);</span></code></pre>
    
    <pre class="language-javascript"><code>/* Firefox 2 - 13 */
<span class="js-test-ff-1">var isFF = Boolean(window.globalStorage);</span></code></pre>

    <pre class="language-javascript"><code>/* Firefox 2/3 */
<span class="js-test-ff-3">var isFF = /a/[-1]=='a';</span></code></pre>
    
    <pre class="language-javascript"><code>/* Firefox 3 */ 
<span class="js-test-ff-2">var isFF = (function x(){})[-5]=='x';</span></code></pre>
    </section>
</article>


    <article data-high="3" data-text="" class="ie" id="ie">
    <section data-cols="1">
        <h2 class="th">Internet Explorer</h2>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-link"></span>Selector hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* IE 6 and below */
<span class="test1">* html .selector  { background: lightgreen; } </span>
<span class="test2">.fix.selector { background: lightgreen; } </span>/* .fix can be any unused class */</code></pre>

    <pre class="language-css"><code>/* IE 7 and below */
<span class="test3">.selector, { background: lightgreen; }</span> 
<span class="test4">//.selector { background: lightgreen; }</span> /* Doesn't seem to work */</code></pre>

    <pre class="language-css"><code>/* IE 7 */
<span class="test5">*:first-child + html .selector { background: lightgreen; }</span> 
<span class="test6">.selector, x:- { background: lightgreen; } </span>
<span class="test7">* + html .selector { background: lightgreen; }</span></code></pre>

    <pre class="language-css"><code>/* Everything but IE 6  */
<span class="test8">html > body .selector { background: lightgreen; }</span></code></pre>

    <pre class="language-css"><code>/* Everything but IE 6/7 */
<span class="test9">html > /**/ body .selector { background: lightgreen; }</span></code></pre>

    <pre class="language-css"><code>/* Everything but IE 6/7/8 */
<span class="test10">:root * > .selector { background: lightgreen; }</span>
<span class="test11">body:last-child .selector { background: lightgreen; }</span>
<span class="test45">body:nth-of-type(1) .selector { background: lightgreen; }</span>
<span class="test46">body:first-of-type .selector { background: lightgreen; }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-paper-clip"></span>Property/value hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* IE 6 any combination of these characters: _ - £ ¬ ¦ */
<span class="test12" style="_background: lightgreen;">.selector { _background: lightgreen; }</span>
<span class="test13" style="-background: lightgreen;">.selector { -background: lightgreen; }</span>
<span class="test14" style="£background: lightgreen;">.selector { £background: lightgreen; }</span>
<span class="test15" style="¬background: lightgreen;">.selector { ¬background: lightgreen; }</span>
<span class="test16" style="¦background: lightgreen;">.selector { ¦background: lightgreen; }</span></code></pre>

    <pre class="language-css"><code>/* IE 6/7 any combination of these characters: ! $ & * ( ) = % + @ , . / ` [ ] # ~ ? : &lt; > | */
<span class="test17" style="!background: lightgreen;">.selector { !background: lightgreen; }</span>
<span class="test18" style="$background: lightgreen;">.selector { $background: lightgreen; }</span>
<span class="test19" style="&background: lightgreen;">.selector { &background: lightgreen; }</span>
<span class="test20" style="*background: lightgreen;">.selector { *background: lightgreen; }</span>
<span class="test21" style="(background: lightgreen;">.selector { (background: lightgreen; }</span>
<span class="test22" style=")background: lightgreen;">.selector { )background: lightgreen; }</span>
<span class="test23" style="=background: lightgreen;">.selector { =background: lightgreen; }</span>
<span class="test24" style="%background: lightgreen;">.selector { %background: lightgreen; }</span>
<span class="test25" style="+background: lightgreen;">.selector { +background: lightgreen; }</span>
<span class="test26" style="@background: lightgreen;">.selector { @background: lightgreen; }</span>
<span class="test27" style=",background: lightgreen;">.selector { ,background: lightgreen; }</span>
<span class="test28" style=".background: lightgreen;">.selector { .background: lightgreen; }</span>
<span class="test29" style="/background: lightgreen;">.selector { /background: lightgreen; }</span>
<span class="test30" style="`background: lightgreen;">.selector { `background: lightgreen; }</span>
<span class="test31" style="[background: lightgreen;">.selector { [background: lightgreen; }</span>
<span class="test32" style="]background: lightgreen;">.selector { ]background: lightgreen; }</span>
<span class="test33" style="#background: lightgreen;">.selector { #background: lightgreen; }</span>
<span class="test34" style="~background: lightgreen;">.selector { ~background: lightgreen; }</span>
<span class="test35" style="?background: lightgreen;">.selector { ?background: lightgreen; }</span>
<span class="test36" style=":background: lightgreen;">.selector { :background: lightgreen; }</span>
<span class="test37" style="&lt;background: lightgreen;">.selector { &lt;background: lightgreen; }</span>
<span class="test38" style="&gt;background: lightgreen;">.selector { &gt;background: lightgreen; }</span>
<span class="test39" style="|background: lightgreen;">.selector { |background: lightgreen; }</span></code></pre>

    <pre class="language-css"><code>/* IE 6/7 - acts as an !important */
<span class="test40">.selector { background: lightgreen !ie; } </span>/* string after ! can be anything */</code></pre>

    <pre class="language-css"><code>/* IE 7/8/9/10 */
<span class="test42">.selector { background/*\**/: lightgreen\9; }</span></code></pre>

    <pre class="language-css"><code>/* IE 8/9 */
<span class="test43">.selector { background: lightgreen\0/; } </span>
    /* must go at the END of all rules */</code></pre>

    <pre class="language-css"><code>/* IE 9/10 */
<span class="test69">.selector:nth-of-type(1n) { background: lightgreen\9; }</span></code></pre>

    <pre class="language-css"><code>/* IE 6/7/8/9/10 */
<span class="test41">.selector { background: lightgreen\9; }</span></code></pre>

    <pre class="language-css"><code>/* Everything but IE 6 */
<span class="test44">.selector { background/**/: lightgreen; }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-resize-small"></span>Media hacks</h3>
    </section> 

    <section data-cols="1">
    <pre class="language-css"><code>/* IE 6/7/8 */
<span class="test47">@media \0screen\,screen\9 { .selector { background: lightgreen; } }</span> </code></pre>

    <pre class="language-css"><code>/* IE 8 */
<span class="test48">@media \0screen { .selector { background: lightgreen; } }</span></code></pre>

    <pre class="language-css"><code>/* IE 9, Firefox 3.5+, Opera */
<span class="test57">@media screen and (min-resolution: +72dpi) { .selector { background: lightgreen; } }</span></code></pre>

    <pre class="language-css"><code>/* IE 8/9/10 & Opera */
<span class="test49">@media screen\0 { .selector { background: lightgreen; } }</span></code></pre>

    <pre class="language-css"><code>/* IE 9/10 */
<span class="test50">@media screen and (min-width:0\0) { .selector { background: lightgreen; } }</span></code></pre>

    <pre class="language-css"><code>/* IE 10+ */
<span class="test51">@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) { 
    .selector { background: lightgreen; }
}</span></code></pre>

    <pre class="language-css"><code>/* Everything but IE 6/7/8 - not a hack */ 
<span class="test52">@media screen and (min-width: 400px) { .selector { background: lightgreen; } }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-beaker"></span>Miscellaneous hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* Everything but IE 6/7 - doesn't seem to work at all */
<span class="test53">@import "selector.css" all;</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-fire"></span>JavaScript hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-javascript"><code>/* IE */
<span class="js-test-ie-1">var isIE = '\v'=='v';</span></code></pre>

    <pre class="language-javascript"><code>/* IE 6 */
<span class="js-test-ie-2">try {=@cc_on @_jscript_version &lt;= 5.7&&@_jscript_build&lt;10000} catch(e){=false;}</span></code></pre>

    <pre class="language-javascript"><code>/* IE 10 */
<span class="js-test-ie-3">/*@cc_on!@*/false && document.documentMode === 10</span></code></pre>

    </section>
</article>
            
<article data-high="3" data-text="" class="op" id="op">
    <section data-cols="1">
        <h2 class="th">Opera</h2>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-link"></span>Selector hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* Opera 9.5+ */
<span class="test64">noindex:-o-prefocus, .selector { background: lightgreen; }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-resize-small"></span>Media hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* Opera 7 */
<span class="test66">@media all and (min-width: 0px){ .selector { background: lightgreen; } }</span></code></pre>

    <pre class="language-css"><code>/* Opera 12- */
<span class="test70">@media all and (-webkit-min-device-pixel-ratio:10000), not all and (-webkit-min-device-pixel-ratio:0) { .selector { background: lightgreen; } }</span></code></pre>

    <pre class="language-css"><code>/* Opera, IE 8/9/10 */
<span class="test49">@media screen\0 { .selector { background: lightgreen; } }</span></code></pre>

    <pre class="language-css"><code>/* Opera, Firefox 3.5+, IE 9 */
<span class="test57">@media screen and (min-resolution: +72dpi) { .selector { background: lightgreen; } }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-fire"></span>JavaScript hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-javascript"><code>/* Opera */
<span class="test-js-op-1">var isOpera = /^function \(/.test([].sort);</span></code></pre>

    <pre class="language-javascript"><code>/* Opera <= 12 */
<span class="test-js-op-2">var isOpera = Boolean(window.opera);</code></pre>
    </section>
</article>


<article data-high="3" data-text="" class="sa" id="sa">
    <section data-cols="1">
        <h2 class="th">Safari</h2>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-link"></span>Selector hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* Safari 2/3 */
<span class="test60">html[xmlns*=""] body:last-child .selector { background: lightgreen; }</span>
<span class="test61">html[xmlns*=""]:root .selector  { background: lightgreen; }</span></code></pre>

    <pre class="language-css"><code>/* Safari 2/3.1, Opera 9.25 */
<span class="test62">*|html[xmlns*=""] .selector { background: lightgreen; }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-resize-small"></span>Media hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-css"><code>/* Safari 3+, Chrome */
<span class="test63">@media screen and (-webkit-min-device-pixel-ratio:0) { .selector { background: lightgreen; } }</span></code></pre>
    </section>

    <section data-cols="1">
        <h3><span class="fontawesome-fire"></span>JavaScript hacks</h3>
    </section>

    <section data-cols="1">
    <pre class="language-javascript"><code>/* Safari */
<span class="js-test-sa-1">var isSafari = /a/.__proto__=='//';</span></code></pre>
    </section>
</article>
     <article data-high="3">
        <section data-cols="1">
            <div>
                <footer>
                    <p><a href="#browserhacks" title="top" class="btn-top"><span class="fontawesome-angle-up"></span></a>Handcrafted 2013 by The Fabulous <a href="https://github.com/4ae9b8?tab=members" target="_blank">#4ae9b8</a> Team.</p>
                </footer>
            </div>
        </section>
    </article>  

    <!--<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>-->
    <script src="js/jquery-1.9.0-min.js"></script>
    <script src="js/browserhacks-tests.js"></script>

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