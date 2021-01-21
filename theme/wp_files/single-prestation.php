<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Page expertise niveau 2 template
*			   @@themeDescription
* Template Name: Page Expertise niveau 2
*/

get_header();

setlocale(LC_ALL, "en_US.utf8");
?>

<?php //------------MAIN CONTENT----------------------- ?>
<main class="page-expertise-n2" itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <?php //------------------HEADER INTRODUCTION------------------?>
    <header id="introPresta" class="introPresta">
        <div class="container wrapper">
            <h1 class="introPresta__title"><?php echo get_the_title() ?><span class="punct">.</span></h1>

            <?php
                $expertise_n2_titre_menu_mobile_introduction = get_field( "expertise_n2_titre_menu_mobile_introduction" );
                $expertise_n2_titre_menu_mobile_calltoaction = get_field( "expertise_n2_titre_menu_mobile_calltoaction" );
                $expertise_n2_titre_menu_mobile_method = get_field( "expertise_n2_titre_menu_mobile_method" );
                $expertise_n2_titre_menu_mobile_process = get_field( "expertise_n2_titre_menu_mobile_process" );
                $expertise_n2_titre_menu_mobile_illustration = get_field( "expertise_n2_titre_menu_mobile_illustration" );
                $expertise_n2_titre_menu_mobile_freecontent = get_field( "expertise_n2_titre_menu_mobile_freecontent" );
                $expertise_n2_titre_menu_mobile_plusconcept = get_field( "expertise_n2_titre_menu_mobile_plusconcept" );
                $expertise_n2_titre_menu_mobile_prestations = get_field( "expertise_n2_titre_menu_mobile_prestations" );
                function clearAnchor($anchor){
                    return strtolower(preg_replace('/\s+/', '', stripslashes(iconv('UTF-8', 'ASCII//TRANSLIT', $anchor))));
                }

                $showMenuMob = true;
                if(!$expertise_n2_titre_menu_mobile_introduction
                        && !$expertise_n2_titre_menu_mobile_calltoaction
                        && !$expertise_n2_titre_menu_mobile_method
                        && !$expertise_n2_titre_menu_mobile_process
                        && !$expertise_n2_titre_menu_mobile_illustration
                        && !$expertise_n2_titre_menu_mobile_freecontent
                        && !$expertise_n2_titre_menu_mobile_plusconcept
                        && !$expertise_n2_titre_menu_mobile_prestations){
                    $showMenuMob = false;
                }

                if($showMenuMob){
            ?>
                <div class="introPresta__menu-mob-horizontal">
                    <img class="before" src="<?php echo get_template_directory_uri() ?>/images/background-after-menu-left.png" alt="cache menu"/>
                    <div class="contain-items">
                        <ul class="mmh_list-item">
                            <?php
                                if ($expertise_n2_titre_menu_mobile_introduction) {
                                    echo '<li class="mmh_item-menu active"><a href="#'.clearAnchor($expertise_n2_titre_menu_mobile_introduction).'">'.$expertise_n2_titre_menu_mobile_introduction.'</a></li>';
                                }
                                if ($expertise_n2_titre_menu_mobile_calltoaction) {
                                    echo '<li class="mmh_item-menu"><a href="#'.clearAnchor($expertise_n2_titre_menu_mobile_calltoaction).'">'.$expertise_n2_titre_menu_mobile_calltoaction.'</a></li>';
                                }
                                if ($expertise_n2_titre_menu_mobile_method) {
                                    echo '<li class="mmh_item-menu"><a href="#'.clearAnchor($expertise_n2_titre_menu_mobile_method).'">'.$expertise_n2_titre_menu_mobile_method.'</a></li>';
                                }
                                if ($expertise_n2_titre_menu_mobile_process) {
                                    echo '<li class="mmh_item-menu"><a href="#'.clearAnchor($expertise_n2_titre_menu_mobile_process).'">'.$expertise_n2_titre_menu_mobile_process.'</a></li>';
                                }
                                if ($expertise_n2_titre_menu_mobile_illustration) {
                                    echo '<li class="mmh_item-menu"><a href="#'.clearAnchor($expertise_n2_titre_menu_mobile_illustration).'">'.$expertise_n2_titre_menu_mobile_illustration.'</a></li>';
                                }
                                if ($expertise_n2_titre_menu_mobile_freecontent) {
                                    echo '<li class="mmh_item-menu"><a href="#'.clearAnchor($expertise_n2_titre_menu_mobile_freecontent).'">'.$expertise_n2_titre_menu_mobile_freecontent.'</a></li>';
                                }
                                if ($expertise_n2_titre_menu_mobile_plusconcept) {
                                    echo '<li class="mmh_item-menu"><a href="#'.clearAnchor($expertise_n2_titre_menu_mobile_plusconcept).'">'.$expertise_n2_titre_menu_mobile_plusconcept.'</a></li>';
                                }
                                if ($expertise_n2_titre_menu_mobile_prestations) {
                                    echo '<li class="mmh_item-menu"><a href="#'.clearAnchor($expertise_n2_titre_menu_mobile_prestations).'">'.$expertise_n2_titre_menu_mobile_prestations.'</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <img class="after" src="<?php echo get_template_directory_uri() ?>/images/background-after-menu.png" alt="cache menu"/>
                </div>
            <?php
                }
            ?>


            <p class="introPresta__subtitle"><?php echo get_field( "subtitle_expertise_n2" ) ?></p>


            <div class="introPresta__description" id="<?php echo clearAnchor($expertise_n2_titre_menu_mobile_introduction); ?>">
                <img class="quote_image desktop" src="<?php echo get_stylesheet_directory_uri(); ?>/images/quote2.svg" alt="quotes">

                <div class="short-text">
                    <?php echo custom_field_excerpt( "introduction_expertise_n2" ); ?>
                </div>
                <div class="full-text">
                    <?php echo get_field( "introduction_expertise_n2" ); ?>
                </div>
            </div>
        </div>
    </header>
    <?php //------------------END HEADER INTRODUCTION--------------?>

    <div id="anchor" class="container">
        <div id="anchor-contain">
            <div id="logo"></div>
        </div>
    </div>
    <?php //------------------SECTION CALLTOACTION----------------------?>
    <section id="<?php echo clearAnchor($expertise_n2_titre_menu_mobile_calltoaction); ?>" class="calltoaction">
        <div class="container wrapper">
            <div class="contain col-xs-offset-0 col-xs-12 col-sm-offset-5 col-sm-7 col-md-offset-5 col-md-7">
                <?php
                    $text = get_field( "text_calltoaction_expertise_n2" );

                    echo '<p class="calltoaction__text">'.$text.'</p>';
                ?>
                <div class="calltoaction__containsBtn">
                    <a class="calltoaction__containsBtn__btn works" href="<?php echo get_home_url(); ?>/projets/"><?php _e('Voir nos réalisations', '@@themeName');?></a>
                    <a class="calltoaction__containsBtn__btn contact" href="<?php echo get_home_url(); ?>/contact/"><?php _e('Contactez-nous', '@@themeName');?></a>
                </div>
            </div>
        </div>
    </section>
    <?php //------------------END SECTION CALLTOACTION------------------?>

    <?php //------------------SECTION METHOD----------------------?>
    <section id="<?php echo clearAnchor($expertise_n2_titre_menu_mobile_method); ?>" class="methodPresta container">
        <div class="col wrapper text col-xs-12 col-md-5">
            <?php
                $title = get_field( "title_method_expertise_n2" );
                $text = get_field( "description_method_expertise_n2" );
                $image = get_field( "image_method_expertise_n2" );

                echo '<h2 class="methodPresta__title">'.$title.'</h2>
                      <div class="methodPresta__text">'.$text.'</div>';
            ?>
        </div>

        <?php
        $background = get_field('image_method_expertise_n2');
        $small_url = $background['sizes']['content_full_mobile_presta'];
        $medium_url = $background['sizes']['content_full_tablet_presta'];
        $large_url = $background['sizes']['content_full_desktop'];
        $retina_url = $background['sizes']['content_full_desktop_retina'];
        //style="background-image:url('<?php echo $background['url'];
        /*<img src="<?php echo $background['sizes']['fulllarge_realisation'];?>" alt="<?php echo $background['alt'];?>
         * <?php echo $small_url ?> 480w, <?php echo $medium_url ?> 768w, */
        ?>

        <div class="col image col-xs-12 col-md-7" >
            <picture>
                <source 
                    srcset="<?php echo $small_url ?>"
                    media="(max-width: 479px)">
                <source 
                    srcset="<?php echo $medium_url?>"
                    media="(min-width: 480px) and (max-width: 767px)">
                <source 
                    srcset="<?php echo $large_url?>"
                    media="(min-width: 768px) and (max-width: 991px)">
                <source 
                    srcset="<?php echo $retina_url?>"
                    media="(min-width: 992px)">
                <img src="<?php echo $large_url ?>"
                     alt="<?php echo $background['alt'] ?>"
                     title="<?php echo $background['title'] ?>"/>
            </picture>
        </div>
    </section>
    <?php //------------------END SECTION METHOD------------------?>

    <?php //------------------SECTION PROCESS----------------------?>
    <section id="<?php echo clearAnchor($expertise_n2_titre_menu_mobile_process); ?>" class="process">
        <div class="container wrapper">
            <div class="process__image col-sm-5 col-md-5">
                <img class="quote_image desktop" src="<?php echo get_stylesheet_directory_uri(); ?>/images/quote1.svg" alt="quotes"/>
            </div>

            <div class="process__text col-sm-7 col-md-7">
                <?php
                    $title = get_field( "title_process_expertise_n2" );

                    echo '<h2 class="process__text__title">'.$title.'</h2>
                          <ul class="process__text__list">';

                    //---------LOOP process---------------------/
                    if( have_rows('repeater_texts_expertise_n2') ):
                        while( have_rows('repeater_texts_expertise_n2') ) : the_row();
                            $line = get_sub_field( "line_text_expertise_n2");

                            echo '<li class="line">
                                '.$line.'
                            </li>';
                        endwhile;
                    endif;

                    echo '</ul>';
                ?>
            </div>
        </div>
    </section>
    <?php //------------------END SECTION PROCESS------------------?>

    <?php //------------------SECTION ILLUSTRATION----------------------
    $background = get_field( "image_illustration_expertise_n2" );
    $small_url = $background['sizes']['content_full_mobile_presta'];
    $medium_url = $background['sizes']['content_full_tablet'];
    $large_url = $background['sizes']['content_full_desktop'];
    $retina_url = $background['sizes']['content_full_desktop_retina'];
    
    //style="background:url('<?php echo $background; >') no-repeat;"
    /*<div class="skew_revert skew_revert5">
            <div class="container wrapper">

            </div>
        </div>*/
    ?>
    <section id="<?php echo clearAnchor($expertise_n2_titre_menu_mobile_illustration); ?>" class="illustration ">
        <div class="center">
            <picture>
                <source 
                    srcset="<?php echo $small_url ?>"
                    media="(max-width: 479px)">
                <source 
                    srcset="<?php echo $medium_url?>"
                    media="(min-width: 480px) and (max-width: 767px)">
                <source 
                    srcset="<?php echo $large_url?>"
                    media="(min-width: 768px) and (max-width: 991px)">
                <source 
                    srcset="<?php echo $retina_url?>"
                    media="(min-width: 992px)">
                <img class="adn__part-2__img" src="<?php echo $large_url ?>"
                     alt="<?php echo $background['alt'] ?>"
                     title="<?php echo $background['title'] ?>"/>
            </picture>
        </div>
    </section>
    <?php //------------------END SECTION ILLUSTRATION------------------?>

    <?php //------------------SECTION FREE CONTENT----------------------?>
    <section id="<?php echo clearAnchor($expertise_n2_titre_menu_mobile_freecontent); ?>" class="freecontent">
        <div class="container wrapper">
            <?php
                $title = get_field( "title_freecontent_expertise_n2" );
                $content = get_field( "content_freecontent_expertise_n2" );

                echo '<h2 class="freecontent__title">'.$title.'</h2>
                      <div class="freecontent__text">'.$content.'</div>';
            ?>
        </div>
    </section>
    <?php //------------------END SECTION FREE CONTENT------------------?>

    <?php //------------------SECTION PLUS CONCEPT----------------------?>
    <section id="<?php echo clearAnchor($expertise_n2_titre_menu_mobile_plusconcept); ?>" class="plusconcept">
        <div class="container wrapper">
            <?php
                $content = get_field( "content_plusconcept_expertise_n2" );

                echo '<h2 class="plusconcept__title">'.__('Le','@@themeName').'<span class="plusconcept__title__icon"></span><span class="plusconcept__title__secondline">'.__('Concept Image','@@themeName').'</span></h2>
                <div class="plusconcept__text">'.$content.'</div>';
            ?>
            <p class="plusconcept__knowmore"><?php _e('Vous voulez en savoir plus?','@@themeName'); ?></p>
            <p class="plusconcept__link"><a href="<?php echo get_home_url(); ?>/contact/"><?php _e('Contactez-nous','@@themeName'); ?></a></p>
        </div>
    </section>
    <?php //------------------END SECTION PLUS CONCEPT------------------?>

    <?php //------------------SECTION OTHER PRESTA----------------------?>
    <section id="<?php echo clearAnchor($expertise_n2_titre_menu_mobile_prestations); ?>" class="otherpresta">
        <div class="container wrapper">
            <h2 class="otherpresta__title"><?php _e('Prestations complémentaires','@@themeName'); ?></h2>
            <?php
                echo '<div class="otherpresta__contain">';

                //---------LOOP prestas---------------------/
                if( have_rows('prestations_repeater_expertise_n2') ):
                    while( have_rows('prestations_repeater_expertise_n2') ) : the_row();
                        // override $post
                        $presta = get_sub_field( "linktoexpertise_expertise_n2");
                        setup_postdata( $presta );
                        $thumbnail = get_field('thumbnail_expertise_n2', $presta->ID);

                        echo '<a class="otherpresta__contain__subpart" style="background-image:url('.$thumbnail['url'].')" href="'.get_the_permalink($presta->ID).'">
                            <img src="'.get_home_url().'/wp-content/themes/ci_concept-image-2017/images/mask_expertise.png" alt="mask">
                            <h3 class="description">'.$presta->post_title.'</h3>
                        </a>';
                        wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                    endwhile;
                endif;
                echo '</div>';
            ?>
        </div>
    </section>
    <?php //------------------END SECTION OTHER PRESTA------------------?>

</main>
<?php //------------END MAIN CONTENT------------------- ?>

<?php get_footer(); ?>
