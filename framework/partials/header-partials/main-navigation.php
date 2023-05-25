<?php
/*
 * Main Navigation
 */
?>
<nav class="wedding-main-navigation">
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

