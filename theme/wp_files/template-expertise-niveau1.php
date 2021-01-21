<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Page expertise niveau 1 template
*			   @@themeDescription
* Template Name: Page Expertise niveau 1
*/

get_header();
?>

<?php //------------MAIN CONTENT----------------------- ?>
<main class="page-expertise-n1" itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <?php //------------------HEADER INTRODUCTION------------------?>
    <header id="intro" class="intro">
        <div class="container wrapper">
            <?php
                $title  = get_the_title();
                $subtitle = get_field( "subtitle_expertise_n1" );
                $introduction  = get_field( "introduction_expertise_n1" );

                echo '<h1 class="intro__title">'.$title.'<span class="punct">.</span></h1>
                <p class="intro__subtitle">'.$subtitle.'</p>
                <div class="intro__description">
                    <img class="quote_image desktop" src="'.get_stylesheet_directory_uri().'/images/quote2.svg" alt="quotes"/>
                    <div>'.$introduction.'</div>
                </div>';
            ?>
        </div>
    </header>
    <?php //------------------END HEADER INTRODUCTION--------------?>


    <?php //------------------SECTION DISCOVER----------------------?>
    <section id="discover" class="discover">
        <div class="container wrapper">
            <h2 class="discover__title"><?php _e('Découvrez nos prestations', '@@themeName');?></h2>
            <?php
                $firstlineMethod  = get_field( "method_line_1_home" );

                echo '<p class="method__line1">'.$firstlineMethod.'</p>';
            ?>
            <div class="discover__contain">
                <?php
                    // Determine parent page ID
                    $parentPageId = ($post->ID);

//                        var_dump($parentPageId);
                    $categoryId = -1;
                    switch($parentPageId):
                        case 26:
                            $categoryId = 8;
                        break;

                        case 28:
                            $categoryId = 9;
                        break;

                        case 30:
                            $categoryId = 10;
                        break;

                        case 32:
                            $categoryId = 11;
                        break;

                        case 34:
                            $categoryId = 12;
                        break;

                        case 36:
                            $categoryId = 13;
                        break;

                        case 38:
                            $categoryId = 14;
                        break;
                    endswitch;

                    // Get child pages
                    $args = array( 
                            'post_type' => 'prestation',
                            'cat' => $categoryId,
                            'posts_per_page' => -1
                    );
                    $the_query = new WP_Query( $args );
                    if($the_query->have_posts()):
                        while ($the_query->have_posts()) : $the_query->the_post();
                            $thumbnail = get_field('thumbnail_expertise_n2');
                ?>
                    <a class="discover__contain__subpart" style="background-image:url(<?php echo $thumbnail['url'];?>)" href="<?php the_permalink() ?>">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/mask_expertise.png" alt="mask">
                        <h3 class="description"><?php the_title()?></h3>
                    </a>
                <?php 
                        endwhile;
                    else:
                        echo '<p>'.__('Pas de prestations pour cette expertise', '@@themeName').'</p>';
                    endif;

                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
    <?php //------------------END SECTION DISCOVER------------------?>

</main>
<?php //------------END MAIN CONTENT------------------- ?>

<?php get_footer(); ?>
