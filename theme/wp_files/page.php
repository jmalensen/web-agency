<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Page template
*			   @@themeDescription
*/

get_header();?>

<?php //------------MAIN CONTENT----------------------- ?>
<main class="page-type" itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">
    <article class="container">
        <h1 class="title-page"><?php the_title(); ?></h1>
        <div class=content-wp>
            <?php the_content(); ?>
        </div>
	</article>
</main>
<?php //------------END MAIN CONTENT------------------- ?>

<?php get_footer(); ?>
