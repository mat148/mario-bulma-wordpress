<section class="<?php echo esc_attr($className) ?> s-hero hero is-fullheight is-dark is-relative">
    <?php 
    $title = get_field('hero_title');
    $subtitle = get_field('hero_subtitle');

    if($title || $subtitle):?>
        <div class="hero-body">
            <div class="container">
                <?php if($title):?>
                    <h1 class="title is-1 is-uppercase"><?php echo $title ?></h1>
                <?php endif; ?>
                <?php if($subtitle):?>
                    <h2 class="subtitle is-5"><?php echo $subtitle ?></h2>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php 
    $backgroundMedia = get_field('hero_background_media');
    $backgroundImageAttachment = get_field('hero_background_image_align');

    if($backgroundMedia):

        $url = $backgroundMedia['url'];
        $title = $backgroundMedia['title'];
        //$caption = $file['caption'];
        //$icon = $file['icon'];

        if($backgroundMedia['type'] == 'image'): ?>
            <div class="s-hero__background-image is-overlay is-fullheighthero_background_image_align <?php echo $backgroundImageAttachment ?> " style="background-image: url(<?php echo $url ?>)"></div>
        <?php endif; ?>
    <?php endif; ?>

</section>