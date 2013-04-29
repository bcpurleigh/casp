<?php get_header(); ?>

<? $args = array('orderby' => 'id', 'hide_empty' => 0, 'parent' => 0); ?>
<? $categories = get_categories($args); ?>

<div class="container">
	<div id="masonry" class="clearfix">
	<? foreach ($categories as $category): ?>
		<? if ($category->slug != 'uncategorized' && $category->slug != 'featured'): ?>
		<? $posts = get_posts(array('numberposts' => rand(3,5), 'category' => $category->term_id)); ?>

		<div class="block">
			<h3 class="<?= get_key($category->name) ?>">
				<a href="<?= get_category_link( $category->term_id ) ?>"><?= $category->name ?></a>
			</h3>
			<div class="posts">
				<? foreach ($posts as $post): setup_postdata($post); ?>
				<div class="post">
					<h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
					<div class="posted"><? the_time('F j, Y'); ?></div>
					<?= has_post_thumbnail() ? get_the_post_thumbnail(get_the_id(), array(64,64)) : ''; ?>
					<? the_excerpt(); ?>
				</div>
				<? endforeach; ?>
			</div>
			<a class="btn right-arrow go-to">Go to <?= $category->name ?></a>
		</div>
		<? endif; ?>
	<? endforeach; ?>
	</div>
</div>

<script type="text/javascript">var _a = _a || []; _a.push(['masonry','run']);</script>

<?php get_footer(); ?>