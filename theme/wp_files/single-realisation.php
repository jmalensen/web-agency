<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Realisation template
*              @@themeDescription
*/

get_header(); ?>
<?php

    $category = get_the_category();
    $category = count($category) > 0 ? $category[0]->slug : "default";

    // itemtype en fonction du slug de la catégorie
    switch ($category) {
        // site-internet => "WebSite"
        case "site-internet":
            $schema_itemtype = "WebSite";
            break;

        // applications => "SoftwareApplication"
        case "applications":
            $schema_itemtype = "SoftwareApplication";
            break;

        // videos => "VideoObject"
        case "videos":
            $schema_itemtype = "VideoObject";
            break;

        // formations => "Course"
        case "formations":
            $schema_itemtype = "Course";
            break;

        // marketing-digital,strategie-digitale ou ux-design => "CreativeWork"
        default:
            $schema_itemtype = "CreativeWork";
            break;
    }

    // 1 - Présentation
    $realisation_year = get_field('realisation_year');
    $realisation_client = get_field('realisation_client');
    $realisation_segment = get_field('realisation_segment');
    $realisation_jobs = get_field('realisation_jobs');
    $realisation_link_text = get_field('realisation_link_text');
    $realisation_link_url = get_field('realisation_link_url');
    $realisation_introduction = get_field('realisation_introduction');

    // désactivation Sections 2 à 8
    $realisation_disable_sections2to8 = get_field('realisation_disable_sections2to8');

    // 2 - Cibles
    $realisation_targets = get_field('realisation_targets');

    // 3 - Partis-pris
    $realisation_bias_title = get_field('realisation_bias_title');
    $realisation_bias_content = get_field('realisation_bias_content');
    $realisation_bias_image = get_field('realisation_bias_image');
    $realisation_bias_video = get_field('realisation_bias_video');

    // 4 - Citation client
    $realisation_citation_title = get_field('citation_author_title');
    $realisation_citation_quote = get_field('citation_quote');
    $realisation_citation_author = get_field('citation_author');

    // 5 - Image
    $realisation_image = get_field('realisation_image');
    $realisation_video = get_field('realisation_video');

    // 6 - Citation agence
    $realisation_quote = get_field('realisation_quote');

    // 7 - Intervention #1
    $realisation_intervention1_title = get_field('realisation_intervention1_title');
    $realisation_intervention1_content = get_field('realisation_intervention1_content');
    $realisation_intervention1_image = get_field('realisation_intervention1_image');
    $realisation_intervention1_video = get_field('realisation_intervention1_video');

    // 8 - Interventions #2-3
    $realisation_interventions = get_field('realisation_interventions');

    // 9 - Galerie d’images
    $realisation_gallery_choice = get_field('realisation_gallery_choice');
    $realisation_gallery_images = get_field('realisation_gallery_images');
    $realisation_gallery_imagesimple = get_field('realisation_gallery_simpleimage');
    $realisation_gallery_video = get_field('realisation_gallery_video');

    // 10 - Conclusion
    $realisation_results = get_field('realisation_results');

?>

<?php //------------MAIN CONTENT-----------------------?>
<main itemscope itemtype="<?php echo "http://schema.org/".$schema_itemtype; ?>">
    <header class="container">
        <a class="backLink" href="<?php echo get_home_url() ?>/projets/"><?php _e('Tous les projets', '@@themeName');?></a>

        <?php //------------PRESENTATION-----------------------?>
        <section class="presentation">
            <h1 class="presentation__title" itemprop="name"><?php the_title(); ?></h1>
            <div class="flex-row">
                <ul class="presentation__infos">
                    <li>
                        <div class="presentation__infos__name">
                            <?php _e('Réalisation', '@@themeName');?>
                        </div>
                        <div class="presentation__infos__value" itemprop="copyrightYear">
                            <?php echo $realisation_year; ?>
                        </div>
                    </li>
                    <li>
                        <div class="presentation__infos__name">
                            <?php _e('Client', '@@themeName');?>
                        </div>
                        <div class="presentation__infos__value" itemprop="sponsor">
                            <?php echo $realisation_client; ?>
                        </div>
                    </li>
                    <li>
                        <div class="presentation__infos__name">
                            <?php _e('Secteur', '@@themeName');?>
                        </div>
                        <div class="presentation__infos__value" itemprop="about">
                            <?php echo $realisation_segment; ?>
                        </div>
                    </li>
                </ul>
                
                <?php
                if (count($realisation_jobs) > 0) :
                    echo '<div class="presentation__jobs" itemprop="keywords">';
                        $count = 0;
                        foreach ($realisation_jobs as $item) {
                            if($count%2 == 0)
                                echo '<div class="presentation__jobs__line">';
                            echo '<div class="presentation__jobs__job" rel="tag">'.$item['realisation_job'].'</div>';
                            if($count%2 != 0)
                             echo '</div>';
                            $count++;
                        }
                    echo '</div>';
                endif;
                ?>
            </div>
            <?php if ($realisation_link_url != '') : ?>
                <a class="custom-button" itemprop="url" href="<?php echo $realisation_link_url; ?>"><?php echo $realisation_link_text; ?></a>
            <?php endif;?>

            <div class="presentation__line"></div>
            <div class="row">
                <div class="presentation__introduction col-md-8 col-md-offset-2" itemprop="description">
                    <?php echo $realisation_introduction; ?>
                </div>
            </div>
        </section>
        <?php //------------END PRESENTATION-------------------?>
    </header>

    <article>
        <?php // disable sections 2 to 8 ?>
        <?php if(!$realisation_disable_sections2to8) : ?>

            <?php //------------Cibles-----------------------?>
            <?php if($realisation_targets) : ?>
            <section class="targets">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3">
                        <ul>
                            <li>
                                <h2 class="targets__title"><?php _e('Cibles de l\'application', '@@themeName');?></h2>
                            </li>
                        <?php
                            foreach ($realisation_targets as $item) {
                                echo '<li itemprop="audience">'.$item['realisation_target'].'</li>';
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </section>
            <?php endif;?>
            <?php //------------END Cibles-------------------?>
        

            <?php //------------Partis-pris-----------------------?>
            <?php if($realisation_bias_image) : ?>
            <section class="bias container">
                <div class="bias__image col-xs-12 col-md-7">
                    <?php
                        $small_url = $realisation_bias_image['sizes']['content_full_mobile'];
                        $medium_url = $realisation_bias_image['sizes']['content_full_tablet'];
                        $large_url = $realisation_bias_image['sizes']['content_full_desktop'];
                        $retina_url = $realisation_bias_image['sizes']['content_full_desktop_retina'];
                        
                        if($realisation_bias_video){
                    ?>
                        <video width="100%"
                            preload="auto"
                            loop
                            muted
                            autoplay
                            src="<?php echo $realisation_bias_video; ?>"
                            poster="<?php echo $large_url; ?>">
                        </video>
                    <?php
                        }
                        else{
                    ?>
                        <picture>
                            <source 
                                srcset="<?php echo $retina_url ?>"
                                media="(min-width: 992px)">
                            <source 
                                srcset="<?php echo $large_url ?>"
                                media="(min-width: 768px) and (max-width: 991px)">
                            <source 
                                srcset="<?php echo $medium_url ?>"
                                media="(min-width: 481px) and (max-width: 767px)">
                            <source 
                                srcset="<?php echo $small_url?>"
                                media="(max-width: 480px)">
                            <img class="" src="<?php echo $large_url ?>"
                                alt="<?php echo $realisation_bias_image['alt'] ?>"
                                title="<?php echo $realisation_bias_image['title'] ?>"/>
                        </picture>
                    <?php
                        }
                    ?>
                    
                </div>
                <div class="bias__text col-xs-12 col-md-5">
                    <div class="bias__text__centerer">
                        <h2 class="bias__text__title"><?php echo $realisation_bias_title;?></h2>
                        <?php echo $realisation_bias_content; ?>
                    </div>
                </div>
            </section>
            <?php endif;?>
            <?php //------------END Parti-pris-------------------?>
        

            <?php //-------------Citation client-----------------------?>
            <?php if($realisation_citation_title && $realisation_citation_quote && $realisation_citation_author) : ?>
            <section class="citation" >
                <div class="container">
                    <div class="citation__quote-image col-xs-3">
                        <img src="<?php echo get_stylesheet_directory_uri().'/images/quote1.svg'; ?>" alt="quotes">
                    </div>
                    <div class="citation__content col-xs-9">
                        <div class="citation__text"><?php echo($realisation_citation_quote); ?></div>
                        <div class="citation__author"><?php echo($realisation_citation_author); ?></div>
                        <div class="citation__title"><?php echo($realisation_citation_title); ?></div>
                    </div>
                </div>
            </section>
            <?php endif;?>
            <?php //------------END Citation client-------------------?>


            <?php //-------------Image-----------------------?>
            <?php if($realisation_image) : ?>
            <section class="image">
                <div class="image__centerer">
                    <?php
                        $small_url = $realisation_image['sizes']['content_full_mobile_fullscreen'];
                        $medium_url = $realisation_image['sizes']['content_full_tablet'];
                        $large_url = $realisation_image['sizes']['content_full_desktop'];
                        $retina_url = $realisation_image['sizes']['content_full_desktop_retina'];
                        
                        if($realisation_video){
                    ?>
                        <video width="100%"
                            preload="auto"
                            loop
                            muted
                            autoplay
                            src="<?php echo $realisation_video; ?>"
                            poster="<?php echo $large_url; ?>">
                        </video>
                    <?php
                        }
                        else{
                    ?>
                    <img itemprop="image"
                        src="<?php echo $medium_url ?>"
                        srcset="<?php echo $small_url ?> 480w, <?php echo $medium_url ?> 768w, <?php echo $large_url ?> 992w, <?php echo $retina_url ?> 1200w"
                        title="<?php echo $realisation_image['title'] ?>"
                        alt="<?php echo $realisation_image['alt'] ?>">
                    <?php
                        }
                    ?>
                </div>
            </section>
            <?php endif;?>
            <?php //------------END Image-------------------?>


            <?php //-------------Citation agence-----------------------?>
            <?php if($realisation_quote) : ?>
            <section class="quote" >
                <div class="container">
                    <div class="quote__image col-xs-3">
                        <img src="<?php echo get_stylesheet_directory_uri().'/images/quote2.svg'; ?>" alt="quotes">
                    </div>
                    <div class="quote__text col-xs-9">
                        <div ><?php echo($realisation_quote); ?></div>
                    </div>
                </div>
            </section>
            <?php endif;?>
            <?php //------------END Citation-------------------?>


            <?php //------------Intervention #1-----------------------?>
            <?php if($realisation_intervention1_content) : ?>
            <section class="intervention1 container">
                <div class="intervention1__text col-xs-12 col-md-5">
                    <h2 class="intervention1__text__title"><?php echo $realisation_intervention1_title;?></h2>
                    <?php echo $realisation_intervention1_content; ?>
                </div>
                <div class="intervention1__image col-xs-12 col-md-7">
                    <?php
                        $small_url = $realisation_intervention1_image['sizes']['content_full_mobile'];
                        $medium_url = $realisation_intervention1_image['sizes']['content_full_tablet'];
                        $large_url = $realisation_intervention1_image['sizes']['content_full_desktop'];
                        $retina_url = $realisation_intervention1_image['sizes']['content_full_desktop_retina'];

                        if($realisation_intervention1_video){
                    ?>
                        <video width="100%"
                            preload="auto"
                            loop
                            muted
                            autoplay
                            src="<?php echo $realisation_intervention1_video; ?>"
                            poster="<?php echo $large_url; ?>">
                        </video>
                    <?php
                        }
                        else{
                    ?>
                        <picture>
                            <source 
                                srcset="<?php echo $retina_url ?>"
                                media="(min-width: 992px)">
                            <source 
                                srcset="<?php echo $large_url ?>"
                                media="(min-width: 768px) and (max-width: 991px)">
                            <source 
                                srcset="<?php echo $medium_url ?>"
                                media="(min-width: 481px) and (max-width: 767px)">
                            <source 
                                srcset="<?php echo $small_url?>"
                                media="(max-width: 480px)">
                            <img class="" src="<?php echo $large_url ?>"
                                alt="<?php echo $realisation_intervention1_image['alt'] ?>"
                                title="<?php echo $realisation_intervention1_image['title'] ?>"/>
                        </picture>
                    <?php
                        }
                    ?>
                </div>
            </section>
            <?php endif;?>
            <?php //------------END Intervention #1-------------------?>


            <?php //------------Interventions #2-3-----------------------?>
            <?php if($realisation_interventions &&  count($realisation_interventions) > 0) : ?>
            <section class="interventions">
                <div class="container">
                <?php
                    foreach ($realisation_interventions as $item) : ?>
                    <div class="interventions__text">
                        <h2 class="interventions__text__title"><?php echo $item['realisation_interventions_title'];?></h2>
                        <?php echo $item['realisation_interventions_content']; ?>
                    </div>
                    <?php //return;?>
                    <?php endforeach;?>
                </div>
            </section>
            <?php endif;?>
            <?php //------------END Interventions #2-3-------------------?>
        <?php endif;?>


        <?php //------------GALERY-----------------------?>
        <?php 
        if($realisation_gallery_choice == 'gallery'):
            if($realisation_gallery_images &&  count($realisation_gallery_images) > 0) :
        ?>
            <div class="gallery__images">
                <div class="<?php if(count($realisation_gallery_images) > 1) echo 'owl-carousel'; ?>">
                <?php
                    foreach ($realisation_gallery_images as $item) :
                            $small_url = $item['realisation_gallery_image']['sizes']['content_full_mobile_fullscreen'];
                            $medium_url = $item['realisation_gallery_image']['sizes']['content_full_tablet'];
                            $large_url = $item['realisation_gallery_image']['sizes']['content_full_desktop'];
                            $retina_url = $item['realisation_gallery_image']['sizes']['content_full_desktop_retina'];
    //                        var_dump('1',$small_url, '2',$medium_url, '3',$large_url, '4',$retina_url);
                        ?>
                        <picture>
                            <source 
                                srcset="<?php echo $retina_url ?>"
                                media="(min-width: 992px)">
                            <source 
                                srcset="<?php echo $large_url ?>"
                                media="(min-width: 768px) and (max-width: 991px)">
                            <source 
                                srcset="<?php echo $medium_url ?>"
                                media="(min-width: 481px) and (max-width: 767px)">
                            <source 
                                srcset="<?php echo $small_url?>"
                                media="(max-width: 480px)">
                            <img class="" src="<?php echo $medium_url ?>"
                                 alt="<?php echo $item['realisation_gallery_image']['alt'] ?>"
                                 title="<?php echo $item['realisation_gallery_image']['title'] ?>"/>

                        </picture>
                    <?php endforeach;
                ?>
                </div>
            </div>
        <?php
            endif;
        else:
        ?>
            <div class="gallery__images">
                <?php
                    $small_url = $realisation_gallery_imagesimple['sizes']['content_full_mobile_fullscreen'];
                    $medium_url = $realisation_gallery_imagesimple['sizes']['content_full_tablet'];
                    $large_url = $realisation_gallery_imagesimple['sizes']['content_full_desktop'];
                    $retina_url = $realisation_gallery_imagesimple['sizes']['content_full_desktop_retina'];

                    if($realisation_gallery_video):
                ?>
                    <div class="visual__video">
                        <video width="100%"
                            preload="auto"
                            loop
                            muted
                            autoplay
                            src="<?php echo $realisation_gallery_video; ?>"
                            poster="<?php echo $large_url; ?>">
                        </video>
                    </div>
                <?php
                    else:
                ?>
                    <picture>
                        <source 
                            srcset="<?php echo $retina_url ?>"
                            media="(min-width: 992px)">
                        <source 
                            srcset="<?php echo $large_url ?>"
                            media="(min-width: 768px) and (max-width: 991px)">
                        <source 
                            srcset="<?php echo $medium_url ?>"
                            media="(min-width: 481px) and (max-width: 767px)">
                        <source 
                            srcset="<?php echo $small_url?>"
                            media="(max-width: 480px)">
                        <img class="" src="<?php echo $medium_url ?>"
                            alt="<?php echo $realisation_gallery_imagesimple['alt'] ?>"
                            title="<?php echo $realisation_gallery_imagesimple['title'] ?>"/>
                    </picture>
                <?php
                    endif;
                ?>
            </div>
        <?php
        endif;
        ?>
        <?php //------------END GALERY-------------------?>


        <?php //------------CONCLUSION-----------------------?>
        <?php if($realisation_results) : ?>
        <section class="results" >
            <div class="container">
                <div class="col-md-6 col-md-offset-3">
                    <ul>
                        <li>
                            <h2><?php _e('Les résultats', '@@themeName');?></h2>
                        </li>
                    <?php
                        foreach ($realisation_results as $item) {
                            echo '<li>'.$item['realisation_result'].'</li>';
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <div class="contact">
                <a class="custom-button" href="<?php echo get_home_url() ?>/contact/"><?php _e('Ce projet vous intéresse ? discutons-en', '@@themeName');?></a>
            <div>
        </section>
        <?php endif;?>
        <?php //------------END CONCLUSION-------------------?>
    </article>
</main>
<?php //------------END MAIN CONTENT-------------------?>

<?php get_footer(); ?>
