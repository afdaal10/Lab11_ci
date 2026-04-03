<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
    <div id="container">
        <header>
            <h1>Portal Berita</h1>
        </header>
        <nav>
            <?php $uri = service('uri'); ?>
            <a href="<?= base_url('/');?>" class="<?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">Home</a>
            <a href="<?= base_url('/artikel');?>" class="<?= ($uri->getSegment(1) == 'artikel' ? 'active' : null) ?>">Artikel</a>
            <a href="<?= base_url('/about');?>" class="<?= ($uri->getSegment(1) == 'about' ? 'active' : null) ?>">About</a>
            <a href="<?= base_url('/contact');?>" class="<?= ($uri->getSegment(1) == 'contact' ? 'active' : null) ?>">Kontak</a>
        </nav>
        <section id="wrapper">
            <section id="main">