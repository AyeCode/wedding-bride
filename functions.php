<?php
/*
 * 1. Constants to help us throughout the theme.
 */
DEFINE('WEDDING_CSS_PATH', get_template_directory_uri() . '/assets/css/');
DEFINE('WEDDING_JS_PATH', get_template_directory_uri() . '/assets/js/');
DEFINE('WEDDING_IMAGES_PATH', get_template_directory_uri() . '/assets/images/');
DEFINE('WEDDING_FONTS_PATH', get_template_directory_uri() . '/assets/fonts/');
DEFINE('WEDDING_STYLESHEET_PATH', get_stylesheet_uri());
DEFINE('WEDDING_FRAMEWORK_PATH', get_template_directory_uri() . '/framework/');
DEFINE('WEDDING_FRAMEWORK_REQUIRED_PATH', get_template_directory() . '/framework/');

/*
 * 2. After setup theme
 */
add_action('after_setup_theme', 'wedding_setup');
if (!function_exists('wedding_setup')):
    function wedding_setup()
    {

        if (!isset($content_width))
            $content_width = 750;

        add_theme_support('automatic-feed-links');
        load_theme_textdomain('wedding-bride', get_template_directory() . '/languages');
        add_theme_support('html5', array('gallery', 'caption'));

        global $wp_version;
        if (version_compare($wp_version, '4.1', '>=')):
            add_theme_support('title-tag');
        endif;

        register_nav_menus(array(
            'main' => __('Main Navigation', 'wedding-bride'),
        ));

        $wedding_bg_defaults = array(
            'default-color' => 'ffffff',
            'default-image' => '',
            'wp-head-callback' => 'wedding_bg_callback',
        );
        add_theme_support('custom-background', $wedding_bg_defaults);

        $wedding_header_defaults = array(
            'default-image' => '',
            'random-default' => false,
            'width' => '1920',
            'height' => '820',
            'flex-height' => false,
            'flex-width' => false,
            'default-text-color' => '',
            'header-text' => false,
            'uploads' => true,
            'wp-head-callback' => '',
            'admin-head-callback' => '',
            'admin-preview-callback' => '',
        );

        add_theme_support('custom-header', $wedding_header_defaults);

        add_theme_support('post-thumbnails',array('post','page'));
        add_image_size('wedding-slider-image', 1920, 850, true); // slider image size.
        add_image_size('wedding-smaller-slider-image', 1300, 650, true); // slider image size.
        add_image_size('wedding-boxed-9', 847, 385, true); // slider image size.
        add_image_size('wedding-boxed-12', 1170, 550, true); // Single post type image (boxed 3/4 layout)
        add_image_size('wedding-fullwidth', 1920, 700, true); // Single post type image (fulwidth)
        add_image_size('wedding-blog-section-image',380,380,true);

   }
endif;

/*
 * 3. Fallback Functions
 */
if (!function_exists('wedding_bg_callback')):

    function wedding_bg_callback()
    {
        $background = set_url_scheme(get_background_image());
        $color = get_theme_mod('background_color', get_theme_support('custom-background', 'default-color'));

        if (!$background && !$color)
            return;

        $style = $color ? "background-color: #$color;" : '';

        if ($background) {
            $image = " background-image: url('$background');";

            $repeat = get_theme_mod('background_repeat', get_theme_support('custom-background', 'default-repeat'));
            if (!in_array($repeat, array('no-repeat', 'repeat-x', 'repeat-y', 'repeat')))
                $repeat = 'repeat';
            $repeat = " background-repeat: $repeat;";

            $position = get_theme_mod('background_position_x', get_theme_support('custom-background', 'default-position-x'));
            if (!in_array($position, array('center', 'right', 'left')))
                $position = 'left';
            $position = " background-position: top $position;";

            $attachment = get_theme_mod('background_attachment', get_theme_support('custom-background', 'default-attachment'));
            if (!in_array($attachment, array('fixed', 'scroll')))
                $attachment = 'scroll';
            $attachment = " background-attachment: $attachment;";

            $style .= $image . $repeat . $position . $attachment;
        }
        ?>
        <style type="text/css" id="custom-background-css">
            body.custom-background {
            <?php echo trim( $style ); ?>
            }
        </style>
        <?php
    }
endif;

/*
 * 4. Enqueue styles + scripts.
 */
add_action('wp_enqueue_scripts', 'wedding_styles');
if (!function_exists('wedding_styles')):
    function wedding_styles()
    {

            wp_enqueue_style('crimson-font', WEDDING_FONTS_PATH . 'DancingScript/stylesheet.css', '', '', 'all');
            wp_enqueue_style('montserrat-font', WEDDING_FONTS_PATH . 'Montserrat/stylesheet.css', '', '', 'all');
            wp_enqueue_style('playfair-font', WEDDING_FONTS_PATH . 'Lora/stylesheet.css', '', '', 'all');

           /*
           * Styles that are used in the theme.
           */
            wp_enqueue_style('bootstrap', WEDDING_CSS_PATH . 'bootstrap.min.css', '', '', 'all');
            wp_enqueue_style('bootstrap-theme', WEDDING_CSS_PATH . 'bootstrap-theme.min.css', '', '', 'all');
            wp_enqueue_style('wedding-navigation-menu', WEDDING_CSS_PATH . 'navigation-menu.css', '', '', 'all');
            wp_enqueue_style('wedding-mobile-menu-theme', WEDDING_CSS_PATH . 'jquery.sidr.dark.css', '', '', 'all');
            wp_enqueue_style('wordpress-default-css', WEDDING_CSS_PATH . 'wordpress-default-min.css', '', '', 'all');


            wp_enqueue_style('wedding-main-stylesheets', WEDDING_STYLESHEET_PATH);

            wp_enqueue_style('wedding-css', WEDDING_CSS_PATH . 'wedding.css', '', '', 'all');
            wp_enqueue_style('wedding-responsive-css', WEDDING_CSS_PATH . 'responsive.css', '', '', 'all');
    }
endif;

add_action('wp_enqueue_scripts', 'wedding_scripts');
if (!function_exists('wedding_scripts')):
    function wedding_scripts()
    {
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');

        wp_enqueue_script('bootstrap', WEDDING_JS_PATH . 'bootstrap.min.js', array('jquery'), '', true);
        wp_enqueue_script('sidr', WEDDING_JS_PATH . 'jquery.sidr.min.js', array('jquery'), '', true);
        wp_enqueue_script('sticky', WEDDING_JS_PATH . 'jquery.sticky.js', array('jquery'), '', true);
        wp_enqueue_script('matchHeight', WEDDING_JS_PATH . 'jquery.matchHeight-min.js', array('jquery'), '', true);


        wp_enqueue_script('wedding-main', WEDDING_JS_PATH . 'main-js.js', array('jquery'), '', true);

        wp_enqueue_script( 'html5shiv', WEDDING_JS_PATH.'html5shiv.min.js', array(), '', false );
        add_filter( 'script_loader_tag', function( $tag, $handle ) {
            if ( $handle === 'html5shiv' ) {
                $tag = "<!--[if lt IE 9]>$tag<![endif]-->";
            }
            return $tag;
        }, 10, 2 );
    }
endif;



function wedding_customizer_preview()
{
    wp_enqueue_script('wedding-customizer-js', get_template_directory_uri().'/assets/js/customizer.js', array('jquery', 'customize-preview'), '', true);
}

add_action('customize_preview_init', 'wedding_customizer_preview');
/*
 * 5. Comments
 */
if (!function_exists('wedding_comment')):
    function wedding_comment($comment,
                             $args,
                             $depth)
    {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?><?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
        <div class="row">

            <div class="col-md-2">


                <div class="comment-author vcard">
                    <?php
                    if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>

                </div>

            </div>

            <div class="col-md-10">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'wedding-bride'); ?></em>
                    <br/>
                <?php endif; ?>

                <?php printf(__('<cite class="fn">%s</cite>','wedding-bride'), get_comment_author_link()); ?>

                <div class="comment-meta commentmetadata">
                    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>">
                        <?php
                        printf(__('%1$s at %2$s', 'wedding-bride'), get_comment_date(), get_comment_time()); ?></a><?php edit_comment_link(__('(Edit)', 'wedding-bride'), '  ', '');
                    ?>
                </div>
                <hr class="comment-name-hr">

                <div class="wedding_comment_body">
                    <?php comment_text(); ?>
                </div>
                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>
            </div>
        </div>
        <?php if ('div' != $args['style']) : ?>
        </div>
    <?php endif; ?>
        <?php
    }
endif;
/*
 * 6. Widgets Initialization
 */
/**== Add some sidebars ==**/
add_action('widgets_init', 'wedding_sidebars');
function wedding_sidebars()
{

    /**== Right sidebar ==**/
    register_sidebar(array(
        'name' => __('Sidebar', 'wedding-bride'),
        'id' => 'sidebar',
        'description' => __('This is the main sidebar.It is in every page - post. However you can override this setting from within each post.',
            'wedding-bride'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    /**== Footer Sidebar 1 ==**/
    register_sidebar(array(
        'name' => __('Footer Sidebar 1', 'wedding-bride'),
        'id' => 'wedding-footer-1',
        'description' => __('This is the sidebar in the footer, on the left', 'wedding-bride'),
        'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    /**== Footer Sidebar 2 ==**/
    register_sidebar(array(
        'name' => __('Footer Sidebar 2', 'wedding-bride'),
        'id' => 'wedding-footer-2',
        'description' => __('This is the sidebar in the footer, the second on the left', 'wedding-bride'),
        'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    /**== Footer Sidebar 3 ==**/
    register_sidebar(array(
        'name' => __('Footer Sidebar 3', 'wedding-bride'),
        'id' => 'wedding-footer-3',
        'description' => __('This is the sidebar in the footer, the second on the right', 'wedding-bride'),
        'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
    /**== Footer Sidebar 4 ==**/
    register_sidebar(array(
        'name' => __('Footer Sidebar 4', 'wedding-bride'),
        'id' => 'wedding-footer-4',
        'description' => __('This is the sidebar in the footer, on the right', 'wedding-bride'),
        'before_widget' => '<aside id="%1$s" class="footerwidget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}

/*
 * Misc Functions that apply to this file
 */
if (version_compare($GLOBALS['wp_version'], '4.1', '<')) :
    function wedding_wp_title($title,
                                  $sep)
    {
        if (is_feed()) {
            return $title;
        }
        global $page, $paged;

        $title .= get_bloginfo('name', 'display');

        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title .= " $sep $site_description";
        }
        if (($paged >= 2 || $page >= 2) && !is_404()) {
            $title .= " $sep " . sprintf(__('Page %s', 'wedding-bride'), max($paged, $page));
        }
        return $title;
    }

    add_filter('wp_title', 'wedding_wp_title', 10, 2);
endif;
/*
 * . Required Files
 */
require_once(WEDDING_FRAMEWORK_REQUIRED_PATH . 'base-init.php');
