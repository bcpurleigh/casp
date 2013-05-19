<? get_header(); ?>
<? $per_col = floor($wp_query->post_count / 4); ?>
<div class="blog container">
	<div class="content">
		<? if (category_description() != ""): ?>
		<div class="category-description">
		<?= category_description(); ?>
		</div>
		<? endif; ?>
		<div class="columns clearfix">
		<? $i = 0; ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<? if ($i%$per_col == 0): ?><div class="column"><? endif; ?>
		<?php get_template_part( 'entry' ); ?>
		<? if ($i%$per_col == $per_col-1 || $i == $wp_query->post_count-1): ?></div><? endif; ?>
		<? $i++; ?>
		<?php endwhile; ?>
		</div>
		<? get_template_part('nav', 'below') ?>
	</div>
</div>
<?php get_footer(); ?>