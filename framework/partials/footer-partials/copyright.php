<?php
$theme_name = 'Wedding Bride';
?>
<section id="wedding-copyright" class="full-section-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center"><p class="copyright-text"><?php echo wp_sprintf( __( 'Copyright &copy; %1$s %2$s %3$s Theme %4$s - %5$s', 'wedding-bride' ), date( 'Y' ), '<a href="https://wordpress.org/themes/wedding-bride/" target="_blank" rel="nofollow" title="' . esc_attr( $theme_name ) . '">', $theme_name, '</a>', get_bloginfo( 'name' ) ); ?></p>
            </div>
        </div>
    </div>
</section>
