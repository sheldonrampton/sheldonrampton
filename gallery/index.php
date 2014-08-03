<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Portfolio of Sheldon Rampton</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="imagetoolbar" content="false">
    <meta name="description" content="">
    <meta name="keywords" content="">
	<link href="galleria.css" rel="stylesheet" type="text/css" media="screen">

  <script src="http://www.apple.com/library/quicktime/scripts/ac_quicktime.js" language="JavaScript" type="text/javascript"></script>
  <script src="http://www.apple.com/library/quicktime/scripts/qtp_library.js" language="JavaScript" type="text/javascript"></script>
  <link href="http://www.apple.com/library/quicktime/stylesheets/qtp_library.css" rel="StyleSheet" type="text/css" />

	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery.galleria.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
		
		$('.gallery_demo_unstyled').addClass('gallery_demo'); // adds new class name to maintain degradability
		
		$('ul.gallery_demo').galleria({
			history   : true, // activates the history object for bookmarking, back-button etc.
			clickNext : true, // helper for making the image clickable
			insert    : '#main_image', // the containing selector for our main image
			onImage   : function(image,caption,thumb) { // let's add some image effects for demonstration purposes
				
				// fade in the image & caption
				image.css('display','none').fadeIn(1000);
				caption.css('display','none').fadeIn(1000);
				
				// fetch the thumbnail container
				var _li = thumb.parents('li');
				
				// fade out inactive thumbnail
				_li.siblings().children('img.selected').fadeTo(500,0.3);
				
				// fade in active thumbnail
				thumb.fadeTo('fast',1).addClass('selected');
				
				// add a title for the clickable image
				image.attr('title','>>Next image');
//        caption.text(thumb.attr('title'));

        $('.galleria_wrapper').load(thumb.attr('mov'));

			},
			onThumb : function(thumb) { // thumbnail effects goes here
				
				// fetch the thumbnail container
				var _li = thumb.parents('li');
				
				// if thumbnail is active, fade all the way.
				var _fadeTo = _li.is('.active') ? '1' : '0.3';
				
				// fade in the thumbnail when finnished loading
				thumb.css({display:'none',opacity:_fadeTo}).fadeIn(1500);
				
				// hover effects
				thumb.hover(
					function() { thumb.fadeTo('fast',1); },
					function() { _li.not('.active').children('img').fadeTo('fast',0.3); } // don't fade out if the parent is active
				)
			}
		});
	});
	
	</script>
	<style media="screen,projection" type="text/css">
	
	/* BEGIN DEMO STYLE */
	*{margin:0;padding:0}
	body{padding:20px;background:white;text-align:center;background:black;color:#bba;font:80%/140% georgia,serif;}
	h1,h2{font:bold 80% 'helvetica neue',sans-serif;letter-spacing:3px;text-transform:uppercase;}
	h3{font:bold 120% 'helvetica neue',sans-serif;text-align:right;}
	a{color:#348;text-decoration:none;outline:none;}
	a:hover{color:#67a;}
	.caption{font-style:italic;color:#887;}
	.demo{position:relative;margin-top:2em;}
	.gallery_demo{width:701px;margin:0 auto;}
	.gallery_demo li{width:68px;height:50px;border:3px double #111;margin: 0 2px;background:#000;}
	.gallery_demo li div{left:240px}
	.gallery_demo li div .caption{font:italic 0.7em/1.4 georgia,serif;}
	
	#main_image{margin:0 auto 60px auto;height:438px;width:700px;background:black;}
	#main_image img{margin-bottom:10px;}
	
	.nav{padding-top:15px;clear:both;font:80% 'helvetica neue',sans-serif;letter-spacing:3px;text-transform:uppercase;}
	
	.info{text-align:left;width:700px;margin:30px auto;border-top:1px dotted #221;padding-top:30px;}
	.info p{margin-top:1.6em;}
	
    </style>
	
</head>
<body>
<h1>Portfolio of Sheldon Rampton</h1>
<div class="demo">
<div id="main_image"></div>
<ul class="gallery_demo_unstyled">
    <li><img src="prwatch/prwatch-poster.jpg" alt="PRWatch.org" title="PR Watch" mov="prwatch.html" longdesc="Visit the <a href='http://www.prwatch.org'>PR Watch website</a>."></li>
    <li><img src="sourcewatch/sourcewatch-poster.jpg" alt="SourceWatch.org" title="SourceWatch" mov="sourcewatch.html" longdesc="Visit the <a href='http://www.sourcewatch.org'>SourceWatch website</a>."></li>
    <li><img src="wccn/wccn-poster.jpg" alt="CapitalForCommunities.org" title="Working Capital for Community Needs" mov="wccn.html" longdesc="Visit the <a href='http://www.capitalforcommunities.org'>WCCN website</a>."></li>
    <li><img src="globalcorpforum/globalcorpforum-poster.jpg" alt="GlobalCorpForum.org" title="Global Corporations Forum" mov="globalcorpforum.html" longdesc="Visit the <a href='http://www.globalcorpforum.org'>Global Corporations Forum website</a>."></li>
    <li><img src="fmrg/fmrg-poster.jpg" alt="fmrg-ny.com" title="Family Matters Resource Group" mov="fmrg.html" longdesc="Visit the <a href='http://www.fmrg-ny.com'>Family Matters Resource Group website</a>."></li>
    <li><img src="kenny/kenny-poster.jpg" alt="kennyrampton.com" title="Kenny Rampton" mov="kenny.html" longdesc="Visit the <a href='http://www.kennyrampton.com'>Kenny Rampton website</a>."></li>
    <li class="active"><img src="img/ducks.jpg" alt="Start" title="Start" mov="splash.html" longdesc=" "></li>
</ul>
<p class="nav"><a href="#" onclick="$.galleria.prev(); return false;">&laquo; previous</a> | <a href="#" onclick="$.galleria.next(); return false;">next &raquo;</a></p>
<div class="info">
<h2>Information</h2>
<p>I built most of the websites showcased here using <a href="http://drupal.org">Drupal</a>, a popular, PHP-based content management system. I like Drupal because it is designed to enable developers to add additional functionality by writing their own PHP modules. Website developers have taken advantage of this by writing literally thousands of modules that are now available as free downloads from the "contrib" section of Drupal's website. I've used other people's contrib modules to quickly add functionality to websites including audio podcasting, videos, maps, and bilingual translation assistance (English/Chinese).</p>
<p>I have written several Drupal modules myself and have added two of them to Drupal contribs: the <a href="http://drupal.org/project/epublish">E-Publish</a> and <a href="http://drupal.org/project/interwiki">Interwiki</a> modules, both of which I describe in the examples above.</p>
<p><ul><li>The "interwiki" filter provides a simplified, wiki-like syntax for linking to articles or search results on many commonly-used internet reference websites, such as Wikipedia. I discuss it in the video about my PRWatch.org website.</a></li>
<li>The "E-publish" module helps organize a group of web pages into an online version of a periodical publication, such as a newspaper, magazine or newsletter. I show an example in my discussion of the website for Working Capital for Community Needs (the third example in this gallery).</li></ul></p>
<p>I have also written other Drupal modules entirely for in-house use, such as "emailbot," a module that automatically generates a formatted email message once per week for mailing to the 30,000 people who have subscribed to receive email bulletins from the Center for Media and Democracy. (I have considered sharing it as well with the rest of the Drupal community, but it does a lot of visual styling specific to our website, and I think this makes it too specialized to be useful for others.)</p>
<p>In addition to Drupal, I've used Mediawiki (the software that powers Wikipedia) to create SourceWatch, a community-edited encyclopedia of the people, players and issues shaping the public agenda. SourceWatch is the second example in this gallery.</p>
<p>Each video in the gallery is about five minutes long. If you don't have time to watch them all, make sure to at least check out my brother Kenny Rampton's website (the last example in the gallery). He's a trumpet player, and I think you'll enjoy the music.</p>
<p class="footer"><a href="http://www.sheldonrampton.com">Sheldon Rampton's home page</a></p>
</body>
</html>
