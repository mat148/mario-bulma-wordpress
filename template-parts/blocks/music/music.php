<?php
if( have_rows('selected_albums') ):?>
    <section class="s-music is-relative">
        <div class="container">
            <?php if( have_rows('selected_albums') ):
                while ( have_rows('selected_albums') ) : the_row();
                    
                $post_object = get_sub_field('selected_album');

                if( $post_object ): 
                
                    // override $post
                    $post = $post_object;
                    setup_postdata( $post ); 
                    
                    $albumCover = get_field('album_cover', $post->ID);?>

                    <img src="<?php echo $albumCover['url'] ?>"/>
                    
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif;

                endwhile;
            endif;?>
        </div>
    </section>
<?php endif; ?>