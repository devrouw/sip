<?php
$title = 'Beranda';
$judul = $title;
?>
<?= content_open('Halaman Beranda') ?>
Selamat Datang di Beranda
<ul class="list-group"></ul>
<?php
$get = $db->ObjectBuilder()->get('tb_wilayah');
foreach ($get as $row) { ?>
    <li class="list-group-item"><?= $row->id_wilayah ?> - <?= $row->nama_wilayah ?></li>
<?php }
?>
<?= content_close() ?>