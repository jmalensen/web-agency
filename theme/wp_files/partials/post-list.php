<article class="item">
	<div class="content">
		<h3><?php the_title(); ?></h3>
		<?php the_excerpt(); ?>
		<div class="button_wrapper">
			<a data-label="<?php _e('Lire la suite', '@@themeName'); ?>" class="button" href="<?php the_permalink(); ?>">
				<?php _e('Lire la suite', '@@themeName'); ?>
			</a>
		</div>
	</div>
</article>