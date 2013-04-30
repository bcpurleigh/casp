<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?= has_post_thumbnail() ? get_the_post_thumbnail(get_the_id(), array(280,280)) : ''; ?>
<h2 class="post-title"><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
<div class="posted">
	<? the_time('F j, Y'); ?><? if (is_single()): ?> | Posted by <? the_author(); ?><? endif; ?>
</div>
<? if (is_single()): ?>
<div class="post-content"><? the_content(); ?></div>
<? else: ?>
<div class="post-excerpt"><? the_excerpt(); ?></div>
<? endif; ?>
</div>