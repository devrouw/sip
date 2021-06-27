<?php
$title = 'Kecamatan';
$judul = $title;
$url = 'kecamatan';

if (isset($_GET['tambah']) or isset($_GET['ubah'])) {
    $id_kecamatan = "";
    $kd_kecamatan = "";
    $nm_kecamatan = "";

    if (isset($_GET['ubah']) and isset($_GET['id'])) {
        $db->where('id_kecamatan',$_GET['id']);
		$get=$db->ObjectBuilder()->getOne('tb_kecamatan');
        if($db->count>0){
            $id_kecamatan=$row->id_kecamatan;
            $kd_kecamatan=$row->kd_kecamatan;
            $nm_kecamatan=$row->nm_kecamatan;
        }
    }
?>

    <?= content_open('Form Kecamatan') ?>
    <form method="post">
        <?= input_hidden('id_kecamatan', $id_kecamatan) ?>
        <div class="form-group">
            <label>Kode Kecamatan</label>
            <?= input_text('kd_kecamatan', $kd_kecamatan) ?>
        </div>
        <div class="form-group">
            <label>Nama Kecamatan</label>
            <?= input_text('nm_kecamatan', $nm_kecamatan) ?>
        </div>
        <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-info"> <i class="fa fa-save"></i>Simpan</button>
            <a href="<?= url($url) ?>" class="btn btn-danger"> <i class="fa fa-reply"></i>Kembali</a>
        </div>
    </form>
    <?= content_close() ?>
<?php } else { ?>

    <?= content_open('Data Kecamatan') ?>
    <a href="<?= url($url . '&tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kecamatan</th>
                <th>Nama Kecamatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $get = $db->ObjectBuilder()->get('tb_kecamatan');
            foreach ($get as $row) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row->kd_kecamatan ?></td>
                    <td><?= $row->nm_kecamatan ?></td>
                    <td>
                        <a href="<?= url($url . '&ubah&id=' . $row->id_kecamatan) ?>" class="btn btn-info"> <i class="fa fa-edit"></i>Ubah</a>
                        <a href="<?= url($url . '&hapus&id=' . $row->id_kecamatan) ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')"> <i class="fa fa-trash"></i>Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    <?= content_close() ?>
<?php } ?>