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
<div class="home mt-nav">
    <nav class="navbar navbar-light search mb-2">
        <form class="form-inline mx-auto" action="<?= base_url('atube'); ?>" method="post">
            <input class="form-control form-search" type="text" placeholder="Search" name="keyword">
            <input class="btn btn-dark btn-search my-2 my-sm-0" type="submit" value="&#128270;" name="search"></input>
        </form>
    </nav>
    <!-- Video -->
    <div class="container thumbnail">
        <div class="row">
            <?php foreach ($videos as $v) : ?>
                <div class="col-md-4 mb-3">
                    <a href="<?= base_url(); ?>atube/watch/<?= $v['video_url']; ?>" style="text-decoration: none;">
                        <img src="<?= $v['thumbnail']; ?>" class="img-thumbnail" style="width: 330px; height: 200px">
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
    <!--  -->
</div>