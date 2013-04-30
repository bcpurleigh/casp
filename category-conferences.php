<? get_header(); ?>
<? $per_col = ceil($wp_query->post_count / 4); ?>
<div class="conferences container ">
	<div class="content clearfix">
		<? if (category_description() != ""): ?>
		<div class="category-description">
		<?= category_description(); ?>
		</div>
		<? endif; ?>
		<div class="columns">
			<div class="upcoming column">
				<? $upcoming = new WP_Query('category_name=conferences&post_status=future&order=ASC'); ?>
				<h3 class="conference-title">Upcoming</h3>
				<? while ($upcoming->have_posts()): $upcoming->the_post(); ?>
				<? get_template_part( 'entry' ); ?>
				<? endwhile; ?>
			</div>
			<? wp_reset_query(); ?>
			<div class="past column">
				<h3 class="conference-title">Past</h3>
				<? while ( have_posts() ) : the_post(); ?>
				<? get_template_part( 'entry' ); ?>
				<? endwhile; ?>
			</div>
		</div>
		<? get_template_part('nav', 'below') ?>
	</div>
</div>
<?php get_footer(); ?>