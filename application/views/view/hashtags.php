<!-- Video -->
<div class="container thumbnail mt-uploader">
    <h2 class="mb-3">Hashtags: #<?= $hashtag['hashtags']; ?></h2>
    <div class="row">
        <?php foreach ($hashtags as $h) : ?>
            <div class="col-md-4 mb-3">
                <a href="<?= base_url(); ?>atube/watch/<?= $h['video_url']; ?>" style="text-decoration: none;">
                    <img src="<?= $h['thumbnail']; ?>" class="img-thumbnail" style="width: 330px; height: 200px">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url(); ?>assets/profile/<?= $h['uploader_image']; ?>" style="width: 60px; height:60px; border:none;" class="img-thumbnail rounded-circle">
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-dark" style="margin-left: -50px; margin-top:10px;"><?= $h['title']; ?></h6>
                            <h6 class="text-secondary" style="margin-left: -50px; margin-top:10px;"><strong><?= $h['uploader_name']; ?></strong></h6>
                            <small class="text-secondary" style="margin-left: -50px; margin-top:10px;"><?= $h['views']; ?> views • <?= $h['upload_date']; ?></small>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!--  -->