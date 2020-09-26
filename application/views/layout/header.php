<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

    <!-- FA -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.css">

    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <title><?= $title; ?></title>
</head>

<body class="">
    <!-- As a link -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">ATube</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="<?= base_url(); ?>"><i class="fas fa-home"></i> Home</a>
                    <a class="nav-link" href="<?= base_url('atube/music'); ?>"><i class="fas fa-music"></i> Music</a>
                    <a class="nav-link" href="<?= base_url('atube/category'); ?>">Category</a>
                    <?php if (!$this->session->userdata('username')) : ?>
                        <a class="nav-link" href="<?= base_url('auth/login'); ?>">Login</a>
                    <?php endif; ?>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php if ($this->session->userdata('username')) : ?>
                        <div class="collapse navbar-collapse" id="navbar-list-4">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?= base_url(); ?>assets/profile/<?= $user['image']; ?>" width="40" height="40" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <h6 class="dropdown-item disabled"><?= $user['username']; ?></h6>
                                        <hr>
                                        <a class="dropdown-item" href="<?= base_url('uploader'); ?>">Dashboard</a>
                                        <a class="dropdown-item" href="#">Edit Profile</a>
                                        <a class="dropdown-item logout" href="<?= base_url('auth/logout'); ?>">Log Out</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>