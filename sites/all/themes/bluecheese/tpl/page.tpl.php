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

  <?php if (!empty($page['banner'])) : ?>
    <div id="banner">
      <?php print render($page['banner']); ?>
    </div>
  <?php endif; ?>

  <div id="page" class="clearfix">
    <div id="page-heading">
      <?php print render($page['page_heading']); ?>
      <?php if (!$is_front): ?>
        <div id="page-title-tools" class="container-12 clearfix" role="navigation">

          <div class="page-title-wrapper">
            <?php if (!empty($section_name)): ?>
              <?php if (!isset($matched_content_link)) : ?>
                <div id="page-title" class="h2"><?php print $section_name; ?></div>
              <?php else: ?>
                <h1 id="page-title" class="title"><?php print $section_name; ?></h1>
              <?php endif; ?>
            <?php elseif (!isset($section_name) && $title): ?>
              <h1 id="page-title" class="title"><?php print $title; ?></h1>
            <?php endif; ?>
          </div>

          <?php if (!empty($page['page_tools'])): ?>
            <div id="page-tools"><?php print render($page['page_tools']); ?></div>
          <?php endif; ?>
        </div> <!-- /#page-title-tools -->

        <?php if ($nav_content): ?>
          <div id="nav-content" class="container-12">
            <?php print $nav_content; ?>
          </div> <!-- /#nav-content -->
        <?php endif; // end if $nav_content ?>

        <div class="breadbox"><?php print $breadcrumb; ?></div>

        <?php if (isset($section_name) && !isset($matched_content_link) && !empty($title)): ?>
          <h1 id="page-subtitle" class="container-12"><?php print $title; ?></h1>
        <?php endif; ?>

      <?php endif; // end if $is_front ?>

    </div> <!-- /#page-heading -->

    <?php if ($tabs['#primary']): ?>
      <div id="tabs" class="clearfix container-12">
        <?php print render($tabs); ?>
      </div> <!-- /#tabs -->
    <?php endif; // end if $tabs ?>

    <?php if (empty($drupalorg_no_wrap)): ?><div class="container-12 page-inner"><?php endif; ?>
      <?php if (!empty($page['sidebar_first'])): ?>
        <div id="sidebar-first" role="complementary" >
          <div id="sidebar-first-region">
            <?php print render($page['sidebar_first']); ?>
          </div> <!-- /#column-right-region-first -->
        </div> <!-- /#column-right-first -->
      <?php endif; // end if $right-first ?>

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
          <div id="content-inner" class="clearfix"><?php print render($page['content']); ?></div>
          <?php if (!empty($feed_icons)): ?>
            <div id="feeds">Subscribe with RSS <?php print $feed_icons; ?></div>
          <?php endif; ?>
        </div> <!-- /#content -->

      </div> <!-- /#column-left -->

      <?php if ($page['sidebar_second']): ?>
        <div id="aside" role="complementary" >
          <div id="aside-region">
            <?php print render($page['sidebar_second']); ?>
          </div> <!-- /#column-right-region -->
        </div> <!-- /#column-right -->
      <?php endif; // end if $right ?>

      <?php if ($page['content_bottom']): ?>
        <div id="content-bottom-region" role="complementary" >
          <?php print render($page['content_bottom']); ?>
        </div> <!-- /#content-bottom -->
      <?php endif; // end if $content_bottom ?>
    <?php if (empty($drupalorg_no_wrap)): ?></div><?php endif; ?>
  </div> <!-- /#page -->

  <div id="footer" role="contentinfo">
    <?php if ($page['footer']): ?>
      <?php print render($page['footer']); ?>
    <?php endif; ?>
  </div>
