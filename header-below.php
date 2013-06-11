<? if (is_home()): ?>
	<div class="banner home">
	<? $featured_id = get_cat_id('featured'); ?>
	<? $posts = get_posts(array('numberposts' => 5, 'category' => $featured_id, 'post_status' => array('publish','future'))); ?>
	<div class="slider container">
		<div class="dots clearfix">
			<? for ($i=0;$i<count($posts);$i++): ?>
			<div class="dot" data-slide="<?= $i ?>"></div>
			<? endfor; ?>
		</div>
	<? $i = 0; ?>
	<? foreach ($posts as $post): setup_postdata($post); ?>
		<? if (has_post_thumbnail()): ?>
		<? $bg = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), array(1000,448)); ?>
		<? $bg = $bg[0]; ?>
		<div id="slider-slide-<?= $i++; ?>" class="slide" style="background-image:url(<?= $bg ?>);">
			<?
			$categories = get_the_category();
			$link_display = 'Read More';
			if (count($categories) >= 2) {
				$link_display .= ', ' . ucfirst($categories[1]->cat_name);
			} elseif (count($categories) == 1) {
				$link_display .= ', ' . ucfirst($categories[0]->cat_name);
			}
			?>
			<h2><? the_title(); ?></h2>
			<a href="<? the_permalink(); ?>" class="btn right-arrow"><?= $link_display ?></a>
		</div>
		<? endif; ?>
	<? endforeach; ?>
	</div>
<? elseif (is_search()): ?>
	<div class="category banner <?= $key ?>">
	<div class="container">
		<h1><?= get_search_query() ?></h1>
	</div>
<? elseif (is_category()): ?>
	<?php the_post(); ?>
	<? $key = get_key(single_cat_title('', false)); ?>
	<div class="category banner <?= $key ?>">
	<div class="container">
		<h1><? single_cat_title(); ?></h1>
	</div>
	<?php rewind_posts(); ?>
<? elseif (is_page()): ?>
	<?php the_post(); ?>
	<? $key = get_key(get_the_title()); ?>
	<div class="category banner <?= $key ?>">
	<div class="container">
		<h1><? the_title(); ?></h1>
	</div>
<? elseif (is_single()): ?>
	<div class="category banner post">
	<div class="container">
		<h1><? the_category(', ') ?></h1>
	</div>
<? endif; ?>
</div>