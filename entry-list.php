<?= has_post_thumbnail() ? get_the_post_thumbnail(get_the_id(), array(280,280)) : ''; ?>
<h2 class="post-title"><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
<div class="post-date"><? the_time('F j, Y'); ?></div>
<div class="post-excerpt"><? the_excerpt(); ?></div>