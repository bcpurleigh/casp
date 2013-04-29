<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<? if (is_singular()): ?>
	<? get_template_part('entry','single'); ?>
<? else: ?>
	<? get_template_part('entry','list'); ?>
<? endif; ?>
</div>