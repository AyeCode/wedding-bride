<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Loader -->
<div id="site-loader"></div>
<!-- Load Header area partials -->
<?php get_template_part('framework/partials/header-partials/mobile-navigation'); ?>

<!-- Load Header Image
- You can turn the header image on from the customizer settings.
- If the slider is enabled then the header is not visible.
- Header image should be of 1920x820px
-->
<?php if (wedding_get_header_image() != false && is_front_page()): ?>
    <section id="wedding-header-image">
        <?php echo wedding_get_header_image(); ?>

        <?php
        $header_above_text = get_theme_mod('wedding_header_above_title', '');
        $header_title = get_theme_mod('wedding_header_title', '');
        $header_below_text = get_theme_mod('wedding_header_below_title', '');
        $header_btn_text = get_theme_mod('wedding_header_btn_text', '');
        $header_btn_url = get_theme_mod('wedding_header_btn_url', '');

        ?>
        <div class="wedding-header-content">
            <?php if ($header_above_text != ''): ?>

                <div class="wedding-header-above-text">
                    <?php echo sanitize_text_field($header_above_text); ?>
                </div>

                <div class="header-divider-container">
                    <span class="wedding-title-divider">
                        <span class="wedding-divider-square"></span>
                    </span>
                </div>

            <?php endif; ?>

            <?php if ($header_title != ""): ?>
                <div class="wedding-header-title">
                    <?php echo sanitize_text_field($header_title); ?>
                </div>

                <div class="header-divider-container">
                    <span class="wedding-title-divider">
                        <span class="wedding-divider-square"></span>
                    </span>
                </div>
            <?php endif; ?>

            <?php if($header_below_text != ''):  ?>
                <div class="wedding-below-header">
                    <?php echo sanitize_text_field($header_below_text); ?>
                </div>
            <?php  endif; ?>


            <?php if ($header_btn_text != '' && $header_btn_url != ''): ?>

                <a class="wedding-btn" href="<?php echo esc_url($header_btn_url); ?>">
                    <?php echo sanitize_text_field($header_btn_text); ?>
                </a>

            <?php endif; ?>


        </div>

    </section>

<?php endif; ?>

<section id="wedding-header" class="wedding-header full-section-30<?php echo wedding_sticky_menu(); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 clearfix">
                <!-- Main Navigation -->
                <?php get_template_part('framework/partials/header-partials/main-navigation'); ?>

            </div>
        </div>
    </div>
</section>