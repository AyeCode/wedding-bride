<?php
/*
 * Header Image partial partial.
 */

if (is_home()): ?>

    <h1 id="single-title"><?php echo get_the_title($id); ?></h1>

<?php elseif(is_tax()) : $term = get_term_by('slug',get_query_var('term'),get_query_var('taxonomy')); ?>
    <h1 id="single-title"><?php echo $term->name; ?></h1>

<?php elseif (is_category()): ?>
    <h1 id="single-title"><?php echo __('Posts in category: ', 'wedding-bride'); ?><?php single_cat_title(); ?></h1>

<?php elseif (is_tag()): ?>
    <h1 id="single-title"><?php echo __('Posts tagged with: ', 'wedding-bride'); ?><?php single_tag_title(); ?></h1>

<?php elseif (is_search()): ?>
    <h1 id="single-title"><?php echo __('Search results for:  ', 'wedding-bride'). get_query_var('s'); ?></h1>

<?php elseif (is_archive()): ?>

    <?php if (is_year()):
        $archive = __('Archive for: ', 'wedding-bride') . get_the_time('Y');
    elseif (is_month()):
        $archive = __('Archive for ', 'wedding-bride') . get_the_time('F, Y');
    elseif (is_day()):
        $archive = __('Archive for ', 'wedding-bride') . get_the_time('F jS, Y');
    endif; ?>

    <h1 id="single-title"><?php echo $archive; ?></h1>
<?php else: ?>
    <h1 id="single-title"><?php the_title(); ?></h1>
<?php endif; ?>