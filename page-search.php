<? get_header(); ?>
<div class="single container ">
	<div class="content clearfix">
		<?=
		do_action( 'facetious', array(
			'submit' => 'Search',
			'class' => 'advanced-search-form',
			'fields' => array(
				's',
				'category',
				'm',
				'pt'
			)
		)); 
		?>
	</div>
</div>
<?php get_footer(); ?>