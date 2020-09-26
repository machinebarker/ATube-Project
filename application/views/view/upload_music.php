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
<div class="container mt-nav mb-3">
    <div class="row">
        <h4><a class="text-dark" style="text-decoration: none;" href="<?= base_url('uploader'); ?>"><i class="fas fa-arrow-left"></i> Back</h4></a>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="<?= base_url('uploader/upload_music'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="hidden" name="music_url" value="<?= randomString(8); ?>">
                                    <label for="title">Music Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                    <small class="text-danger"><?= form_error('title'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="cover">Album Cover URL</label>
                                    <input type="text" class="form-control" id="cover" name="cover">
                                    <small class="text-danger"><?= form_error('cover'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="artist">Artist Name</label>
                                    <input type="text" class="form-control" id="artist" name="artist">
                                    <small class="text-danger"><?= form_error('artist'); ?></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="album">Album Name</label>
                                    <input type="text" class="form-control" id="album" name="album">
                                    <small class="text-danger"><?= form_error('album'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="hashtags">Hashtags</label>
                                    <input type="text" class="form-control" id="hashtags" name="hashtags">
                                    <small class="text-danger"><?= form_error('hashtags'); ?></small>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="music" required>
                                        <label class="custom-file-label" for="customFile">Choose music</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Upload <i class="fas fa-upload"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>