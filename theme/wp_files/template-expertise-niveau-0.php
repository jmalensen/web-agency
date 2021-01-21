<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Page expertise niveau 0
*			   @@themeDescription
* Template Name: Page Expertise niveau 0
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
                $introduction  = get_the_content();

                echo '<h1 class="intro__title">'.$title.'</h1>
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
            <div class="discover__contain">
                <?php

                    // Get child pages
                    $id = $post->ID;
                    $args = array( 
                            'child_of'          => $id,
                            'posts_per_page'    => -1,
                            'sort_column'       => 'menu_order'
                    );
                    $pages = get_pages($args);

                    foreach( $pages as $page ) : ?>

                    <?php
                    $id = $page->ID;
                    $thumbnail = get_field('thumbnail_expertise_n1', $id);
                    ?>

                    <a class="discover__contain__subpart" style="background-image:url(<?php echo $thumbnail['url'];?>)" href="<?php echo get_page_link($id); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/mask_expertise.png" alt="mask">
                        <h3 class="description"><?php echo $page->post_title; ?></h3>
                    </a>

                    <?php endforeach;
                ?>
            </div>
        </div>
    </section>
    <?php //------------------END SECTION DISCOVER------------------?>

    

</main>
<?php //------------END MAIN CONTENT------------------- ?>

<?php get_footer(); ?>
