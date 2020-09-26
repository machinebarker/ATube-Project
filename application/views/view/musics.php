<div class="container mt-nav">
    <div class="row mb-3">
        <a href="<?= base_url('atube/music'); ?>" class="text-dark" style="text-decoration: none;">
            <h4><i class="fas fa-arrow-left"></i> Back</h4>
        </a>
    </div>
    <div class="row">
        <div class="col">
            <?php if ($playlist['category'] == 'podcast-deddy-corbuzier') : ?>
                <h2 class="mb-3"><?= $playlist['slug']; ?> Playlist • <?= $countSong; ?> Podcast</h2>
            <?php else : ?>
                <h2 class="mb-3"><?= $playlist['slug']; ?> Playlist • <?= $countSong; ?> Song</h2>
            <?php endif; ?>
            <?php foreach ($songs as $s) : ?>
                <a href="<?= base_url(); ?>atube/play/<?= $s['hashtags']; ?>/<?= $s['music_url']; ?>" class="text-dark" style="text-decoration: none;">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="<?= $s['cover']; ?>" class="img-thumbnail img-musics">
                                </div>
                                <div class="col-md-8" style="margin-left: -85px;">
                                    <h5><?= $s['title']; ?></h5>
                                    <h6 class="text-secondary"><?= $s['album']; ?></h6>
                                    <p class="text-secondary" style="font-size: 12px"><?= $s['upload_date']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>