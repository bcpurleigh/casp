<? global $post; ?>
<? $post = get_adjacent_post(); ?>
<? if ($post): ?>
<? setup_postdata($post) ?>
<div class="post">
<?= has_post_thumbnail() ? get_the_post_thumbnail(get_the_id(), array(280,280)) : ''; ?>
<h2 class="post-title"><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
<div class="posted"><? the_time('F j, Y'); ?></div>
<div class="post-excerpt"><? the_excerpt(); ?></div>
</div>
<? endif; ?>
<?php wp_reset_postdata(); ?>