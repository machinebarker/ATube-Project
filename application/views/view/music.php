<div class="container mt-nav">
    <div class="row mb-3">
        <a href="<?= base_url(); ?>" class="text-dark" style="text-decoration: none;">
            <h4><i class="fas fa-arrow-left"></i> Back</h4>
        </a>
    </div>
    <div class="row">
        <?php foreach ($category as $c) : ?>
            <div class="col-md-3 mb-3">
                <a href="<?= base_url(); ?>atube/musics/<?= $c['category']; ?>">
                    <img src="<?= $c['cover']; ?>" class="img-thumbnail img-playlist">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>