<?php get_header()?>
<div class = "wrap">
		<section class = "section">
			<?php if (have_posts()) : the_post(); update_post_caches($posts); ?> 
			<article class = "article">
				<div class = "article_title_box">
					<div class = "article_title">
						<a href = "<?php the_permalink();?>"> <?php the_title(); ?></a>
					</div>
					<div class = "article_tag">
						<?php show_context_header()?>
					 </div>
					
				</div>
				<div class = "article_text">
					<?php the_content();?>
				</div>
				<div class = "single_copyright">
					<span>本文链接：<a href = "<?php the_permalink()?>"><?php the_permalink()?></a></span>

				</div>
			</article>
			<div class = "comment_area">
			<?php if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;?>
			</div>
			<?php endif?>
		</section>
		<aside class = "aside"><?php get_sidebar(); ?></aside>
		<div style = "clear:both"></div>
</div>
<?php get_footer()?>