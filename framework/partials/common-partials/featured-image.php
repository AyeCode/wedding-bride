<?php
if (has_post_thumbnail()):
$attachment_id = get_post_thumbnail_id(get_the_ID());
$image_src = wp_get_attachment_image_src($attachment_id, 'boxed-9');

echo '<img src="' . $image_src[0] . '" alt="' . __('featured image', 'wedding-bride') . '" width="' . $image_src[1] . '" height="' . $image_src[2] . '" />';
endif; ?>
