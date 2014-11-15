<?php
// $Id: page.tpl.php,v 1.1.2.2.4.2 2011/01/11 01:08:49 dvessel Exp $
?>
<div id="page" class="container-16 clearfix">

  <div id="site-header" class="grid-16 clearfix">
  <?php if ($main_menu_links || $secondary_menu_links): ?>
    <div id="site-menu" class="grid-16 alpha omega">
      <?php print $main_menu_links; ?>
      <?php print $secondary_menu_links; ?>
    </div>
  <?php endif; ?>
  </div>

  <div id="main" class="column <?php print ns('grid-16', $page['sidebar_first'], 4, $page['sidebar_second'], 4) . ' ' . ns('push-4', !$page['sidebar_first'], 4); ?>">
    <div id="main-content-container">
      <?php //print $breadcrumb; ?>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>      
      <?php if ($tabs): ?>
        <div class="tabs"><?php print render($tabs); ?></div>
      <?php endif; ?>
      <?php print $messages; ?>
      <?php print render($page['help']); ?>

      <div id="main-content" class="region clearfix">
        <?php print render($page['content']); ?>
      </div>

      <?php print $feed_icons; ?>
    </div>
  </div>

<?php if ($page['sidebar_first']): ?>
  <div id="sidebar-left" class="column sidebar region grid-4 <?php print ns('pull-12', $page['sidebar_second'], 4); ?>">
    <?php print render($page['sidebar_first']); ?>
  </div>
<?php endif; ?>

<?php if ($page['sidebar_second']): ?>
  <div id="sidebar-right" class="column sidebar region grid-4">
    <?php print render($page['sidebar_second']); ?>
  </div>
<?php endif; ?>


  <div id="footer" class="prefix-1 suffix-1">
    <?php if ($page['footer']): ?>
      <div id="footer-region" class="region grid-14 clearfix">
        <?php print render($page['footer']); ?>
      </div>
    <?php endif; ?>
  </div>

</div>
