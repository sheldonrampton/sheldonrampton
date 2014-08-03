<?php

/**
 * @file header.php
 * A header file converted from the WordPress Whiteboard theme framework.
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/ 1999/xhtml">
<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width; initial-scale=1"/><?php /* Add "maximum-scale=1" to fix the Mobile Safari auto-zoom bug on orientation changes, but keep in mind that it will disable user-zooming completely. Bad for accessibility. */ ?>
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body class="<?php print $body_classes; ?>">
<div class="hide">
	<p><a href="#content">Skip to Content</a></p><?php /* used for accessibility, particularly for screen reader applications */ ?>
</div><!--.none-->
<div id="main"><!-- this encompasses the entire Web site -->
	<div id="header"><header>
		<div class="container">
			<div id="title">
        <?php if ($logo || $site_name): ?>
          <h1 id="logo">
            <?php if (!empty($logo)): ?>
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" / >
                <?php if (!empty($site_name)): ?>
                  <?php print $site_name; ?>
                <?php endif; ?>
              </a>
            <?php endif; ?>
          </h1>
        <?php endif; ?>
        <?php if (!empty($site_slogan)): ?>
          <h2 id="tagline"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
			</div><!--#title-->
			<div id="header-image" class="container">
			  <?php $header_image = theme_get_setting('header_image'); ?>
        <?php if ($header_image): ?>
  			  <img alt="<?php print $site_name; ?>" src="<?php print base_path() . path_to_theme() . '/images/default-header.png' ?>">
        <?php endif; ?>
			</div><!--#header-image-->
			<div id="nav-primary" class="nav"><nav>
        <?php if (isset($primary_links)) {
          print theme("links", $primary_links, array("class" => "navmenu primary-links"));
        } ?>
            <?php if (isset($secondary_links)) {
          print theme("links", $secondary_links, array("class" => "navmenu secondary-links"));
        } ?>
			</nav></div><!--#nav-primary-->
      <?php if (!empty($header)): print $header; endif; ?>
			<div class="clear"></div>
		</div><!--.container-->
	</header></div><!--#header-->
	<div class="container">
