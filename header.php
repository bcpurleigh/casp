<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <? language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><? wp_title(' | ', true, 'right'); ?></title>
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=1000">

    <link rel="icon" href="<?php bloginfo('template_directory');?>/favicon.png" type="image/x-icon"/>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_directory');?>/icon.144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory');?>/icon.114x114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory');?>/icon.72x72.png">
    <link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory');?>/icon.57x57.png">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/icon.57x57.png">

    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/main.css">

    <meta name="msapplication-TileImage" content="<?php bloginfo('template_directory');?>/icon.144x144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">

    <meta name="apple-mobile-web-app-capable" content="no">

    <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
    <script>(function(a){a.themeDir='<?php bloginfo('template_directory');?>'})(window)</script>
    <script data-main="<?php bloginfo('template_directory');?>/js/main" src="<?php bloginfo('template_directory');?>/js/components/require.js"></script>

    <? if (is_single()): ?>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <? endif; ?>

    <? wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<header>
	<div class="container">
		<a href="<?= site_url(); ?>" title="To Homepage"><img src="<?php bloginfo('template_directory');?>/images/logo.png" id="brand" /></a>
		<div class="inner">
			<h4><?= get_bloginfo ('description'); ?></h4>
			<form id="search" method="get" action="<?= site_url(); ?>">
				<div id="search-inputs">
					<input type="text" placeholder="Search" value="<?php the_search_query(); ?>" name="s" id="s"><!--
					--><input type="submit" id="search-submit" value="Search">
                    <? $search = get_page_by_title('search'); ?>
                    <? if ($search): ?>
                    <br/><a class="advanced-search" href="<?= get_permalink($search); ?>">Advanced Search</a>
                    <? endif; ?>
				</div>
			</form>
			<nav>
				<? wp_nav_menu(array(
					'menu' => 'CASP Header Navigation Menu',
					'menu_id' => '',
					'menu_class' => 'clearfix',
					'container' => false
				   )); ?>
			</nav>
		</div>
	</div>
</header>

<div class="wrapper">
<?php get_template_part( 'header', 'below' ); ?>