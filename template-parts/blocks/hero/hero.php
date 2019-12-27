<section class="<?php echo esc_attr($className) ?> s-hero hero is-fullheight is-dark is-relative">
    <?php 
    $title = get_field('hero_title');
    $subtitle = get_field('hero_subtitle');
    $link = get_field('hero_link');
    $linkText = get_field('hero_link_text');

    $featImage = get_field('hero_featured_image');

    if($title || $subtitle || $link):?>
        <div class="hero-body">
            <div class="container is-flex">
                <?php if($featImage):?>
                    <div class="hero-image">
                        <img class="is-block" src="<?php echo $featImage['url'] ?>"/>
                    </div>
                <?php endif; ?>
                <?php if($title || $subtitle || $link):?>
                    <div class="hero-content">
                        <?php if($title):?>
                            <h1 class="title is-size-1 is-uppercase"><?php echo $title ?></h1>
                        <?php endif; ?>
                        <?php if($subtitle):?>
                            <h2 class="subtitle is-size-5"><?php echo $subtitle ?></h2>
                        <?php endif; ?>
                        <?php if($link):?>
                            <div class="hero-button-container">
                                <a class="button is-white is-outlined is-medium is-uppercase" href="<?php echo $link ?>"><?php echo $linkText ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
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
            <div class="s-hero__background-image is-overlay is-fullheight hero_background_image_align <?php echo $backgroundImageAttachment ?> " style="background-image: url(<?php echo $url ?>)"></div>
        <?php endif; ?>
        <?php if($backgroundMedia['type'] == 'video'): ?>
            <div class="s-hero__background-video-container">
                <video class="s-hero__background-video is-overlay is-fullheight" autoplay loop muted>
                    <source src="<?php echo $url ?>" type="video/mp4"/>
                </video>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</section>