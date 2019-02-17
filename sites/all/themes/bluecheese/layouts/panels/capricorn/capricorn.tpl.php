<?php
/**
 * @file
 * Template for Department Landing Pages.
 *
 * Variables:
 * - $css_id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 * panel of the layout. This layout supports the following sections:
 */
?>

<div class="capricorn panel-layout clearfix <?php if (!empty($class)) { print $class; } ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <?php if ($content['header']): ?>
    <div class="container header clearfix">
      <div class="container-inner header-inner">
        <?php print $content['header']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['primary']): ?>
  <div class="container primary clearfix">
    <div class="container-inner primary-inner">
      <?php print $content['primary']; ?>
    </div>
  </div>
  <?php endif; ?>

  <?php if ($content['secondary']): ?>
    <div class="container secondary clearfix">
      <div class="container-inner secondary-inner">
        <?php print $content['secondary']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['tertiary_first'] || $content['tertiary_second'] || $content['tertiary_third'] ): ?>
    <div class="container tertiary clearfix">
      <div class="container-inner tertiary-inner">
        <div class="tertiary-wrapper">
          <div class="column-content-region tertiary-first">
            <div class="column-content-region-inner tertiary-first-inner">
              <?php print $content['tertiary_first']; ?>
            </div>
          </div>
          <div class="column-content-region tertiary-second">
            <div class="column-content-region-inner tertiary-second-inner">
              <?php print $content['tertiary_second']; ?>
            </div>
          </div>
          <div class="column-content-region tertiary-third">
            <div class="column-content-region-inner tertiary-third-inner">
              <?php print $content['tertiary_third']; ?>
            </div>
          </div>
        </div>
        <div class="tertiary-footer">
          <div class="tertiary-footer-inner">
            <?php print $content['tertiary_footer']; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['quaternary']): ?>
    <div class="container quaternary clearfix">
      <div class="container-inner quaternary-inner">
        <?php print $content['quaternary']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['quinary']): ?>
    <div class="container quinary clearfix">
      <div class="container-inner quinary-inner">
        <?php print $content['quinary']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['senary']): ?>
    <div class="container senary clearfix">
      <div class="container-inner senary-inner">
        <?php print $content['senary']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['septenary']): ?>
    <div class="container septenary clearfix">
      <div class="container-inner septenary-inner">
        <?php print $content['septenary']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['octonary']): ?>
    <div class="container octonary clearfix">
      <div class="container-inner octonary-inner">
        <?php print $content['octonary']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['nonary_header'] || $content['nonary_first'] || $content['nonary_second'] || $content['nonary_third'] || $content['nonary_footer'] ): ?>
    <div class="container nonary clearfix">
      <div class="container-inner nonary-inner">
        <div class="nonary-header clearfix">
          <div class="nonary-header-inner">
            <?php print $content['nonary_header']; ?>
          </div>
        </div>
        <?php if ($content['nonary_first'] || $content['nonary_second'] || $content['nonary_third']): ?>
          <div class="nonary-wrapper">
            <div class="column-content-region nonary-first">
              <div class="column-content-region-inner nonary-first-inner">
                <?php print $content['nonary_first']; ?>
              </div>
            </div>
            <div class="column-content-region nonary-second">
              <div class="column-content-region-inner nonary-second-inner">
                <?php print $content['nonary_second']; ?>
              </div>
            </div>
            <div class="column-content-region nonary-third">
              <div class="column-content-region-inner nonary-third-inner">
                <?php print $content['nonary_third']; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
        <div class="nonary-footer clearfix">
          <div class="nonary-footer-inner">
            <?php print $content['nonary_footer']; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['denary']): ?>
    <div class="container denary clearfix">
      <div class="container-inner denary-inner">
        <?php print $content['denary']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['footer']): ?>
    <div class="container footer clearfix">
      <div class="container-inner footer-inner">
        <?php print $content['footer']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['translations']): ?>
    <div class="container translations clearfix">
      <div class="container-inner translations-inner">
        <?php print $content['translations']; ?>
      </div>
    </div>
  <?php endif; ?>


</div><!-- /.sutro -->
