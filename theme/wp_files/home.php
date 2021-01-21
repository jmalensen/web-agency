<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Page actualités template
*			   @@themeDescription
*/

get_header();
?>

<?php //------------MAIN CONTENT----------------------- ?>
<main class="actualites" itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <?php //------------------HEADER-----------------------?>
    <header class="actualites__header container">
        <h1 class="actualites__title"><?php single_post_title(); ?></h1>
    </header>
    <?php //------------------END HEADER-----------------------?>

    <?php //------------------LOOP-----------------------?>
    <div class="actualites__loop">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
				$display = get_field('news_display');
				if( $display == 'simple' ) {
					$color = get_field('news_display_color');
				}
				?>
        <a href="<?php the_permalink(); ?>" class="actualites__item actualites__item--<?php echo $display; ?><?php if( $display == 'simple' ) { echo ' actualites__item--' . $color; } ?>">
					<?php if( $display != 'simple' ) : ?>
						<div class="actualites__item__image-wrapper">
							<?php
							$image = get_field('news_display_image');
							// var_dump($image);
							$src = $image['url'];
							$img_xs = $image['sizes']['thumbnail'];
							$img_xsw = $image['sizes']['thumbnail-width'];
							$img_sm = $image['sizes']['medium'];
							$img_smw = $image['sizes']['medium-width'];
    					$img_md = $image['sizes']['medium_large'];
	    				$img_mdw = $image['sizes']['medium_large-width'];
	    				$alt = $image['alt'];
	    				?>
	    				<img class="actualites__item__image"
	    						 src="<?php echo $src; ?>)"
	    						 srcset="<?php echo $img_xs . ' ' . $img_xsw . 'w';?>,
									 				 <?php echo $img_sm . ' ' . $img_smw . 'w';?>,
	    										 <?php echo $img_md . ' ' . $img_mdw . 'w';?>"
									 sizes="(min-width: 600px) 50vw,
									 				(min-width: 900px) 33vw,
													(min-width: 1200px) 25vw,
													(min-width: 1600px) 20vw,
													(min-width: 1920px) 17vw,
													50px"
	    						 alt="<?php echo $alt; ?>"
	    				/>
						</div>
					<?php endif; ?>
					<div class="actualites__item__content">
						<h2 class="actualites__item__title"><?php the_title(); ?></h2>
						<?php if(  $display != 'photo' && has_excerpt() ) {
							the_excerpt();
						} ?>
					</div>
        </a>
      <?php endwhile; endif;
      ?>
    </div>
    <?php //------------------END LOOP-----------------------?>


</main>
<?php //------------END MAIN CONTENT------------------- ?>

<?php get_footer(); ?>
