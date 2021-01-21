<?php
$args = array (
	'theme_location' => 'main-nav',
	'container' 	 => false,
    'items_wrap'     => '%3$s'
);
?>

<nav class="nav-main-menu">
    <ul id="main-menu" class="menu">
        <?php wp_nav_menu( $args ); ?>
    </ul>
</nav>

<div class="logo-mobile small-mobile">
    <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo_ci.svg" alt="Accueil">
    </a>
</div>

<div id="popup-expertise" class="">
    <h2 class="desktop">Expertise</h2>
    <a href="#" class="closeMenu"></a>
    
    <ul id="secondary-menu" class="menu">
        <?php
        $args = array (
            'theme_location' => 'secondary-nav',
            'container' 	 => false,
            'items_wrap'     => '%3$s'
        );
        wp_nav_menu( $args ); ?>
    </ul>
    
    <p class="decoration desktop">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo_ci_menu.svg" alt="logo CI">
    </p>
</div>