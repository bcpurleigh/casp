<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
<? if ( ! is_single()): ?><a href="<? the_permalink(); ?>"><? endif; ?>
<?= has_post_thumbnail() ? get_the_post_thumbnail(get_the_id(), 'thumbnail', array('class' => 'post-image')) : ''; ?>
<? if ( ! is_single()): ?></a><? endif; ?>
<h2 class="post-title"><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
<div class="posted">
	<? the_time('F j, Y'); ?><? if (is_single()): ?> | Posted by <? the_author(); ?><? endif; ?>
</div>
<? if (is_single()): ?>
<div class="post-content"><? the_content(); ?></div>
<? else: ?>
<div class="post-excerpt"><? the_excerpt(); ?></div>
<? endif; ?>
</div>
<? if (is_single()): ?>
<? $categories = get_the_category(); ?>
<? if ($categories): ?>
<div class="post-categories">
<? $categories = get_the_category(); ?>
Posted in: 
<? foreach($categories as $category): ?>
<? if ($category->name != 'Uncategorized' && $category->name != 'featured'): ?>
<a href="<?= get_category_link($category->term_id) ?>" title="View all posts in <?= $category->name ?>"><?= $category->cat_name ?></a>
<? endif; ?>
<? endforeach; ?>
</div>
<? endif; ?>
<div class="post-footer clearfix">
<div class="post-social clearfix">
		<div class="service twitter">
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="rememberum" data-count="none">Tweet</a>
		</div>
		<div class="service google">
			<div class="g-plusone" data-size="medium" data-annotation="none"></div>
		</div>
		<div class="service facebook">
			<div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
		</div>
	</div>
</div>
<div class="post-comments">
<?php comments_template('', true); ?>
</div>
<? endif; ?>