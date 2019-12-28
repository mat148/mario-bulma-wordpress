<?php
    $title = get_field('content_title');
    $titleSize = get_field('content_title_size');
    $subtitle = get_field('content_subtitle');
    $subtitleSize = get_field('content_subtitle_size');
    $contentAlign = get_field('content_align');
    $buttonUrl = get_field('content_button_url');
    $buttonTitle = get_field('content_button_title');

    $media = get_field('content_media');
    $mediaAlign = get_field('content_media_align');
    $video = get_field('content_video');
    $embed = get_field('content_embed');

    $columnWidth = get_field('content_column_width');
    $color = get_field('content_color');
?>

<section class="is-relative s-content-block <?php echo $color ?>">
    <div class="container">
        <div class="columns <?php echo $mediaAlign ?>">
            <?php if($media): ?>
                <div class="s-content-block-media column <?php echo $columnWidth ?>">
                    <img class="s-content-block-image" src="<?php echo $media['url'] ?>"/>
                </div>
            <?php endif; ?>
            <?php if($video): ?>
                <div class="s-content-block-media column <?php echo $columnWidth ?>">
                    <video class="s-content-block-video" controls>
                        <source src="<?php echo $video['url'] ?>" type="video/mp4"/>
                    </video>
                </div>
            <?php endif; ?>
            <?php if($embed): ?>
                <div class="s-content-block-media column <?php echo $columnWidth ?>">
                    <?php echo $embed ?>
                </div>
            <?php endif; ?>
            <?php if($title || $subtitle): ?>
                <div class="s-content-block-content column <?php echo $contentAlign ?>">
                    <?php if($title): ?>
                        <h1 class="<?php echo $titleSize ?> title is-uppercase"><?php echo $title ?></h1>
                    <?php endif; ?>
                    <?php if($subtitle): ?>
                        <p class="<?php echo $subtitleSize ?> subtitle"><?php echo $subtitle ?></p>
                    <?php endif; ?>
                    <?php if($buttonUrl): ?>
                        <div class="s-content-block-button-container">
                            <a class="button is-black is-outlined is-uppercase" href="<?php echo $buttonUrl ?>"><?php echo $buttonTitle ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>