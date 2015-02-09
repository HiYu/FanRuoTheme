<!Doctype html>
<html>
<head>
<meta property="wb:webmaster" content="2e89b310a854ac97" />
<meta name="baidu-site-verification" content="NPeIpGxkNd" />
<meta name = "keywords" content = "IT博客,学习笔记,读书随想，计算机,大数据,云计算,操作系统"/>
<meta name = "description" content = "生活、读书、知新 一个伪IT、伪文艺、伪愤青的读书学习笔记,关注计算机，关注文学历史"/>
	<title>
		<?php 
		if (is_home())
		{
			bloginfo('name');
			echo " - ";
			bloginfo('description');
			
		}
		elseif (is_category()) 
		{
			single_cat_title();
			echo " - ";
			bloginfo('name');
		}
		elseif (is_single() || is_page()) 
		{
			single_post_title();
			echo " - ";
			bloginfo('name');
		}
		elseif (is_search()) 
		{
			echo "搜索结果 - ";
			bloginfo('name');
		}elseif (is_tag()) {
			single_tag_title();
			echo "-";
			bloginfo('name');
		}
		else
		{
			wp_title('', true);
		}
		?>
	</title>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/img/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url');?>">
	<?php wp_head(); ?>
	<?php flush(); ?>
</head>
<body>
	<a name="gotop"></a>
	<header class = "header_wrap">
		<div class = "header_box">
			<div class = "logo"><a href="<?php bloginfo('url');?>"><img src = "<?php bloginfo('template_url'); ?>/img/logo.png"/></a>
				</div>
			<nav class = "nav">
				<?php wp_nav_menu( array( 'menu' => 'mymenu', 'depth' => 1) );?>
			</nav>
			<div class = "search">
				<?php get_search_form();?>
			</div>
		</div>
	</header>

