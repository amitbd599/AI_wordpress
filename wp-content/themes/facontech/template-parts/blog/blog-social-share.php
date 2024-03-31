<?php

/**
 * Template part for displaying post meta
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package facontech
 */



?>

<div class="social">
    <ul>
        <li><a
                href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u=' . urlencode(get_permalink())); ?>">
                <i class="fa-brands fa-facebook-f"></i>
            </a></li>
        <li><a href="<?php echo esc_url('https://twitter.com/intent/tweet?url=' . urlencode(get_permalink())); ?>">
                <i class="fa-brands fa-twitter"></i>
            </a></li>
        <li><a
                href="<?php echo esc_url('https://www.linkedin.com/sharing/share-offsite/?url=' . urlencode(get_permalink())); ?>">
                <i class="fa-brands fa-linkedin-in"></i>
            </a></li>
        <li><a
                href="<?php echo esc_url('https://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink())); ?>">
                <i class="fa-brands fa-pinterest"></i>
            </a></li>

    </ul>
</div>