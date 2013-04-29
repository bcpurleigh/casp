<? get_header(); ?>
<div class="container">
	<div class="content">
		<div class=" clearfix">
		<? $i = 0; ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<? if ($i%2 == 0): ?><div class="column"><? endif; ?>
		<?php get_template_part( 'entry' ); ?>
		<? if ($i%2 == 1): ?></div><? endif; ?>
		<? $i++; ?>
		<?php endwhile; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>