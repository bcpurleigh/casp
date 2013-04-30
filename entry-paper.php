<? $parent = get_category(get_query_var('cat'),false); ?>
<? $post_categories = get_the_category() ?>
<? $cat_name = $parent->name; ?>
<? foreach($post_categories as $c) {
	if ($parent->term_id == $c->parent) {
		$cat_name = $c->name;
	}
} ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="post-category"><?= $cat_name ?></div>
<h2 class="post-title"><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
<div class="posted"><? the_author(); ?> - <? the_time('F j, Y'); ?></div>
</div>