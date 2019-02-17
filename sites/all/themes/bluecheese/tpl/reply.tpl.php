<?php

/**
 * @file
 * Default theme implementation for a reply.
 */
?>
<div id="reply-<?php print $id ?>" class="<?php print $classes ?>">
  <?php print $user_picture; ?>

  <div class="reply-body">
    <div class="username"><?php print $author; ?>:</div>
    <?php print render($content) ?>
  </div>

  <div class="reply-links"><?php print render($links) ?></div>
</div>
