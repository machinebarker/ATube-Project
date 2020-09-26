    <?php
    function chop_string($str, $len)
    {
        if (strlen($str) < $len)
            return $str;

        $str = substr($str, 0, $len);
        if ($spc_pos = strrpos($str, " "))
            $str = substr($str, 0, $spc_pos);

        return $str . '...';
    }
    ?>
    <!-- View Video -->
    <div class="container mt-nav">
        <div class="row mb-3">
            <a href="<?= base_url('atube'); ?>" class="text-dark" style="text-decoration: none;">
                <h4><i class="fas fa-arrow-left"></i> Back</h4>
            </a>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="embed-responsive embed-responsive-16by9 bg-black mb-3" style="margin-bottom: 1px;">
                    <video class="embed-responsive-item" src="<?= base_url(); ?>assets/video/<?= $video['video']; ?>" poster="<?= $video['thumbnail']; ?>" allowfullscreen controls>
                        <track src="https://mega.nz/file/J2RQiSQI#FCceR5956R-1Iy1bSLsEtyxbhfbUFnxwqEyjWbXD4Ko" kind="subtitles" srclang="en" label="English">
                    </video>
                </div>
                <div class="row">
                    <div class="col">
                        <small><a href="<?= base_url(); ?>atube/hashtags/<?= $video['hashtags']; ?>" style="text-decoration: none;">#<?= $video['hashtags']; ?></a></small>
                        <h4><?= $video['title']; ?></h4>
                        <p class="text-secondary"><?= $video['views']; ?> views • <?= $video['upload_date']; ?></p>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <img src="<?= base_url(); ?>assets/profile/<?= $video['uploader_image']; ?>" class="img-thumbnail rounded-circle" style="width: 70px; height: 70px; border: none;">
                    </div>
                    <div class="col-md-8" style="margin-left: -45px;">
                        <p><strong><?= $video['uploader_name']; ?></strong></p>
                        <p class="text-secondary">200.5M subscribers</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <hr style="margin-top: -1px;">
                    </div>
                </div>
            </div>
            <div class="col-md-4 view-thumbnail">
                <h5>Other related video</h5>
                <hr>
                <div class="row">
                    <?php foreach ($random as $r) : ?>
                        <div class="col-sm-6 mb-2">
                            <a href="<?= base_url(); ?>atube/watch/<?= $r['video_url']; ?>">
                                <img src="<?= $r['thumbnail']; ?>" class="img-thumbnail" style="height: 100px; width: 200px">
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <h6 style="font-size: 14px;"><?= chop_string($r['title'], 40); ?></h6>
                            <h6 class="text-secondary" style="font-size: 10px;"><?= $r['uploader_name']; ?></h6>
                            <h6 class="text-secondary" style="font-size: 10px;"><?= $r['views']; ?> views • <?= $r['upload_date']; ?></h6>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!--  -->