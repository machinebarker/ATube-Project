<?php
function randomString($length)
{
    $str = "";
    $characters = 'abcdefghijkmlnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $max = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}
?>
<div class="container mt-nav">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="<?= base_url('uploader/upload'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="video_url" value="<?= randomString(8); ?>">
                            <label for="title">Video Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                            <small class="text-danger"><?= form_error('title'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail URL</label>
                            <input type="text" class="form-control" id="thumbnail" name="thumbnail">
                            <small class="text-danger"><?= form_error('thumbnail'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="hashtags">Hashtags</label>
                            <input type="text" class="form-control" id="hashtags" name="hashtags">
                            <small class="text-danger"><?= form_error('hashtags'); ?></small>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="video" required>
                                <label class="custom-file-label" for="customFile">Choose video</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Upload <i class="fas fa-upload"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>