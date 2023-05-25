<?php
$bg = get_theme_mod('wedding_contact_bg','');
$bg_color = get_theme_mod('wedding_contact_bg_color','');
$title = get_theme_mod('wedding_contact_title','');
$subtitle = get_theme_mod('cb_contact_subtitle','');
$cf7 = get_theme_mod('wedding_contact_form_shortcode','');
?>
<?php if($cf7 != ''): ?>
<div class="full-section-60" id="contact" <?php echo ($bg != '' || $bg_color != '' ? 'style="background:'.$bg_color.' url('.$bg.');"' : ''); ?>   >
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <?php if($title != ''): ?>
            <h2 class="section-title">
                <?php echo sanitize_text_field($title); ?>
                <span class="wedding-title-divider">
                    <span class="wedding-divider-square"></span>
                </span>
            </h2>
            <?php endif; ?>

          <?php if($subtitle != ''): ?>
             <h3 class="section-subtitle">
               <?php echo sanitize_text_field($subtitle); ?>
              </h3>
             <?php endif; ?>
          
        </div><!-- col-md-12 -->
        
      </div>
      <?php if($cf7 != ''): ?>
      <div class="row">
        <div class="col-md-12">
          <div class="wedding-contact-section-form-container">
           <?php echo do_shortcode($cf7); ?>
          </div>
        </div>
      </div>
      <?php endif;  ?>
  </div>
</div>
<?php endif; ?>
