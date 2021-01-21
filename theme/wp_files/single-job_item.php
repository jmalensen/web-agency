<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Single template
*			   @@themeDescription
*/
acf_form_head();

get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php //------------MAIN CONTENT----------------------- ?>
<main class="page-type" itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">
    <article class="container">
        <h1 class="title-page"><?php the_title(); ?></h1>
        <div class=content-wp>
            <?php the_field('texte_de_loffre'); ?>
            <p>
              <a href="<?php echo home_url(); ?>/recrutement">Voir nos autres offres.</a>
            </p>
            <div class="panel-body">
  					<?php
            // Prepare apply form : Captcha
            $rand_1 = rand(1, 5);
            $rand_2 = rand(1, 5);
            $captcha = '	<input type="hidden" name="captcha_result" value="' . ($rand_1 + $rand_2) . '">
                      <div class="acf-field">
                        <div class="acf-label">
                          <label>Question de sécurité <span class="acf-required">*</span></label>
                        </div>
                        <div class="acf-input">
                          <input type="text" name="captcha">
                          <p class="help-block">Veuillez additionner ' . $rand_1 . ' et ' . $rand_2 . '.</p>
                        </div>
                      </div>';
  					// Patch : do not leave the choice of Job ID
  					$html_after_fields = '<input type="hidden" name="acf[field_5a464e1c10ebd]" value="' . get_the_ID() . '">';

  					// Add captcha
  					$html_after_fields .= $captcha;
            $spontaneous = get_field('candidature_spontanee');
            if( is_array($spontaneous) ) {
              $s = $spontaneous[0];
            } else {
              $s = '';
            }
            if( $s == 'spontaneous' ) {
              $return = home_url() . '/candidature-spontanee';
            } else {
              $return = home_url() . '/candidature';
            }
  					acf_form(array(
  						'post_id'  => 'new_post',
  						'new_post' => array(
  							'post_type'		=> 'application_job_item',
  							'post_status' 	=> 'publish'
  						),
  						//'fields' => array('lastname', 'firstname', 'email', 'curriculum_vitae', 'letter', 'comment'),
  						'fields' => array('field_5a464eb510ec0', 'field_5a464eca10ec1', 'field_5a464ee210ec2', 'field_5a464f0210ec3', 'field_5a464f2110ec4', 'field_5a464f3f10ec5'),
  						'html_after_fields' => $html_after_fields,
  						'form_attributes' => array('role' => 'form'),
  						'submit_value'	=> 'Envoyer ma candidature',
  						'return' => $return
  					));
  					?>
  					<br>
  					<div class="help-block">* Champs obligatoires</div>
  				</div>
        </div>
	</article>
</main>
<?php //------------END MAIN CONTENT------------------- ?>
<?php endwhile; endif; ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
    
    var preventMultipleSubmit = function(){
        try {
            //to do only where there's an acf_form
            acf.add_filter('validation_complete', function( json, $form ){
                if (json.errors) {
                    // $('.acf-form').data('submitted', false);
                    $('.acf-form input:submit').prop('disabled', false);
                    $('.acf-form input:submit').fadeTo( 'fast', 1);
                }
                return json;
            });
        }
        catch (e) {
            return;
        }
       
        $('.acf-form input:submit').on('click', function(e) {

            e.stopPropagation();
            e.preventDefault();

            // if( $('.acf-form').data('submitted') === true ) return;
            $('.acf-form').submit();

        });

        $('.acf-form').on('submit', function(e) {
            // $('.acf-form').data('submitted', true);
            $('.acf-form input:submit').prop('disabled', true);
            $('.acf-form input:submit').fadeTo( 'fast', .5);
            // console.log('submitted');
        });
    };
    
	// Captcha verification
	$('form.acf-form').submit(function(e) {
		var captcha_result = parseFloat($(this).find('input[name="captcha_result"]').val());
		var captcha = parseFloat($(this).find('input[name="captcha"]').val());

		if(captcha_result != captcha)
		{
			alert('Veuillez correctement renseigner la question de sécurité');
			return false;
		}
		else
			return true;
	});
    
    preventMultipleSubmit();
});
</script>

<?php get_footer(); ?>
