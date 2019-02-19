<?php

/**
 * Preprocessor for page.tpl.php template file.
 */
function bluecheese_preprocess_page(&$variables) {
  // Add HTML tag name for title tag.
  $variables['site_name_element'] = $variables['is_front'] ? 'h1' : 'div';

  // Add variable for site status message (for development sites).
  $variables['drupalorg_site_status'] = filter_xss_admin(variable_get('drupalorg_site_status', FALSE));

  // Clippy!
  drupal_add_css('sites/all/libraries/clippy-js/build/clippy.css');
  drupal_add_js(drupal_get_path('theme', 'bluecheese') . '/js/clippy_init.js');
}

/**
 * Implementation of template_preprocess_node().
 */
function bluecheese_preprocess_node(&$variables) {
  // Modify 'Submitted by' text on nodes.
  if ($variables['node']->type !== 'forum') {
    $variables['date'] = format_date($variables['node']->created, 'custom', 'j F Y');
  }

  $variables['pubdate'] = '<time pubdate datetime="' . $variables['node']->created . '">' . $variables['date'] . '</time>';
  $variables['submitted'] = t('Posted by !username on !datetime', ['!username' => $variables['name'], '!datetime' => $variables['pubdate']]);
}

/**
 * Process variables for aggregator-item.tpl.php.
 *
 * @see aggregator-item.tpl.php
 */
function bluecheese_preprocess_aggregator_item(&$variables) {
  // Hide 'Drupal Planet' category on Planet posts
  foreach ($variables['categories'] as $key => $category) {
    if (strpos($category, 'class="active"') !== FALSE) {
      unset($variables['categories'][$key]);
    }
  }
}

/**
 * Implements hook_css_alter().
 *
 * Remove core & module CSS files we don't want in our theme
 */
function bluecheese_css_alter(&$css) {
  unset($css['modules/forum/forum.css']);
}

/**
 * Implements hook_js_alter().
 *
 * Swap out core js & module js we don't want in our theme
 */
function bluecheese_js_alter(&$javascript) {
  // We provide our own vertical tabs js so that we can disable it smaller devices.
  if (isset($javascript['misc/vertical-tabs.js'])) {
    $javascript['misc/vertical-tabs.js']['data'] = drupal_get_path('theme', 'bluecheese') . '/js/vertical-tabs.js';
  }
}

/**
 * Theme local tasks, so a primary item is not active if we have active in the secondary ones.
 */
function bluecheese_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';

    $output .= drupal_render($variables['primary']);
      // Admitted, this is a total hack. If we have any secondary local tasks,
      // there shold be no class="active" item in the primary local tasks,
      // because it is not "directly" active. So replace with class="parent-active".
  }
  if (!empty($variables['secondary'])) {
    $output = str_replace('class="active"', 'class="parent-active"', $output);
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}

/**
 * Allow themable breadcrumbs
 */
function bluecheese_breadcrumb($v) {
  if (!empty($v['breadcrumb'])) {
    $crumbs = '<nav class="breadcrumb container-12">';
    foreach ($v['breadcrumb'] as $value) {
      $crumbs .= '<span>' . $value . '</span>';
    }
    $crumbs .= '</nav>';
    return $crumbs;
  }
}

/**
 * Overrides theme_election_candidate_ballot_item().
 */
function bluecheese_election_candidate_ballot_item($variables) {
  $candidate = $variables['candidate'];
  $account = user_load($candidate->uid);

  $link = l(association_drupalorg_candidate_picture($candidate, $account) . check_plain($account->name), election_candidate_uri_path($candidate), [
    'attributes' => ['target' => ['_blank']],
    'html' => TRUE,
  ]);

  return '<span class="election-candidate-ballot-item">' . $link . '</span>';
}

function bluecheese_menu_tree__main_menu($variables) {
  $result = '<div class="menu-block"><ul class="menu button">' . $variables['tree'] . '</ul></div>';
  if (isset($variables['#tree']['#block'])) {
    $result .= '<a class="close-btn" href="#top">' . t('Return to content') . '</a>';
  }

  return $result;
}

function bluecheese_menu_tree__user_menu($variables) {
  $image = $GLOBALS['base_url'] . '/' . drupal_get_path('theme', 'bluecheese') . '/images/icon-w-user.svg';
  $class = 'default';
  if (user_is_logged_in()) {
    $account = user_load($GLOBALS['user']->uid);
    if (isset($account->field_user_picture) && isset($account->field_user_picture[LANGUAGE_NONE])) {
      $image = $account->field_user_picture[LANGUAGE_NONE][0]['url'];
      $class = 'person';
    }
    elseif (is_numeric($GLOBALS['user']->picture) && ($file = file_load($GLOBALS['user']->picture))) {
      $image = image_style_url('drupalorg_user_picture', $file->uri);
      $class = 'person';
    }
  }
  return '<div class="menu-block"><ul class="menu"><li class="button ' . $class . '"><a href="#block-system-user-menu"><img src="' . $image . '" alt="Log in, view profile, and more"></a><ul>' . $variables['tree'] . '</ul></li></ul></div>';
}
