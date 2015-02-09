<?php get_header();?>
<div class = "wrap">
		<section class = "section">
			<?php if(have_posts()):?>
				<?php while(have_posts()): the_post();?>
					<div class = "context_box">
						<div class = "context_title">
							<a href = "<?php echo get_permalink($post->ID);?>"> <?php the_title(); ?></a>
						</div>
						<div class = "context_header">
							<?php show_context_header()?>
						</div>
						<div class = "context_abstract">
							<?php get_abstract(get_the_content(), 300, '<a href="'. get_permalink() .'"> ...阅读更多</a>') ?>
						</div>
						<div class = "context_footer">
							<?php show_context_footer();?>
						</div>	
					</div>
					<div style = "clear"></div>
				<?php endwhile;?>
			<?php else:?>
			<div class = "no_search_result">
				<div class = "result_notice"><span>哦哦！没有找到您要的文章！</span></div>
				<div class = "recomment_box">
					<div class = "recomment_title">最新博文推荐</div>
					<div class = "recomment">
					<?php get_archives('postbypost', 8); ?>
					</div>
				</div>
			</div>
				
		<?php endif;?>
		<div class = "paging">
			<?php if(function_exists('paging_nav')) paging_nav(); ?>
		</div>
		</section>
		<aside class = "aside"><?php get_sidebar(); ?></aside>
		<div style = "clear:both"></div>
</div>
<?php get_footer();?>