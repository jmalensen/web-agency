<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: 404 template
*			   @@themeDescription
*/

get_header(); ?>

<main itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <header class="intro">
        <div class="container">
            <h1 class="intro__title"><?php _e('Oups l’agence ne travaille pas ici !', '@@themeName'); ?></h1>
        </div>
    </header>
    
    <?php //------------------404-----------------------?>
    <div class="container e404">

        <p class="result404__text__title">
            <?php _e('Désolé pour cette erreur', '@@themeName'); ?>.
        </p>
        <p class="result404__text__slogan">
            <?php _e('Nous vous invitons à retourner sur la page d\'accueil de notre site pour découvrir toutes nos expertises et tous nos projets', '@@themeName'); ?>.
        </p>
        <p class="result404__btn">
            <a href="<?php echo home_url() ?>"><?php _e('Retour à l\'accueil', '@@themeName'); ?></a>
        </p>
    </div>
    <?php //------------------END 404-----------------------?>

</main>

<?php get_footer(); ?>
