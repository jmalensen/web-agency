<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Page contact template
*			   @@themeDescription
* Template Name: Page Contact
*/

get_header();
?>

<?php //------------MAIN CONTENT----------------------- ?>
<main class="page-contact" itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <?php //------------------HEADER INTRODUCTION------------------?>
    <header id="introContact" class="introContact">
        <div class="container wrapper">
            <h1 class="introContact__title"><?php the_title(); ?><span class="punct"> ?</span></h1>

            <div id="contact__form" class="introContact__form">
                <?php the_content(); ?>
            </div>
        </div>
    </header>
    <?php //------------------END HEADER INTRODUCTION--------------?>


    <?php //------------------SECTION INFOS----------------------?>
    <section id="infos" class="infos">
        <div class="container wrapper">
            <div class="containInfos">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3 class="infos__title"><span class="infos__title__icon infos__title__position"></span><?php _e('Nos bureaux', '@@themeName');?></h3>
                    <?php
                        $adress  = get_field( "adress_concept_image", "options" );

                        echo '<p class="infos__paragraph adress">'.$adress.'</p>';
                    ?>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <h3 class="infos__title"><span class="infos__title__icon infos__title__phone"></span><?php _e('Téléphone', '@@themeName');?></h3>
                    <?php
                        $phonenumber  = get_field( "phonenumber_concept_image", "options" );

                        echo '<a href="tel:+33299380923" class="infos__paragraph phone">'.$phonenumber.'</a>';
                    ?>
                </div>
            </div>
            <div class="containSocial">
                <p class="infos__text"><?php _e('Suivez-nous !', '@@themeName');?></p>
                <?php
                    $facebookLink  = get_field( "facebook_link", "options" );
                    $twitterLink   = get_field( "twitter_link", "options" );
                    $linkedinLink  = get_field( "linkedin_link", "options" );
                    $vimeoLink     = get_field( "vimeo_link", "options" );
                    $instagramLink = get_field( "instagram_link", "options" );
                ?>
                <ul class="infos__social">
                    <li><a href="<?php echo $facebookLink;?>" class="facebook">Facebook</a></li>
                    <li><a href="<?php echo $twitterLink;?>" class="twitter">Twitter</a></li>
                    <li><a href="<?php echo $linkedinLink;?>" class="linkedin">LinkedIn</a></li>
                    <li><a href="<?php echo $vimeoLink;?>" class="vimeo">Vimeo</a></li>
                    <li><a href="<?php echo $instagramLink;?>" class="instagram">Instagram</a></li>
                </ul>
            </div>
        </div>
    </section>
    <?php //------------------END SECTION INFOS------------------?>


    <?php //------------------SECTION MAP----------------------  clearfix?>
    <section id="map" class="map">
        <?php
            $googleMap  = get_field( "google_map_contact" );
        ?>
        <script type="text/javascript"> 
            function initialize() {
                var myLatlng = new google.maps.LatLng(<?php echo $googleMap['lat']; ?>, <?php echo $googleMap['lng']; ?>);
                var myCenter = new google.maps.LatLng(48.093243,-1.658585);
                var myOptions = {
                    zoom: 16,
                    center: myCenter,
                    mapTypeControl: false,
                    disableDefaultUI: true,
                    styles: [
                        {
                            "elementType": "labels",
                            "stylers": [
                              {
                                "weight": 0.5
                              }
                            ]
                        },
                        {
                            "elementType": "labels.text",
                            "stylers": [
                              {
                                "color": "#464e5d"
                              }
                            ]
                        },
                        {
                            "featureType": "landscape.man_made",
                            "elementType": "geometry.fill",
                            "stylers": [
                              {
                                "color": "#f6bc18"
                              }
                            ]
                        },
                        {
                            "featureType": "landscape.natural",
                            "elementType": "geometry.fill",
                            "stylers": [
                              {
                                "color": "#f6bc18"
                              }
                            ]
                        },
                        {
                            "featureType": "poi.attraction",
                            "elementType": "geometry.fill",
                            "stylers": [
                              {
                                "color": "#f6bc18"
                              }
                            ]
                        },
                        {
                            "featureType": "poi.business",
                            "elementType": "geometry.fill",
                            "stylers": [
                              {
                                "color": "#f6bc18"
                              }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry.fill",
                            "stylers": [
                              {
                                "color": "#f6bc18"
                              }
                            ]
                        },
                        {
                            "featureType": "poi.sports_complex",
                            "elementType": "geometry.fill",
                            "stylers": [
                              {
                                "color": "#f6bc18"
                              }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry.fill",
                            "stylers": [
                              {
                                "color": "#ffffff"
                              }
                            ]
                        }
                    ],
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("googlemap"), myOptions);
                
                var contentString = '<div id="contentCartouche">'+
                    '<div id="siteNotice">'+
                    '</div>'+
                    '<h1 id="firstHeading" class="firstHeading">Concept Image</h1>'+
                    '<div id="bodyContent">'+
                        '<p>48, rue Paul Langevin<br/> 35200 Rennes</p>'+
                        '<p>Pour nous contacter: <a href="tel:+33299380923">02 99 38 09 23</a></p>'+
                    '</div>'+
                '</div>';
                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    pixelOffset: new google.maps.Size(0,30)
                });

                
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map:      map,
                    animation: google.maps.Animation.DROP,
                    title:    'Concept Image',
                    icon:     '<?php echo get_home_url();?>/wp-content/themes/ci_concept-image-2017/images/markerMap.png'
                });
                marker.addListener('click', toggleBounce);
                
                function toggleBounce() {
                    infowindow.open(map, marker);
                    if (marker.getAnimation() !== null) {
                        marker.setAnimation(null);
                    }
                    else {
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                    }
                }
            }

            function loadScript() {
                var script = document.createElement("script");
                script.type = "text/javascript";
                script.src = "//maps.google.com/maps/api/js?key=AIzaSyAqFHR-5xhZFSfNlh3YSCP4_FO_5DtRsSc&sensor=false&callback=initialize";
                document.body.appendChild(script);
            }

            window.onload = loadScript;
        </script>
        <div id="googlemap">
        </div>
    </section>
    <?php //------------------END SECTION MAP------------------?>

</main>
<?php //------------END MAIN CONTENT------------------- ?>

<?php get_footer(); ?>
