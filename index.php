<?php get_header(); ?>

<? $args = array('orderby' => 'id', 'hide_empty' => 0, 'parent' => 0); ?>
<? $categories = get_categories($args); ?>

<div class="container">
	<div id="masonry" class="clearfix">
	<? foreach ($categories as $category): ?>
		<? if ($category->slug != 'uncategorized' && $category->slug != 'featured' && $category->slug != 'events'): ?>
		<? $posts = get_posts(array('numberposts' => rand(3,5), 'category' => $category->term_id)); ?>

		<div class="block">
			<h3 class="<?= get_key($category->name) ?>">
				<a href="<?= get_category_link( $category->term_id ) ?>"><?= $category->name ?></a>
			</h3>
			<div class="posts">
				<? foreach ($posts as $post): setup_postdata($post); ?>
				<div class="post clearfix">
					<h2><a href="<? the_permalink(); ?>"><? the_title(); ?></a></h2>
					<div class="posted"><? the_time('F j, Y'); ?></div>
					<?= has_post_thumbnail() ? get_the_post_thumbnail(get_the_id(), 'thumbnail') : ''; ?>
					<? the_excerpt(); ?>
				</div>
				<? endforeach; ?>
			</div>
			<a href="<?= get_category_link( $category->term_id ) ?>" class="btn right-arrow go-to">Go to <?= $category->name ?></a>
		</div>
		<? endif; ?>
	<? endforeach; ?>

	<? require('retrieve.php'); ?>
	<? $forum = retrieve_forum(); $bn = retrieve_bn(); $journal = retrieve_journal(); ?>

	<? if (count($bn) > 0): ?>
	<div class="block">
		<h3 class="bn-archives">
			<a href="http://www.bnarchives.net/">BN Archives</a>
		</h3>
		<div class="posts">
			<? $i = 0; ?>
			<? foreach ($bn as $b): ?>
			<div class="post">
				<h2><a target="_blank" href="<?= $b['href'] ?>"><?= $b['title'] ?></a></h2>
			</div>
			<? if ($i++ > 4) break; ?>
			<? endforeach; ?>
		</div>
		<a href="http://www.bnarchives.net/" class="btn right-arrow go-to">Go to BN Archives</a>
	</div>
	<? endif; ?>

	<? if (count($forum) > 0): ?>
	<div class="block">
		<h3 class="critical-mass-forum">
			<a href="/forum">Critical Mass Forum</a>
		</h3>
		<div class="posts">
			<? $i = 0; ?>
			<? foreach ($forum as $f): ?>
			<div class="post">
				<h2><a target="_blank" href="<?= $f['href'] ?>"><?= $f['title'] ?></a></h2>
				<div class="posted"><?= $f['posted'] ?></div>
				<p><?= $f['desc']; ?></p>
			</div>
			<? if ($i++ > 4) break; ?>
			<? endforeach; ?>
		</div>
		<a href="/forum" class="btn right-arrow go-to">Go to Critical Mass Forum</a>
	</div>
	<? endif; ?>

	<? if (count($journal) > 0): ?>
	<div class="block">
		<h3 class="recasp-journal">
			<a href="http://www.uow.edu.au/arts/research/recasp/articles/index.html">RECASP Journal</a>
		</h3>
		<div class="posts">
			<? foreach ($journal as $j): ?>
			<div class="post">
				<h2><a target="_blank" href="<?= $j['href'] ?>"><?= $j['title'] ?></a></h2>
				<p><?= $j['desc']; ?></p>
			</div>
			<? endforeach; ?>
		</div>
		<a href="http://www.uow.edu.au/arts/research/recasp/articles/index.html" class="btn right-arrow go-to">Go to RECASP Journal</a>
	</div>
	<? endif; ?>

	</div>
</div>

<?php get_footer(); ?>