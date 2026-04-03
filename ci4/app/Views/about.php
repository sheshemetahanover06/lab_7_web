<?= $this->extend('template/layout'); ?>

<?= $this->section('content'); ?>

<h2><?= $title; ?></h2>
<p><?= $content; ?></p>

<?= $this->endSection(); ?>