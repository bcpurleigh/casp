<? get_header(); ?>
<? $title = strtolower(get_the_title()); ?>
<? if ($title == "data sharing"): ?><div class="container "><div class="content clearfix"><? endif; ?>
		<?php the_content(); ?>
<? if ($title == "data sharing"): ?></div></div><? endif; ?>
<?php get_footer(); ?>