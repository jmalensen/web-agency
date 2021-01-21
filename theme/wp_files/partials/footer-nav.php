<div class="footer-anchor">
    <div class="simulate-footer"></div>
</div>
<footer class="main">
    <section class="mainfooter skew_make skew_make7 clearfix">
        <div class="skew_revert skew_revert7">
            <div class="container wrapper">
                <ul>
                    <li class="newsletter mainfooter__text">
                        <h4 class="newsletter__title mainfooter__text__title"><?php _e('Newsletter', '@@themeName');?><span class="punct">.</span></h4>
                        <p class="newsletter__text desktop">
                            <?php _e('Restez informé de l\'actualité de l\'agence et recevez des invitations pour nos évènements exclusifs', '@@themeName');?>
                        </p>
<!--                        <form class="newsletter__form">
                            <input type="text" placeholder="<?php _e('Votre e-mail *', '@@themeName');?>" />
                            <p class="newsletter__form__link">
                                <a href="#"><?php _e('S\'inscrire', '@@themeName');?></a>
                            </p>
                        </form>-->
                        
                        <div id="newsletter" class="newsletter__form">
                            <?php the_field( "subscribe_newsletter", "options" );?>
                        </div>
                    </li>
                    <li class="social-network mainfooter__text">
                        <h4 class="social-network__title mainfooter__text__title desktop"><?php _e('Réseaux sociaux', '@@themeName');?><span class="punct">.</span></h4>
                        <?php
                            $facebookLink  = get_field( "facebook_link", "options" );
                            $twitterLink   = get_field( "twitter_link", "options" );
                            $linkedinLink  = get_field( "linkedin_link", "options" );
                            $vimeoLink     = get_field( "vimeo_link", "options" );
                            $instagramLink = get_field( "instagram_link", "options" );
                        ?>
                        <ul>
                            <li><a href="<?php echo $facebookLink;?>" class="facebook">Facebook</a></li>
                            <li><a href="<?php echo $twitterLink;?>" class="twitter">Twitter</a></li>
                            <li><a href="<?php echo $linkedinLink;?>" class="linkedin">LinkedIn</a></li>
                            <li><a href="<?php echo $vimeoLink;?>" class="vimeo">Vimeo</a></li>
                            <li><a href="<?php echo $instagramLink;?>" class="instagram">Instagram</a></li>
                        </ul>
                    </li>
                    <li class="blog mainfooter__text">
                        <h4 class="blog__title mainfooter__text__title desktop"><?php _e('Le blog', '@@themeName');?><span class="punct">.</span></h4>
                        <p class="blog__text desktop">
                            <?php _e('Découvrez sur notre site l\'actualité de la communication numérique et de nombreux conseils pour vous permettre de tirer parti de ces nouveaux outils.', '@@themeName');?>
                        </p>
                        <p class="blog__link">
                            <a href="http://blog.concept-image.fr/"><?php _e('Découvrir le blog', '@@themeName');?></a>
                        </p>
                    </li>
                    <li class="links mainfooter__text">
                        <ul>
                            <?php
                            $args = array (
                                'theme_location' => 'footer-nav',
                                'container' 	 => false,
                                'items_wrap'     => '%3$s'
                            );
                            wp_nav_menu( $args ); ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</footer>