<? get_header(); ?>
<? $per_col = ceil($wp_query->post_count / 4); ?>
<div class="publications container ">
	
	<div class="content clearfix">
		<? if (category_description() != ""): ?>
		<div class="category-description">
		<?= category_description(); ?>
		</div>
		<? endif; ?>
		<div class="columns">
			<div class="column">
				<? $i=0; while (have_posts()): the_post(); if ($i++%2 == 0): ?>
				<? get_template_part( 'entry' ); ?>
				<? endif; endwhile; ?>
			</div>
			<? rewind_posts(); ?>
			<div class="column">
				<? $i=0; while ( have_posts() ): the_post(); if ($i++%2 == 1): ?>
				<? get_template_part( 'entry' ); ?>
				<? endif; endwhile; ?>
			</div>
		</div>
		<? get_template_part('nav', 'below') ?>
	</div>
</div>
<?php get_footer(); ?>