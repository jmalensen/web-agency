<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Page agence template
*			   @@themeDescription
* Template Name: Page agence
*/

get_header();
?>

<?php //------------MAIN CONTENT----------------------- ?>
<main class="page-agence" itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <?php //------------------INTRODUCTION-----------------------?>
    <header class="introduction">
        <article class="container introduction__container">
            <h1>
                <span class="introduction__container__title"><?php the_field("agence_introduction_titre_1"); ?><span class="punct">,</span></span>
                <span class="introduction__container__title"><?php the_field("agence_introduction_titre_2"); ?><span class="punct">.</span></span>
            </h1>
            <div class="introduction__container__description">
                <img class="quote_image desktop" src="<?php echo get_home_url()?>/wp-content/themes/ci_concept-image-2017/images/quote2.svg" alt="Quotes">
                <?php the_field("agence_introduction_description"); ?>
            </div>
        </article>
        
        <?php
            $img = get_field("agence_introduction_background");
            $imgMobile = get_field("agence_introduction_background_mobile");
//            echo '<img class="introduction__background-img" src="' . $img['sizes']['title_back_desktop'] . '" alt="' . $img['alt'] . '" />';
//            echo '<img class="introduction__background-img-mobile" src="' . $imgMobile['sizes']['title_back_mobile'] . '" alt="' . $imgMobile['alt'] . '" />';
//            echo '<img class="introduction__background-img" itemprop="image"
//                        src="'.$img['sizes']['title_back_desktop'].'"
//                        srcset="'.$imgMobile['sizes']['title_back_mobile'].' 480w, '.$img['sizes']['title_back_desktop'].' 768w"
//                        title="'.$imgMobile['title'].'"
//                        alt="'.$imgMobile['alt'].'" />';
        ?>
        <picture>
            <source 
                srcset="<?php echo $img['sizes']['title_back_desktop'] ?>"
                media="(min-width: 480px)">
            <source 
                srcset="<?php echo $imgMobile['sizes']['title_back_mobile']?>"
                media="(max-width: 479px)">
            <img class="introduction__background-img" src="<?php echo $img['sizes']['title_back_desktop'] ?>"
                 alt="<?php echo $imgMobile['alt'] ?>"
                 title="<?php echo $imgMobile['title'] ?>"/>
        </picture>
    </header>
    <?php //------------------END INTRODUCTION-----------------------?>


    <?php
    $img = get_field("agence_competances_background");
    $imgMobile = get_field("agence_competences_background_mobile");
    ?>
    <?php //------------------COMPETENCES-----------------------?>
    <div class="competences">
        <?php /*
        <!-- <div class="background_img" style="background: url('<?php echo $img['url'] ?>') no-repeat;"></div> -->
         * <img src="<?php echo $img['sizes']['competences_desktop'] ?>" alt="<?php echo $img['alt'] ?>" class="competences__background-img"/>
        <img class="competences__background-img-mobile" src="<?php echo $imgMobile['sizes']['competences_mobile'] ?>" alt="<?php echo $imgMobile['alt'] ?>" />';
         */?>
        <picture>
            <source 
                srcset="<?php echo $img['sizes']['competences_desktop'] ?>"
                media="(min-width: 480px)">
            <source 
                srcset="<?php echo $imgMobile['sizes']['competences_mobile']?>"
                media="(max-width: 479px)">
            <img class="competences__background-img" src="<?php echo $img['sizes']['competences_desktop'] ?>"
                 alt="<?php echo $imgMobile['alt'] ?>"
                 title="<?php echo $imgMobile['title'] ?>"/>
        </picture>
        
        <article class="container competences__container">
            <div class="animate ciFadeInRight">
                <h3 class="competences__container__title"><?php the_field("agence_competances_title"); ?></h3>
                <span class="competences__container__subtitle"><?php the_field("agence_competances_sub_title"); ?></span>
                <?php the_field("agence_competances_content"); ?>
            </div>
        </article>
    </div>
    <?php //------------------END COMPETENCES-----------------------?>

    <?php //------------------ADN-----------------------?>
    <div class="adn">
        <div class="no-skew">
            <div class="adn__part-1">
                <div class="adn__part-1__content animate ciFadeInLeft">
                    <h3 class="title"><?php the_field("agence_adn_title"); ?></h3>
                    <span class="subtitle"><?php the_field("agence_adn_sub_title"); ?></span>
                    <?php the_field("agence_adn_content"); ?>
                    <span class="catchphrase"><?php the_field("agence_adn_catchphrase"); ?></span>
                    <a class="btn-contact" href="#">Contactez-nous</a>
                </div>
            </div>
            
            <div class="adn__part-2">
                <?php
                $img = get_field("agence_adn_image");
                $small_url = $img['sizes']['adn_mobile'];
                $large_url = $img['sizes']['adn_desktop'];
                //echo '<img class="adn__part-2__img" src="' . $img['sizes']['adn_desktop'] . '" alt="' . $img['alt'] . '" />';
                ?>
                <picture>
                    <source 
                        srcset="<?php echo $small_url ?>"
                        media="(max-width: 479px)">
                    <source 
                        srcset="<?php echo $large_url?>"
                        media="(min-width: 480px)">
                    <img class="adn__part-2__img" src="<?php echo $large_url ?>"
                         alt="<?php echo $img['alt'] ?>"
                         title="<?php echo $img['title'] ?>"/>
                </picture>
            </div>
        </div>
    </div>
    <?php //------------------END ADN-----------------------?>

</main>
<?php //------------END MAIN CONTENT------------------- ?>

<?php get_footer(); ?>
