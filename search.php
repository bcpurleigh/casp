<? get_header(); ?>
<? $per_col = ceil($wp_query->post_count / 4); ?>
<div class="publications container ">
	
	<div class="content clearfix">
		<? if ($wp_query->post_count > 0): ?>
		<div class="columns clearfix">
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
		<? else: ?>
		<h2>Sorry, no articles match your search of &quot;<?= get_search_query() ?>&quot;</h2>
		<p>Please try again or refine your search.</p>
		<? endif; ?>
	</div>
</div>
<?php get_footer(); ?>