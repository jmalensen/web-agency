<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Footer template
*			   @@themeDescription
*/

?>
	<?php
	// Recents posts counter
	$args = array(
    'posts_per_page' => -1,
    'post_type' => 'post',
    'date_query' => array(
        'after' => date('Y-m-d', strtotime('-30 days'))
    )
	);
	$posts = get_posts($args);
	$count = sizeof($posts);
	?>
	<span style="display: none !important;" id="recent-posts-count" data-count="<?php echo $count; ?>"></span>
	<?php get_template_part('partials/footer-nav'); ?>
	<?php wp_footer(); ?>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js" />

</body>
</html>
