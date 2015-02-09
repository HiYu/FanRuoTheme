<?php
	add_action('get_header', 'remove_admin_login_header'); 
	function remove_admin_login_header() 
	{ 
		remove_action('wp_head', '_admin_bar_bump_cb'); 
	}
	function get_abstract($content, $num_words, $more)
	{
		$trimmed_content = wp_trim_words( $content, $num_words, $more );
		echo $trimmed_content;
	}

function show_context_header()
{
	echo "作者：";
	the_author();
	echo " 时间：";
	the_time('Y-m-d H:m:s'); 
	$cat = get_the_category();
	if ($cat[0])
	{
		echo " 分类：";
		echo '<a href ="'.get_category_link($cat[0]->term_id ).'">'.$cat[0]->cat_name.'</a>';
	}	
}
function show_context_footer()
{
	echo '<div class = "tag">';
	the_tags();
	echo '</div><div class = "comment">';
	comments_popup_link('评论', '评论(1)', '评论(%)');
	echo "</div>";
}

function pagination($query_string)
{   
	global $posts_per_page, $paged;   
	$my_query = new WP_Query($query_string ."&posts_per_page=-1");   
	$total_posts = $my_query->post_count;   
	if(empty($paged))$paged = 1;   
	$prev = $paged - 1;   
	$next = $paged + 1;   
	$range = 2; // only edit this if you want to show more page-links   
	$showitems = ($range * 2)+1;   
	  
	$pages = ceil($total_posts/$posts_per_page);   
	if(1 != $pages)
	{   
		echo "<div class='pagination'>";   
		echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<a href='".get_pagenum_link(1)."'>最前</a>":"";   
		echo ($paged > 1 && $showitems < $pages)? "<a href='".get_pagenum_link($prev)."'>上一页</a>":"";   
		  
		for ($i=1; $i <= $pages; $i++)
		{   
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{   
			echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";   
			}   
		}    
		echo ($paged < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";   
		echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<a href='".get_pagenum_link($pages)."'>最后</a>":"";   
		echo "</div>\n";   
	}   
}

if(function_exists('register_sidebar')){
	register_sidebar(array(
		'name'=>'首页侧边栏',
		'id' => 'home-sidebar',
		'before_widget' => '<div class="sidebar-h">',
		'after_widget' => '</div>',
		'before_title' => '<div class = "widget_title">',
		'after_title' => '</div>',
	));
	}

register_nav_menus();

//边栏彩色标签
function colorCloud($text) {
	$text = preg_replace_callback('|<a (.+?)>|i','colorCloudCallback', $text);
	return $text;
}
function colorCloudCallback($matches) {
	$text = $matches[1];
	$color = dechex(rand(0,16777215));
	$pattern = '/style=(\'|\”)(.*)(\'|\”)/i';
	$text = preg_replace($pattern, "style=\"color:#{$color};$2;\"", $text);
	return "<a $text>";
}
add_filter('wp_tag_cloud', 'colorCloud', 1);
function mytheme_get_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar', 10, 3 );

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/img/custom-login-logo.png) !important; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');
add_filter('login_headerurl', create_function(false,"return get_bloginfo('url');"));
add_filter('login_headertitle', create_function(false,"return get_bloginfo('name');"));
?>
