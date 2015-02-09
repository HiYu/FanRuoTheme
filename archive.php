<?php get_header() ?>
<div class = "wrap">
		<section class = "section">
			<div class = "cat_title">
				<?php if(is_category() || is_archive()):echo "分类：";single_cat_title(); endif;?>
			</div>
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
			<?php endwhile; ?>
		<?php endif;?>
		<div class = "paging">
			<?php pagination($query_string); ?>  
		</div>
		</section>
		<aside class = "aside"><?php get_sidebar(); ?></aside>
		<div style = "clear:both"></div>
</div>
<?php get_footer() ?>