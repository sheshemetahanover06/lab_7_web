<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'Portal Berita'; ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>
<body>

<div id="wrapper">

<header>
    <h1>Portal Berita</h1>
</header>

<nav>
    <a href="<?= base_url('/'); ?>">Home</a>
    <a href="<?= base_url('/artikel'); ?>">Artikel</a>
    <a href="<?= base_url('/about'); ?>">About</a>
    <a href="<?= base_url('/contact'); ?>">Kontak</a>
</nav>

<div id="main">
<div id="content">