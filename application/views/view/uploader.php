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
<div class="container mt-uploader mb-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="navbar-brand">ATube <span style="font-size: 30px;">Uploader</span></h1>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?= base_url(); ?>assets/profile/<?= $user['image']; ?>" class="img-thumbnail rounded-circle mb-5" style="width: 100px;">
                        </div>
                        <div class="col-md-8" style="margin-left: -60px;">
                            <h4><strong><?= $user['username']; ?></strong></h4>
                            <h6 class="text-secondary">Joined on <?= $user['date_created']; ?></h6>
                            <a href="<?= base_url('uploader/upload'); ?>" class="btn btn-outline-dark mr-2">Upload <i class="fas fa-upload"></i></a>
                            <a href="<?= base_url('uploader/upload_music'); ?>" class="btn btn-outline-info mr-2">Upload <i class="fas fa-music"></i></a>
                            <a href="<?= base_url('uploader/manage_video'); ?>" class="btn btn-outline-success mr-2">Manage Video <i class="fas fa-folder-open"></i></a>
                            <a href="<?= base_url('uploader/manage_music'); ?>" class="btn btn-outline-primary"><i class="fas fa-folder-open"></i> Manage Music</a>
                        </div>
                    </div>
                    <hr style="margin-top: -30px;">
                    <h3>My Videos</h3>
                    <div class="row">
                        <?php foreach ($videos as $v) : ?>
                            <div class="col-md-4 thumbnail mb-3">
                                <a href="<?= base_url(); ?>atube/watch/<?= $v['video_url']; ?>" style="text-decoration: none;">
                                    <img src="<?= $v['thumbnail']; ?>" class="img-thumbnail" style="width: 330px; height: 200px;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?= base_url(); ?>assets/profile/<?= $v['uploader_image']; ?>" style="width: 60px; height:60px; border:none;" class="img-thumbnail rounded-circle">
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-dark" style="margin-left: -50px; margin-top:10px;"><?= chop_string($v['title'], 40); ?></h6>
                                            <h6 class="text-secondary" style="margin-left: -50px; margin-top:10px;"><strong><?= $v['uploader_name']; ?></strong></h6>
                                            <small class="text-secondary" style="margin-left: -50px; margin-top:10px;"><?= $v['views']; ?> views • <?= $v['upload_date']; ?></small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>