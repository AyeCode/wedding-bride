<?php

$title = get_theme_mod('cb_main_dish_title','');
$subtitle = get_theme_mod('cb_main_dish_subtitle','');
$text_title = get_theme_mod('cb_main_dish_text_title','');
$par_1 = get_theme_mod('cb_main_dish_paragraph_1','');
$par_2 = get_theme_mod('cb_main_dish_paragraph_2','');
$btn_txt = get_theme_mod('cb_main_dish_btn_txt','');
$btn_url = get_theme_mod('cb_main_dish_btn_url','');
$img = get_theme_mod('cb_main_dish_image','');

?>
<?php if($title = ''): ?>
<div class="full-section-60" id="main-dish">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php if ($title != ''): ?>
                    <h2 class="features-title">
                        <?php echo sanitize_text_field($title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($subtitle != ''): ?>
                    <h3 class="features-subtitle">
                        <?php echo sanitize_text_field($subtitle); ?>
                    </h3>
                <?php endif; ?>

            </div><!-- col-md-12 -->
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="main-dish-text">

                <?php if($text_title != ''): ?>
                    <h2><?php echo sanitize_text_field($text_title); ?></h2>
                <?php endif; ?>

                 <?php if($par_1 != ''): ?>
                    <p><?php echo wp_kses_post($par_1); ?></p>
                 <?php endif; ?>

                 <?php if($par_2 != ''): ?>
                    <p><?php echo wp_kses_post($par_2); ?></p>
                 <?php endif; ?>

                    <?php if($btn_txt != '' && $btn_url != ''): ?>
                    <a class="wedding-btn" href="<?php echo esc_url($btn_url); ?>">
                        <?php echo sanitize_text_field($btn_txt); ?>
                    </a>
                    <?php endif; ?>

                </div>

            </div>
            <div class="col-lg-6">
                <?php if($img != ''): ?>
                    <img src="<?php echo esc_url($img); ?>" class="img-responsive"/>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>