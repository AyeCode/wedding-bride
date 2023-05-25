<?php if (wedding_active_footer() != false): ?>
    <section id="wedding-footer-area" class="full-section-60">
        <?php 
        $wedding_footer_info = wedding_active_footer();
        $wedding_footer_class = $wedding_footer_info['class'];
        $wedding_sidebars_count = $wedding_footer_info['sidebars_count'];
        ?>

        <div class="container">
            <div class="row">

                <div id="wedding-footer-sidebars">

                    <div class="col-lg-12">
                        <?php get_template_part('framework/partials/footer-partials/bottom-nav'); ?>
                    </div>

                    <?php for($i=1; $i<$wedding_sidebars_count+1; $i++): ?>

                        <div class="<?php echo $wedding_footer_class; ?> wedding-footer-sidebar">
                            <?php if (!dynamic_sidebar('cb-footer-'.$i)): ?>
                                <div class="pre-widget">

                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
      </div>
    </section>
<?php endif; ?>