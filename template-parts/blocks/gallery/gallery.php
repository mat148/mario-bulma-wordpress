<section class="s-gallery is-relative">
    <div class="container">
        <div class="columns">
            <?php
            if( have_rows('gallery_repeater') ):
                while ( have_rows('gallery_repeater') ) : the_row();
                    if($gallery_item_image):
                        $galleryItemImage = get_sub_field('gallery_item_image'); ?>
                        <div class="column">
                            <img class="s-gallery-image" src="<?php echo $galleryItemImage['url'] ?>" />
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>