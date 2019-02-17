  <?php if ($drupalorg_site_status): ?>
  <div id="drupalorg-site-status"><?php print $drupalorg_site_status; ?></div>
  <?php endif; ?>
  <div id="nav-header">
    <div class="menu-nav">
      <a class="nav-btn" id="nav-open-btn" href="#block-system-main-menu"><img src="<?php print $base_path . $directory; ?>/images/icon-w-menu.svg" alt="Main menu"></a>
    </div>
    <nav id="navigation-inner" class="container-12" role="navigation">
      <?php print render($page['navigation']); ?>
    </nav>
  </div>

  <?php if (isset($logo)): ?>
  <div id="header" class="clearfix">
    <div id="header-inner" class="container-12 clearfix">
      <div id="header-left">
        <<?php print $site_name_element; ?> id="site-name"><?php print $drupalorg_logo_link; ?></<?php print $site_name_element; ?>>
        <?php print render($page['highlighted']); ?>
      </div>
      <div id="header-right">
        <?php print render($page['header']); ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <div id="page" class="clearfix">
    <div class="breadbox"><?php print $breadcrumb; ?></div>

    <?php if (!empty($page['banner'])) : ?>
      <div id="banner">
        <?php print render($page['banner']); ?>
      </div>
    <?php endif; ?>

    <div id="main" role="main">
      <?php if ($page['content_top']): ?>
        <div id="content-top-region" class="clearfix">
          <?php print render($page['content_top']); ?>
        </div> <!-- /#content-top-region -->
      <?php endif; // end if $content_top ?>

      <div id="content" class="clearfix">
        <?php print $messages; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <div id="content-inner" class="clearfix">

          <?php if(!isset($panelized)): ?>

            <div class="page-title-wrapper">
              <?php if ($title): ?>
                <h1 id="page-title" class="title"><?php print $title; ?></h1>
              <?php endif; ?>
            </div>

            <?php if ($tabs['#primary']): ?>
              <div id="tabs" class="clearfix">
                <?php print render($tabs); ?>
              </div> <!-- /#tabs -->
            <?php endif; // end if $tabs ?>
          <?php endif; // end if not $panelized ?>

          <?php print render($page['content']); ?>
        </div>
        <?php if (!empty($feed_icons)): ?>
          <div id="feeds">Subscribe with RSS <?php print $feed_icons; ?></div>
        <?php endif; ?>
      </div> <!-- /#content -->

    </div> <!-- /#column-left -->

    <?php if ($page['content_bottom']): ?>
      <div id="content-bottom-region" role="complementary" >
        <?php print render($page['content_bottom']); ?>
      </div> <!-- /#content-bottom -->
    <?php endif; // end if $content_bottom ?>
  </div> <!-- /#page -->

  <div id="footer" role="contentinfo">
    <?php if ($page['footer']): ?>
      <?php print render($page['footer']); ?>
    <?php endif; ?>
  </div>
