<? get_header(); ?>
<div class="single container ">
	<div class="content clearfix">
		<div class="columns clearfix">
			<div class="prev column">
				<? get_template_part( 'entry', 'prev' ); ?>
			</div>
			<div class="post column">
			<? while ( have_posts() ) : the_post(); ?>
			<? get_template_part( 'entry' ); ?>
			<? endwhile; ?>
			</div>
			<?php setup_postdata(get_adjacent_post(true, '')) ?>
			<div class="next column">
				<? get_template_part( 'entry', 'next' ); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>