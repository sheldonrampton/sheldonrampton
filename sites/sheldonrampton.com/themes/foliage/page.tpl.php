<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language ?>" xml:lang="<?php print $language ?>">

<head>
  <title><?php print $head_title ?></title>
  <?php print $head ?>
  <?php print $styles ?>
  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
  </head>

<body>

<table id="header" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td id="searchbar" colspan="2">
      <?php print $search_box ?>
    </td>
  </tr>
  <tr>
    <td id="logo">
      <?php if ($logo) { ?><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a><?php } ?>
      <?php if ($site_name) { ?><h1 class='site-name'><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a></h1><?php } ?>
      <?php if ($site_slogan) { ?><div class='site-slogan'><?php print $site_slogan ?></div><?php } ?>
    </td>
    <td id="menu">
      <?php if (isset($primary_links)) { ?><?php print theme('links', $primary_links, array('class' =>'links', 'id' => 'navlist')) ?><?php } ?>
      <?php if (isset($secondary_links)) { ?><?php print theme('links', $secondary_links, array('class' =>'links', 'id' => 'subnavlist')) ?><?php } ?>
	  </td>
  </tr>
  <tr id="headerbottom">
    <td colspan="2"><div><?php print $header ?>&nbsp;</div></td>
  </tr>
</table>

<table id="content">
  <tr>
    <?php if ($sidebar_left) { ?><td id="sidebar-left">
      <?php print $sidebar_left ?>
    </td><?php } ?>
    <td valign="top">
      <?php if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php } ?>
      <div id="main">
        <?php /* print $breadcrumb */ ?>
        <h1 class="title"><?php print $title ?></h1>
        <div class="tabs"><?php print $tabs ?></div>
        <?php print $help ?>
        <?php print $messages ?>
        <?php print $content; ?>
        <?php print $feed_icons; ?>
		</div>
    </td>
    <?php if ($sidebar_right) { ?><td id="sidebar-right">
      <?php print $sidebar_right ?>
    </td><?php } ?>
  </tr>
</table>

<table id="footer">
  <tr>
    <td>
      <?php print $footer_message ?>
    </td>
  </tr>
</table>


<?php print $closure ?>
</body>
</html>
