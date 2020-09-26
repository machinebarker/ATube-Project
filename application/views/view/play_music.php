<div class="container mt-nav">
    <div class="row mb-3">
        <a href="<?= base_url(); ?>atube/musics/<?= $song['hashtags']; ?>" class="text-dark" style="text-decoration: none;">
            <h4><i class="fas fa-arrow-left"></i> Back</h4>
        </a>
    </div>
    <div class="row">
        <div class="col">
            <div class="card play-song">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= $song['cover']; ?>" class="img-thumbnail rounded-circle cover-song" style="border: 0px;">
                        </div>
                        <div class="col-md-8">
                            <h3><strong><?= $song['title']; ?></strong></h3>
                            <h4 class="text-secondary"><?= $song['artist']; ?> • <?= $song['album']; ?></h4>
                            <audio class="rounded play" controls style="margin-top: 26px; width: 400px;">
                                <source src="<?= base_url(); ?>assets/music/<?= $song['music']; ?>" type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <hr>
        </div>
    </div>
    <div class="row">
        <?php foreach ($songs as $s) : ?>
            <div class="col-md-6">
                <a href="<?= base_url(); ?>atube/play/<?= $s['hashtags']; ?>/<?= $s['music_url']; ?>" class="text-dark" style="text-decoration: none;">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?= $s['cover']; ?>" class="img-thumbnail img-musics">
                                </div>
                                <div class="col-md-8" style="margin-left: -85px;">
                                    <h6><?= $s['title']; ?></h6>
                                    <h6 class="text-secondary"><?= $s['artist']; ?> • <?= $s['album']; ?></h6>
                                    <p class="text-secondary" style="font-size: 12px"><?= $s['upload_date']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>