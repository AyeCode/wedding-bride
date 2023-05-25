<?php 
$image = get_theme_mod('wedding_parallax_image','');
$title =  get_theme_mod('wedding_parallax_title','');
$text =  get_theme_mod('wedding_parallax_text','');
$btn_text = get_theme_mod('wedding_parallax_btn_text','');
$btn_url = get_theme_mod('wedding_parallax_btn_url','');

if($image != ''): ?>
<div class="full-section-60" id="our-story" data-stellar-background-ratio="0.4" style="background:url('<?php echo esc_url($image);?>')">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if($title != ''): ?>
            <h2 class="section-title">
              <?php echo sanitize_text_field($title); ?>

              <span class="wedding-title-divider">
                <span class="wedding-divider-square"></span>
              </span>
            </h2>
          <?php endif; ?>
          
          <?php if($text != ''): ?>
          <p class="parallax-text">
            <?php echo sanitize_text_field($text); ?> 
          </p>
          <?php endif; ?>
          
          <?php if($btn_text != '' && $btn_url !=''): ?>
          
          <a class="wedding-btn" href="<?php echo esc_url($btn_url); ?>">
            <?php echo sanitize_text_field($btn_text); ?>
          </a>
          
          <?php endif; ?>
          
        </div>
      </div>
    </div>
</div><!-- #parallax ends here -->
<?php endif; ?>