<?php
// $Id: page.tpl.php,v 1.1.2.1 2009/02/24 15:34:45 dvessel Exp $
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>

<body class="site <?php print $body_classes; ?>">
  <div id="page" class="container-16 clear-block">
    <div id="site-header" class="clear-block">
      <div id="branding" class="grid-16 clear-block">
      <?php if ($logo_img): ?>
        <span id="logo"><?php print $logo_img; ?></span>
      <?php endif; ?>
      </div>
      <?php if ($header): ?>
        <div id="header-region" class="region grid-16 clear-block">
          <?php print $header; ?>
        </div>
      <?php endif; ?>

    <?php if ($main_menu_links || $secondary_menu_links): ?>
      <div id="site-menu">
        <?php print $main_menu_links; ?>
        <?php print $secondary_menu_links; ?>
      </div>
    <?php endif; ?>

    <?php if ($search_box): ?>
      <div id="search-box" class="grid-6 prefix-10"><?php print $search_box; ?></div>
    <?php endif; ?>
      <div id="header-shadow"></div>
    </div>

    <div id="main-container" class="column <?php print ns('grid-16', $right, 4);?>">
      <div id="main">
        <?php //print $breadcrumb; ?>
        <?php if ($title): ?>
          <h1 class="title" id="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php if ($tabs): ?>
          <div class="tabs"><?php print $tabs; ?></div>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php print $help; ?>

        <div id="main-content" class="region clear-block">
          <?php print $content; ?>
        </div>

        <?php print $feed_icons; ?>
      </div>
    </div>

  <?php if ($right): ?>
    <div id="right-container" class="column sidebar region grid-4">
      <div id="right">
        <?php print $right; ?>
      </div>
    </div>
  <?php endif; ?>

  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({appId: '133613199988656', status: true, cookie: true, xfbml: true});
    };
    (function() {
      var e = document.createElement('script'); e.async = true;
      e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
      document.getElementById('fb-root').appendChild(e);
    }());
  </script>

  <div id="footer" class="prefix-1 suffix-1">
    <?php if ($footer): ?>
      <div id="footer-region" class="region grid-14 clear-block">
        <?php print $footer; ?>
      </div>
    <?php endif; ?>

    <?php if ($footer_message): ?>
      <div id="footer-message" class="grid-14">
        <?php print $footer_message; ?>
      </div>
    <?php endif; ?>
  </div>


  </div>
  <?php print $closure; ?>
</body>
</html>
