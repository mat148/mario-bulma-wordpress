<?php
if( have_rows('selected_albums') ):?>
    <section class="s-music is-relative">
        <div class="container">
            <?php if( have_rows('selected_albums') ): ?>
                <script>
                    var albums = [];
                    var album = [];
                    var tracks = [];
                    var track = [];
                </script>

                <div class="music_player" id="musicPlayer">
                    <audio src="" preload="auto" />
                </div>
                <?php while ( have_rows('selected_albums') ) : the_row(); ?>
                <ul class="music_albums">
                <?php $post_object = get_sub_field('selected_album');

                if( $post_object ): ?>
                    <li class="music_album">
                        <?php $post = $post_object;
                        setup_postdata( $post );
                        
                        $albumCover = get_field('album_cover', $post->ID);
                        $albumCoverUrl = $albumCover['url'];
                        $albumTitle = get_field('album_title', $post->ID);
                        $albumTracks = get_field('album_tracks', $post->ID);
                        $albumDate = $post->post_date;
                        $albumYear = date('Y', strtotime($albumDate));
                        $trackCount = 1; ?>

                        <div class="music_album-art">
                            <img class="music_album-cover" src="<?php echo $albumCoverUrl ?>"/>
                            <div class="music_album-details">
                                <div class="music_album-date"><?php echo $albumYear ?></div>
                                <div class="music_album-title"><?php echo $albumTitle ?></div>
                            </div>
                        </div>

                        <?php if($albumTracks):?>
                            <ul class="music_album-tracks">
                                <?php foreach($albumTracks as $item): ?>
                                    <li class="music_album-track">
                                        <?php
                                        $trackAudio = $item['track_audio']['url'];
                                        $trackTitle = $item['track_title']; ?>

                                        <a class="music_album-link" data-src="<?php echo $trackAudio ?>">
                                            <span class="music_album-track-number"><?php echo $trackCount ?></span>
                                            <span class="music_album-track-title"><?php echo $trackTitle ?></span>
                                        </a>
                                        <?php $trackCount++; ?>

                                        <script>
                                            track = [
                                                <?php echo "'" . $trackAudio ."'" ?>,
                                                <?php echo "'" . $trackTitle ."'" ?>
                                            ]
                                            tracks.push(track);
                                        </script>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <script>
                            album = [
                                <?php echo "'" . $albumCoverUrl . "'" ?>,
                                <?php echo "'" . $albumTitle . "'" ?>
                            ]
                            album.push(tracks);
                            albums.push(album);

                            var musicPlayer = document.getElementById('musicPlayer');
                            console.log(musicPlayer);

                            getTopTrack();

                            function getTopTrack() {
                                var topTrackUrl = albums[0][2][0][0];
                                //document.getElementById('musicPlayer').src = topTrackUrl;
                                //console.log($('#musicPlayer'));
                                $('#musicPlayer audio').attr('src', topTrackUrl);
                            }
                        </script>

                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    </li>
                <?php endif;
                endwhile;?>
                </ul>
            <?php endif;?>
        </div>
    </section>
<?php endif; ?>