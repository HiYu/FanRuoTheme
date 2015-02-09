<?php get_header()?>
<div class = "wrap">
		<section class = "section">
			<?php if (have_posts()) : the_post(); update_post_caches($posts); ?> 
			<article class = "article">
				<div class = "article_title_box">
					<div class = "article_title">
						<a href = "<?php get_permalink();?>"> <?php the_title(); ?></a>
					</div>
					<div class = "article_tag">
						<?php echo"作者 "; the_author(); echo" "; echo "时间 ";the_time('Y-m-d H:m:s');?>
					 </div>
					
				</div>
				<div class = "article_text">
					<?php the_content();?>
				</div>
			</article>
			<?php endif?>
		</section>
		<aside class = "aside"><?php get_sidebar(); ?></aside>
		<div style = "clear:both"></div>
</div>
<?php get_footer()?>