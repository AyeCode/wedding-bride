<?php
$title = get_theme_mod('wedding_about_title', '');

$person_1_obj = get_theme_mod('wedding_page_person_1');
$person_2_obj = get_theme_mod('wedding_page_person_2');
?>

<?php if($title != ''): ?>
<div class="full-section-60" id="about">
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <?php if ($title != ''): ?>
                    <h2 class="section-title">
                        <?php echo sanitize_text_field($title); ?>

                        <span class="wedding-title-divider">
                            <span class="wedding-divider-square"></span>
                        </span>
                    </h2>
                <?php endif; ?>
            </div>


        </div> <!--.row -->

        <div class="row">

            <!-- Person on the left -->
            <?php if(absint($person_1_obj) != ''): ?>
            <div class="col-md-6">
              <?php
              $person_1 = get_post($person_1_obj);
              ?>
                <div class="wedding-person">


                  <?php
                  $thumb_id = get_post_thumbnail_id( $person_1_obj );
		              $thumb_src = wp_get_attachment_image_src( $thumb_id, 'full');
                  ?>

                    <img src="<?php echo esc_url($thumb_src[0]); ?>" class="img-circle center-block img-responsive" alt="<?php  echo __('Persons Image','wedding-bride'); ?>" />




                    <h4 class="wedding-person-name">
                        <?php echo $person_1->post_title ?>
                    </h4>


                        <p><?php echo $person_1->post_content; ?></p>


                    </div> <!-- .wedding-person -->

            </div>
            <?php endif; ?>

            <!-- Person on the right -->

            <?php if(absint($person_2_obj) != ''): ?>
            <div class="col-md-6">
              <?php
              $person_2 = get_post($person_2_obj);
              ?>
                <div class="wedding-person">


                  <?php
                  $thumb_id = get_post_thumbnail_id( $person_2_obj );
                  $thumb_src = wp_get_attachment_image_src( $thumb_id, 'full');
                  ?>

                    <img src="<?php echo esc_url($thumb_src[0]); ?>" class="img-circle center-block img-responsive" alt="<?php  echo __('Persons Image','wedding-bride'); ?>" />




                    <h4 class="wedding-person-name">
                        <?php echo $person_2->post_title ?>
                    </h4>


                        <p><?php echo $person_2->post_content; ?></p>


                    </div> <!-- .wedding-person -->

            </div>
            <?php endif; ?>
        </div> <!-- .row -->

    </div>
    <!-- .container -->
</div>
<!-- .full-section-60-->
<?php endif; ?>
