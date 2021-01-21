<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Front page template
*			   @@themeDescription
*/

get_header(); ?>

<?php //------------MAIN CONTENT-----------------------?>
<main itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <div>
        <?php //------------------EXPERTISES SECTION------------------?>
        <section id="expertise" class="expertise skew_make skew_make1 clearfix">
            <div class="skew_revert skew_revert1">
                <div class="container wrapper">
                    <div class="headerExpert">
                    <?php
                        //Only the signature part
                        $firstline  = get_field( "signature_line_1_home" );
                        $secondline = get_field( "signature_line_2_home" );
                        $thirdline  = get_field( "signature_line_3_home" );
                        $job        = get_field( "job_home" );

                        echo '<h1>
                            <span class="headerExpert__signature">'.$firstline.'<span class="punct">.</span></span>
                            <span class="headerExpert__signature">'.$secondline.'<span class="punct">.</span></span>
                            <span class="headerExpert__signature">'.$thirdline.'<span class="punct">.</span></span>
                        </h1>';
                        echo '<p class="headerExpert__job">'.$job.'</p>';
                    ?>
                    </div>

                    <div id="contain-menuexpert">
                        <ul id="submenu-expertise" class="menu">
                            <?php
                            //Expertise menu
                            $args = array (
                                'theme_location' => 'secondary-nav',
                                'container' 	 => false,
                                'items_wrap'     => '%3$s'
                            );
                            wp_nav_menu( $args ); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php //------------------END EXPERTISES SECTION--------------?>

        <div class="video-part">
			<div class="mask-video">
			</div>

			<div class="video-background">
                <?php
                    //Thumbnail and video
                    $thumbnail = get_field( "miniature_video_accueil" );

                    $thumbnailMobile = get_field( "background_mobile_home" );
                    $small_url = $thumbnailMobile['sizes']['content_full_mobile'];
                    $medium_url = $thumbnailMobile['sizes']['content_full_tablet'];
                    $large_url = $thumbnailMobile['sizes']['content_full_desktop'];
                    $retina_url = $thumbnailMobile['sizes']['content_full_desktop_retina'];
                ?>
                <video class="video-background__visual-first desktop" width="100%"
                       preload="auto"
                       loop
                       muted
                       autoplay
                       src="<?php echo get_field( "lien_video_accueil" ); ?>"
                       poster="<?php echo $thumbnail['url'];?>">
                </video>
                <video class="video-background__visual-second desktop" width="100%"
                       loop
                       muted
                       autoplay
                       poster="">
                </video>
                <img class="video-background__visual small-mobile" src="<?php echo $thumbnailMobile['url'];?>" alt="<?php echo $thumbnailMobile['alt'];?>" />
                
                <?php
                /*<img class="video-background__visual small-mobile" itemprop="image"
                        src="<?php echo $medium_url ?>"
                        srcset="<?php echo $small_url ?> 480w, <?php echo $medium_url ?> 768w, <?php echo $large_url ?> 992w, <?php echo $retina_url ?> 1200w"
                        title="<?php echo $thumbnailMobile['title'] ?>"
                        alt="<?php echo $thumbnailMobile['alt'] ?>">
                 */
                /*<!-- autoplay="false" "https://player.vimeo.com/external/225269591.hd.mp4?s=c82baa5d222ba5b4c1edf930e729dcb430e37c2e&profile_id=174"></video> -->
				<!-- <iframe src="https://player.vimeo.com/video/226379658?autoplay=0&loop=0&automute=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
                */?>

                <?php
                    $postsH = get_posts('category='.get_cat_id('homevideo'));
                    foreach ($postsH as $post) :
                        static $count = 0;
                        if ($count == "1"){ break; }
                        else {
                ?>
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                <?php   $count++; } endforeach;
                wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                ?>
			</div>
		</div>
    </div>

    <?php //------------------METHOD SECTION----------------------
    $background = get_field("background_method_home");
    ?>
    <section id="method" class="method skew_make skew_make2 clearfix" style="background-image:url('<?php echo $background['sizes']['home_method']; ?>');">
        <div class="skew_revert skew_revert2">
            <div class="container wrapper">
                <?php
                    //Only the method part
                    $firstlineMethod  = get_field( "method_line_1_home" );
                    $secondlineMethod = get_field( "method_line_2_home" );
                    $linkTextMethod   = get_field( "textlink_method_home" );
                    $linkTargetMethod = get_field( "targetlink_method_home" );

                    echo '<p class="method__line1">'.$firstlineMethod.'</p>';
                    echo '<h2 class="method__title titleSection">'.$secondlineMethod.'<span class="punct">.</span></h2>';
                    echo '<a class="method__link" href="'.$linkTargetMethod.'">'.$linkTextMethod.'</a>';
                ?>
                <h2 class="rotated-text desktop" id="work1"><?php _e('Réalisations', '@@themeName');?><span class="punct">.</span></h2>
            </div>
        </div>
    </section>
    <?php //------------------END METHOD SECTION------------------?>

    <?php //------------------WORKS SECTION-----------------------?>
    <section id="works" class="works skew_make skew_make3 clearfix">
        <div class="skew_revert skew_revert3">
            <div class="container wrapper">
                <h2 class="rotated-text desktop" id="work2"><?php _e('Réalisations', '@@themeName');?><span class="punct">.</span></h2>
                <h2 class="titleSection small-mobile"><?php _e('Réalisations', '@@themeName');?><span class="punct">.</span></h2>
                <!-- FIRST LOOP: works -->
                <ul>
                    <?php
                        //---------LOOP WORKS---------------------/
                        if( have_rows('repeater_works_home') ):
                            $i=0;
                            while( have_rows('repeater_works_home') ) : the_row();
                                $titleProject    = get_sub_field( 'project_title_home' );
                                $typeProject     = get_sub_field( 'project_type_home' );
                                $imageProject    = get_sub_field( 'visual_image_project_home' );
                                $videoProject    = get_sub_field( 'visual_video_project_home' );
                                $class = ($i%2==0) ? ' ciFadeInRight oddW' : ' ciFadeInLeft evenW';
                                $linkToProject       = get_sub_field( 'link_to_project_home' );
                                $linkTextProject     = get_sub_field( 'linktext_to_project_home' );

                                echo '<li class="work animate'.$class.'">
                                    <div class="work__contain-title">
                                        <h3 class="work__contain-title__title">'.$titleProject.'</h3>
                                        <p class="work__contain-title__subtitle">'.$typeProject.'</p>
                                    </div>';

                                    //If there is a video, video is used
                                    if($videoProject){
                                        echo '<div class="work__visual-video">
                                                <video width="100%"
                                                    preload="auto"
                                                    muted
                                                    autoplay
                                                    src="'.$videoProject.'"
                                                    poster="'.$imageProject['url'].'">
                                                 </video>
                                             </div>';
                                        //echo '<iframe src="https://player.vimeo.com/video/233985399" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
                                    }
                                    else{
                                        echo '<img class="work__visual" src="'.$imageProject['url'].'" alt="'.$imageProject['alt'].'"/>';
                                    }


                                    if( have_rows('keypoints_repeater_project_home') ):
                                        echo '<ul class="">';
                                        while( have_rows('keypoints_repeater_project_home') ) : the_row();
                                            $keyPoint = get_sub_field( 'keypoint_project_home' );
                                            echo '<li>'.$keyPoint.'</li>';
                                        endwhile;
                                        echo '</ul>';
                                    endif;

                                    echo '<p class="work__linkProject"><a href="'.$linkToProject.'">'.$linkTextProject.'</a></p>';
                                echo '</li>';
                                $i++;
                            endwhile;
                        endif;

                        wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                    ?>
                </ul>
            </div>
        </div>
    </section>
    <?php //------------------END WORKS SECTION-------------------?>

    <?php
    /*<div id="anchor">
        <div id="anchor-contain">
            <div id="laptop"></div>
        </div>
    </div>
     */?>

    <?php //------------------ALL PROJECTS SECTION----------------?>
    <section id="allprojects" class="allprojects skew_make skew_make4 clearfix">
        <div class="skew_revert skew_revert4">
            <div class="container wrapper">
                <?php
                    //Only the allprojects part
                    $firstlineAllProjects  = get_field( "ontitle_allprojects_home" );
                    $secondlineAllProjects = get_field( "title_allprojects_home" );
                    $linkTextAllProjects   = get_field( "linktext_allproject_home" );
                    $linkTargetAllProjects = get_field( "targetlink_allproject_home" );

                    echo '<p class="allprojects__line1">'.$firstlineAllProjects.'</p>';
                    echo '<h2 class="allprojects__title titleSection">'.$secondlineAllProjects.'<span class="punct">!</span></h2>';
                    echo '<a class="allprojects__link" href="'.$linkTargetAllProjects.'">'.$linkTextAllProjects.'</a>';
                ?>
            </div>
        </div>
    </section>
    <?php //------------------END ALL PROJECTS SECTION------------?>

    <?php //------------------CLIENT SECTION----------------------?>
    <section id="clients" class="clients skew_make skew_make5 clearfix">
        <div class="skew_revert skew_revert5">
            <div class="container wrapper">
                <h2 class="clients__title"><?php _e('Nos clients', '@@themeName');?><span class="punct">.</span></h2>
                <div class="clients__container">
                    <?php
                        //Only the client part
                        $aboutClient   = get_field( "about_customers_home" );
                        $linkTextClient   = get_field( "linktext_agency_home" );
                        $linkTargetClient = get_field( "targetlink_agency_home" );

                        echo '<article class="clients__container__text">
                            <div class="innerText animate ciFadeInLeft">
                                <img class="quote_image desktop" src="'.get_stylesheet_directory_uri().'/images/quote2.svg" alt="quotes">
                                '.$aboutClient.'
                            </div>
                            <a class="clients__link" href="'.$linkTargetClient.'">'.$linkTextClient.'</a>
                        </article>';
                    ?>
                    <div class="clients__container__logos">
                        <?php
                        $args_w = array(
                            'post_type'         => 'cpt_client_accueil',
                            'posts_per_page'    => 4,
                            'orderby'           => 'rand',
                            'meta_key'          => 'client_type',
                            'meta_value'        => 'white'
                        );
                        $whites = get_posts( $args_w );
                        $args_g = array(
                            'post_type'         => 'cpt_client_accueil',
                            'posts_per_page'    => 4,
                            'orderby'           => 'rand',
                            'meta_key'          => 'client_type',
                            'meta_value'        => 'gray'
                        );
                        $grays = get_posts( $args_g );
                        $clients = array(
                            $grays[0],
                            $whites[0],
                            $grays[1],
                            $whites[1],
                            $whites[2],
                            $grays[2],
                            $whites[3],
                            $grays[3]
                        );
                        foreach( $clients as $client ) :
                        ?>
                        <div class="logoCustomer">
                        <?php $image = get_field('client_logo', $client->ID); ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <h2 class="rotated-text desktop" id="contact1"><?php _e('Contactez-nous', '@@themeName');?><span class="punct">.</span></h2>
            </div>
        </div>
    </section>
    <?php //------------------END CLIENT SECTION------------------?>

    <?php //------------------CONTACT SECTION---------------------?>
    <section id="contact" class="contact skew_make skew_make6 clearfix">
        <div class="skew_revert skew_revert6">
            <div class="container wrapper">
                <h2 class="rotated-text desktop" id="contact2"><?php _e('Contactez-nous', '@@themeName');?><span class="punct">.</span></h2>
                <h2 class="titleSection small-mobile"><?php _e('Contactez-nous', '@@themeName');?><span class="punct">.</span></h2>

                <div id="contact__form" class="contact__form desktop col-sm-offset-2 col-sm-10 col-md-offset-6 col-md-6">
                    <?php
                        //Only the contact part
                        $contactText = get_field( "contact_text_home" );
                        echo $contactText;
                    ?>
                </div>

                <div class="contact__link small-mobile">
                    <div class="contact__link__mail">
                        <a href="<?php echo get_home_url(); ?>/contact/"><?php _e('Contactez-nous', '@@themeName');?></a>
                    </div>
                    <div class="contact__link__tel">
                        <a href="tel:+33299380923"><?php _e('Téléphonez-nous', '@@themeName');?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php //------------------END CONTACT SECTION-----------------?>
</main>
<?php //------------END MAIN CONTENT-------------------?>

<?php get_footer(); ?>
