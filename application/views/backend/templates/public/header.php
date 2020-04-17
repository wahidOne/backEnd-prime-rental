<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?= $title; ?> | Administrator Primerental.id </title>
    <!-- inject -->
    <link rel="stylesheet" href="<?= base_url('assets/backend/'); ?>vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url('assets/backend/'); ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/global-plugins/'); ?>fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/backend/'); ?>fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="<?= base_url('assets/backend/'); ?>vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url('assets/backend/'); ?>css/demo_2/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/backend/') ?>css/main.css">
</head>

<body>

    <div class="main-wrapper">
        <div id="PreLoaderBar" class="preloader position-fixed border bg-dark-costum ">
            <div class="spinner-grow spin text-primary" role="status">
            </div>
            <br>
            <span class=" display-5 font-weight-bold text-white-50 "> Loading...</span>
        </div>