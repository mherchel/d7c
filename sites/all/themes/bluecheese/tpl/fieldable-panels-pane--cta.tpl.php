<?php
$classes .= ' pane-style-' . $content['field_cta_style']['#items'][0]['value'];
$classes .= ' pane-style-' . $content['field_cta_secondary_style']['#items'][0]['value'];
if (isset($content['field_cta_background']['#items']['0']['filename'])) {
  $classes .= ' with-background';
}
if ($large_link = ($content['field_cta_style']['#items'][0]['value'] === 'card' && isset($content['field_cta_link']))) {
  $content['field_cta_link'][0]['#theme'] = 'link_formatter_link_title_plain';
}
?>
<?php if ($large_link): ?><a href="<?php print $content['field_cta_link']['#items'][0]['url']; ?>" class="card-link"><?php endif; ?>
<div <?php if (isset($content['field_cta_background']['#items']['0']['filename'])): ?>style="background-image: url('<?php print file_create_url($content['field_cta_background']['#items']['0']['uri']); ?>');"<?php endif; ?> class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="pane-style-<?php print preg_replace('/ .*$/', '', $content['field_cta_style']['#items'][0]['value']); ?>-inner pane-content-inner">
    <?php if ($content['field_cta_secondary_style']['#items'][0]['value'] === 'built-by') {
      $first_graphic = $content['field_cta_graphic'];
      foreach (array_slice(element_children($first_graphic), 1) as $key) {
        hide($first_graphic[$key]);
      }
      print render($first_graphic);
      hide($content['field_cta_graphic'][0]);
    }
    else {
      print render($content['field_cta_graphic']);
    } ?>
    <div class="cta-text">
      <?php if ($content['title']['#value']): ?>
        <h2><?php print $content['title']['#value']; ?></h2>
      <?php endif; ?>
      <?php print render($content['field_cta_body']); ?>
      <?php print render($content['field_cta_body_2']); ?>
      <?php if ($large_link && $content['field_cta_secondary_style']['#items'][0]['value'] !== 'sponsor') {
        if ($content['field_cta_link']['#items'][0]['url'] !== $content['field_cta_link']['#items'][0]['title']) {
          print '<strong>' . strip_tags(render($content['field_cta_link'])) . '</strong>';
        }
      }
      else {
        print render($content['field_cta_link']);
      } ?>
    </div>
  </div>
  <?php if ($content['field_cta_secondary_style']['#items'][0]['value'] === 'built-by'): ?>
    <div class="built-by">
      <div class="built-by-label"><small>built by</small></div>
      <?php print render($content['field_cta_graphic']); ?>
    </div>
  <?php endif; ?>
  <?php if ($content['field_cta_secondary_style']['#items'][0]['value'] === 'sponsor'): ?><small>Sponsored content</small><?php endif; ?>
</div>
<?php if ($large_link): ?></a><?php endif; ?>
