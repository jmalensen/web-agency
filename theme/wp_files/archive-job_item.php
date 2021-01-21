<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Archive jobs
*			   @@themeDescription
*/

get_header();
?>

<?php //------------MAIN CONTENT----------------------- ?>
<main class="jobs" itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <?php //------------------HEADER-----------------------?>
    <header class="jobs__header container">
        <h1 class="jobs__title">Recrutement</h1>
    </header>
    <?php //------------------END HEADER-----------------------?>

    <?php //------------------LOOP-----------------------?>
    <div class="jobs__loop container">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php $spontaneous = get_field('candidature_spontanee');
        if( is_array($spontaneous) ) {
          $s = $spontaneous[0];
        } else {
          $s = '';
        }
        $i = 0; // counting... ?>
        <a href="<?php the_permalink(); ?>" class="jobs__item <?php if( $s == 'spontaneous' ) echo 'jobs__item--spontaneous'; ?>">
          <?php if( $s != 'spontaneous' ) : ?>
					<div class="jobs__item__image-wrapper">
						<?php
						$image = get_field('image');
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
    				<img class="jobs__item__image"
    						 src="<?php echo $src; ?>)"
    						 srcset="<?php echo $img_xs . ' ' . $img_xsw . 'w';?>,
								 				 <?php echo $img_sm . ' ' . $img_smw . 'w';?>,
    										 <?php echo $img_md . ' ' . $img_mdw . 'w';?>"
								 sizes="(min-width: 600px) 50vw,
								 				(min-width: 768px) 245px,
												(min-width: 996px) 315px,
												100vw"
    						 alt="<?php echo $alt; ?>"
    				/>
					</div>
          <?php endif; ?>
					<div class="jobs__item__content">
						<h2 class="jobs__item__title font-bitterbold"><?php the_title(); ?></h2>
            <p>
              <?php if( $s == 'spontaneous' ) : ?>
                <?php the_field('sous_titre'); ?>
              <?php else : ?>
                <?php the_field('type_de_contrat'); ?>
              <?php endif; ?>
            </p>
					</div>
        </a>
      <?php $i++; endwhile; endif;
      ?>
    </div>
    <?php //------------------END LOOP-----------------------?>


</main>
<?php //------------END MAIN CONTENT------------------- ?>

<?php get_footer(); ?>
