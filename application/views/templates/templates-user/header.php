<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pustaka-Booking | <?= $judul; ?></title>
        <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo/'); ?>logo-pb.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="<?= base_url('assets/'); ?>/css/stylebuku.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="<?= base_url('assets/'); ?>datatable/datatables.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?= base_url(); ?>">Pustaka</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url(); ?>">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if (!empty($this->session->userdata('email'))) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('booking'); ?>">Booking <b><?=$this->ModelBooking->getDataWhere('temp', ['email_user' =>$this->session->userdata('email')])->num_rows(); ?></b> Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('member/myprofil'); ?>">Profil Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('member/logout'); ?>"><i class="fas fw falogin"></i> Log out</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-item nav-link" data-toggle="modal" id="#daftarModal" datatarget="#daftarModal" href="#daftarModal"><i class="fas fw fa-login"></i> Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" data-toggle="modal" id="#loginModal" datatarget="#loginModal" href="#loginModal"><i class="fas fw fa-login"></i> Log in</a>
                    </li>
                    <?php } ?>
                    <span class="nav-item nav-link navright" style="display:block; marginleft:20px;">Selamat Datang <b><?= $user; ?></b></span>
                </ul>
            </div>
        </nav>
        </div>
        <div class="container mt-5">