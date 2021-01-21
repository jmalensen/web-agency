<?php

require_once('includes/useful-functions.php');
require_once('includes/wp-bootstrap-navwalker.php');
require_once('includes/boostrap_gravity_form.php');

add_action('after_setup_theme', 'setup_theme', 16);

function setup_theme() {

	/**
	 * Assets
	 */
	add_action('wp_enqueue_scripts', 'assets');
	function assets() {
		$css = array (
			// '@@themeName_lib_css' => array('url' => get_template_directory_uri() . '/css/lib.css', 'deps' => array()),
			'@@themeName_main_css' => array('url' => get_template_directory_uri() . '/css/main.css', 'deps' => array('@@themeName_lib_css'))
		);

		foreach ($css as $css_name => $css){
			wp_enqueue_style($css_name, $css['url']);
		}

		$js = array (
			'@@themeName_lib' => array('url' => get_template_directory_uri() . '/js/lib.js', 'deps' => array('jquery')),
			'@@themeName_main' => array('url' => get_template_directory_uri() . '/js/main.js', 'deps' => array('@@themeName_lib'))
		);

		wp_enqueue_script('jquery');

		foreach ($js as $js_name => $js){
			wp_enqueue_script($js_name, $js['url'], $js['deps'], false, true);
		}

        //Specific to ajax calls
        wp_enqueue_script( 'ajax', get_template_directory_uri().'/js/ajax.js', array('jquery'), null, true );
        // pass Ajax Url to ajax.js
        wp_localize_script('ajax', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
	}


	/**
	 * Handles JavaScript detection.
	 *
	 * Adds a js class to the root <html> element when JavaScript is detected.
	 *
	 * @since Twenty Sixteen 1.0
	 */
	add_action( 'wp_head', 'javascript_detection', 0 );
	function javascript_detection() {
		echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
	}


	/**
	 * I18n
	 */
	load_theme_textdomain('@@themeName', get_template_directory() . '/lang');


	/**
	 * Menus
	 */
	add_theme_support('menus');
	register_nav_menus(array(
		'main-nav' 	=> __('Menu principal', '@@themeName'),
        'secondary-nav' 	=> __('Sous-menu expertise', '@@themeName'),
		'footer-nav'  => __('Menu footer', '@@themeName'),
	));

//    function wpa_category_nav_class( $classes, $item ){
//        if( 'category' == $item->object ){
//            $classes[] = 'menu-category-' . $item->object_id;
//        }
//        return $classes;
//    }
//    add_filter( 'nav_menu_css_class', 'wpa_category_nav_class', 10, 2 );
//    add_filter('nav_menu_link_attributes', 'my_menu_images');
//    function my_menu_images($val){
//        $postid = url_to_postid( $val['href'] );
//        $val['data-image'] = get_the_post_thumbnail_url($postid);
//        return $val;
//    }
        /**
        * ajout de classes
        */
        add_action( 'nav_menu_css_class', 'menu_item_classes', 10, 3 );
        function menu_item_classes( $classes, $item, $args ) {
//            // Gardons seulement les classes qui nous intéressent
//            $classes = array_intersect( $classes, array(
//                                       'menu-item',
//                                       'current-menu-item',
//                                       'current-menu-parent',
//                                       'current-menu-ancestor',
//                                       'menu-item-has-children',
//                                       'menu-item-type-post_type',
//                                       'menu-item-object-page',
//                                       ) );
            // Ajoutons la classe pour désigner les éléments vides
            if ( "#" == $item->url ) {
                $classes[] = 'empty-item';
            }

            $classes[] = 'post-'.$item->object_id;
            return $classes;
        }


	/**
	 * Thumbnails
	 */
	add_theme_support('post-thumbnails');
	add_image_size('home_header', 0, 700, true);
    add_image_size('home_method', 1920, 800, array( 'center', 'top' ));
	add_image_size('home_activity', 480, 343, true);
	add_image_size('home_activity_mobile', 320, 133, true);
	add_image_size('home_activity_retina', 640, 266, true);
	add_image_size('home_header_mobile', 0, 245, true);
	add_image_size('home_header_retina', 0, 490, true);
	add_image_size('home_team', 1500, 0, true);
	add_image_size('home_team_mobile', 320, 0, true);
	add_image_size('home_team_retina', 640, 0, true);
	add_image_size('full_hd', 1920, 1080, true);
	add_image_size('full_hd_retina', 3840, 2160, true);
	add_image_size('banner', 1920, 540, true);
	add_image_size('banner_retina', 3840, 1080, true);
	add_image_size('banner_tablet', 768, 210, true);
	add_image_size('banner_tablet_retina', 1536, 420, true);
	add_image_size('banner_mobile', 500, 140, true);
	add_image_size('banner_mobile_retina', 1000, 280, true);
	add_image_size('logos_customer_home', 154, 154, true);
	add_image_size('illustration_portfolio', 300, 260, true);

	/* Half retina == Full */
	add_image_size('content_full_desktop', 970, 600, true);
	add_image_size('content_full_desktop_retina', 1940, 600, true);
	add_image_size('content_half_desktop', 485, 300, true);
	add_image_size('content_full_tablet', 750, 0, true);
	add_image_size('content_full_tablet_retina', 1500, 0, true);
	add_image_size('content_half_tablet', 375, 0, true);
	add_image_size('content_full_mobile', 500, 0, array( 'center', 'top' ));
	add_image_size('content_full_mobile_fullscreen', 420, 300, array( 'center', 'top' ));
	add_image_size('content_full_mobile_retina', 1000, 0, true);
	add_image_size('content_half_mobile', 250, 0, true);

    /* Tailles page agence */
    add_image_size('title_back_desktop', 1125, 760, true);
    add_image_size('title_back_mobile', 560, 660, true);
    add_image_size('competences_desktop', 860, 610, true);
    add_image_size('competences_mobile', 600, 600, true);
    add_image_size('adn_desktop', 850, 800, true);
    add_image_size('adn_mobile', 480, 640, true);

    /* Taille réalisation */
    add_image_size('first_realisation', 1220, 800, true);
    add_image_size('fulllarge_realisation', 1920, 800, true);
    add_image_size('second_realisation', 1050, 830, true);

    /* Tailles prestation*/
    add_image_size('content_full_tablet_presta', 0, 500, true);
	add_image_size('content_full_mobile_presta', 320, 300, array( 'center', 'top' ));


	/**
	 * Images
	 */
	add_filter('upload_mimes', 'allow_svg_mime_types');
	function allow_svg_mime_types( $mimes ){

		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}


	/**
	 * Excerpt length
	 */
	add_filter('excerpt_length', 'custom_excerpt_length', 999);
	function custom_excerpt_length($length) {
		return 45;
	}

	/**
	 * Radio button taxonomy : disable default taxonomy
	 */
	//add_filter( 'radio-buttons-for-taxonomies-no-term-actor_category', '__return_FALSE' );
	//add_filter( 'radio-buttons-for-taxonomies-no-term-news_category', '__return_FALSE' );

	/**
	 * Theme setting
	 */
	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> __('Options Concept Image', '@@themeName'),
			'menu_title' 	=> __('Options Concept Image', '@@themeName'),
			'menu_slug' 	=> 'general-options',
		));
	}

	/**
	 * Admin : TinyMCE
	 */
	// Load front css into editor
	//add_editor_style('css/main.css');

	//== Add button format
	add_filter('tiny_mce_before_init', 'mce_add_btn_format');
	function mce_add_btn_format($init_array) {

		$init_array['style_formats'] = json_encode(array(
			array(
				'title' => __('button', '@@themeName'),
				'classes' => 'button',
				'selector' => 'a'
			)
		));
		return $init_array;
	}

    // Move Yoast to bottom
	add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
	function yoasttobottom() {
		return 'low';
	}


    //Dynamic on front-page for video
    add_action( 'wp_ajax_get_img_video', 'get_imgVideo' );
    add_action( 'wp_ajax_nopriv_get_img_video', 'get_imgVideo' );
    function get_imgVideo() {

        $id = htmlentities($_POST['id']);
        if( isset($id) ){
            $videoSrc  = get_field( "lien_video_accueil" , $id);
            $imgSrc    = get_field( "miniature_video_accueil" , $id);

            $data = array(
                'videoSrc' => $videoSrc,
                'imgSrc'   => $imgSrc['url']
            );

            wp_send_json_success( $data );
        }

        die();
    }

    //Infinite scroll portfolio
    add_action( 'wp_ajax_get_works', 'get_works' );
    add_action( 'wp_ajax_nopriv_get_works', 'get_works' );
    function getPostWork($paged, $listDisplayed, $countNbPostCat, $content){
        // Get realisations
        $args = array(
                'post_type' => 'realisation',
                'posts_per_page' => 9,
                'paged'       => $paged,
                'order'       => 'DESC',
                'post_status' => 'publish',
//                'post__not_in' => $listDisplayed,
                'ignore_sticky_posts' => true
        );
        $the_query = new WP_Query( $args );
        $nbPage = $the_query->max_num_pages;
        
        if($the_query->have_posts()):
            while ($the_query->have_posts()) : $the_query->the_post();
                
                //If post not already displayed, we add it to the list
                if(!in_array($post->ID, $listDisplayed)){
                    $thumbnail = get_field('realisation_image_portfolio');
                    $videoLink = get_field('realisation_video_portfolio');
                    $subtitle = get_field('realisation_subtitle_portfolio');

                    $categoryDetail = get_the_category($post->ID);
                    $catList = '';
                    //To put categories for each post
                    foreach($categoryDetail as $cd){
                        $countNbPostCat[$cd->slug] += 1;
                        $catList .= $cd->slug.' ';
                    }

                    $content .= '<div class="portfolio__onework '.$catList.'">
                        <a class="innerLink" href="'.get_the_permalink().'">';

                    //If there is a video link
                    if($videoLink){
                        $content .= '<div class="portfolio__onework__visual-video">
                                        <video width="100%"
                                            preload="auto"
                                            loop
                                            muted
                                            autoplay
                                            src="'.$videoLink.'"
                                            poster="'.$thumbnail['sizes']['illustration_portfolio'].'">
                                        </video>
                                    </div>';
                    }
                    else{
                        $content .= '<figure class="portfolio__onework__visual">
                                    <img src="'.$thumbnail['sizes']['illustration_portfolio'].'" alt="'.$thumbnail['alt'].'" />
                                </figure>';
                    }

                    $content .= '<div class="portfolio__onework__titles">
                                <h3 class="title">'.get_the_title().'</h3>
                                <p class="subtitle">'.$subtitle.'</p>
                            </div>
                        </a>
                    </div>';
                }
            endwhile;
        else:
            $content = '<p>'.__('Pas de réalisations', '@@themeName').'</p>';
        endif;

        /* Restore original Post Data */
        wp_reset_postdata();
        
        return array(
            'paged' => $paged,
            'nbPage' => $nbPage,
            'countNbPostCat' => $countNbPostCat,
            'content' => $content
        );
    }
    function get_works() {
        
        //Get paramaters from POST
        $paged = htmlentities($_POST['paged']);
        $paged++;
        $displayed = htmlentities($_POST['displayed']);
        $listDisplayed = explode(',', $displayed);
        
        //Get current cat selected
        $catName = htmlentities($_POST['catName']);
        $nbpage = htmlentities($_POST['nbpage']);
        
        //Count number of post in each cat
        $countNbPostCat = array();
        
        //Get content for json return
        $content = '';
        
        //First pass to get more post work
        $result = getPostWork($paged, $listDisplayed, $countNbPostCat, $content);
        $paged = $result['paged'];
        $countNbPostCat = $result['countNbPostCat'];
        $content = $result['content'];
        $nbpage = $result['nbPage'];
        
//        $args = array(
//                'post_type' => 'realisation',
//                'posts_per_page' => 9,
//                'paged'       => $paged+1,
//                'order'       => 'DESC',
//                'post__not_in' => $listDisplayed
//        );
//        $the_query = new WP_Query( $args );
//        if(!$the_query->have_posts()):
//            $end = true;
//        endif;
//
//        /* Restore original Post Data */
//        wp_reset_postdata();
        
        //If catName is not all project
        if($catName != 'all'){
            //While there is not at least 9 post for specified cat and paged < nb of pages
            while($countNbPostCat[$catName] < 9 && $paged < $nbpage){
                $paged++;
                $result = getPostWork($paged, $listDisplayed, $countNbPostCat, $content);
                $paged = $result['paged'];
                $countNbPostCat = $result['countNbPostCat'];
                $content = $result['content'];
            }
            $count = $countNbPostCat[$catName];
        }
        else{
            $count = 'all';
        }
        
        $data = array(
            'content' => $content,
            'paged'   => $paged,
            'count'   => $count,
        );

        wp_send_json_success( $data );
        die();
    }

    //To add api key for GoogleMap to show on ACF
    function my_acf_init() {
        acf_update_setting('google_api_key', 'AIzaSyAqFHR-5xhZFSfNlh3YSCP4_FO_5DtRsSc');
    }
    add_action('acf/init', 'my_acf_init');


	// change error message gravity form
	add_filter("gform_validation_message", "change_message", 10, 2);
	function change_message($message, $form) {
		return '<div class="validation_error">Merci de remplir des champs obligatoires ci-dessous.</div>';
	}

    // Remove whitespaces for menus
    add_filter( 'wp_nav_menu_items', 'prefix_remove_menu_item_whitespace' );
    function prefix_remove_menu_item_whitespace( $items ) {
        return preg_replace( '/>(\s|\n|\r)+</', '><', $items );
    }


    // Custom Excerpt function for Advanced Custom Fields
    function custom_field_excerpt($fieldName) {
        global $post;
        $text = get_field($fieldName);

        if ( '' != $text ) {
            $text = strip_shortcodes( $text );
            $text = apply_filters('the_content', $text);
            $text = str_replace(']]&gt;', ']]&gt;', $text);
            $excerpt_length = 60; // 60 words
            $excerpt_more = apply_filters('excerpt_more', ' ... ' . '<a class="seemore" href="#">+ Plus</a>');
            $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
        }

        return apply_filters('the_excerpt', $text);
    }

    add_filter('login_errors', create_function('$no_login_error', "return 'Mauvais identifiants';"));


    /*
    * Function creates post duplicate as a draft and redirects then to the edit post screen
    */
    function rd_duplicate_post_as_draft(){
        global $wpdb;
        if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
            wp_die('No post to duplicate has been supplied!');
        }

        /*
         * Nonce verification
         */
        if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
            return;

        /*
         * get the original post id
         */
        $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
        /*
         * and all the original post data then
         */
        $post = get_post( $post_id );

        /*
         * if you don't want current user to be the new post author,
         * then change next couple of lines to this: $new_post_author = $post->post_author;
         */
        $current_user = wp_get_current_user();
        $new_post_author = $current_user->ID;

        /*
         * if post data exists, create the post duplicate
         */
        if (isset( $post ) && $post != null) {

            /*
             * new post data array
             */
            $args = array(
                'comment_status' => $post->comment_status,
                'ping_status'    => $post->ping_status,
                'post_author'    => $new_post_author,
                'post_content'   => $post->post_content,
                'post_excerpt'   => $post->post_excerpt,
                'post_name'      => $post->post_name,
                'post_parent'    => $post->post_parent,
                'post_password'  => $post->post_password,
                'post_status'    => 'draft',
                'post_title'     => $post->post_title,
                'post_type'      => $post->post_type,
                'to_ping'        => $post->to_ping,
                'menu_order'     => $post->menu_order
            );

            /*
             * insert the post by wp_insert_post() function
             */
            $new_post_id = wp_insert_post( $args );

            /*
             * get all current post terms ad set them to the new post draft
             */
            $taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
            foreach ($taxonomies as $taxonomy) {
                $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
                wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
            }

            /*
             * duplicate all post meta just in two SQL queries
             */
            $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
            if (count($post_meta_infos)!=0) {
                $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
                foreach ($post_meta_infos as $meta_info) {
                    $meta_key = $meta_info->meta_key;
                    if( $meta_key == '_wp_old_slug' ) continue;
                    $meta_value = addslashes($meta_info->meta_value);
                    $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
                }
                $sql_query.= implode(" UNION ALL ", $sql_query_sel);
                $wpdb->query($sql_query);
            }


            /*
             * finally, redirect to the edit post screen for the new draft
             */
            wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
            exit;
        } else {
            wp_die('Post creation failed, could not find original post: ' . $post_id);
        }
    }
    add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );

    /*
     * Add the duplicate link to action list for post_row_actions
     */
    function rd_duplicate_post_link( $actions, $post ) {
        if (current_user_can('edit_posts')) {
            $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
        }
        return $actions;
    }

    add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );
}
