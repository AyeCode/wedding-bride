<div id="mobile-header">
    <a id="responsive-menu-button" href="#wedding-mobile-navigation"><i class="fa fa-bars"></i></a>
    <nav id="wedding-mobile-navigation">
        <?php
        $wedding_menu_args = array(
            'theme_location' => 'main',
            'container' => false,
            'menu_id' => false,
            'menu_class' => 'responsive-menu',
            'echo' => true);
        wp_nav_menu($wedding_menu_args);
        ?>
    </nav>
</div>