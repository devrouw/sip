<?php
$title = 'Kelurahan';
$judul = $title;
$url = 'kelurahan';
$setTemplate = true;

if (isset($_POST['simpan'])) {
    $file=upload('geojson_kelurahan','geojson');
    if($file!=false){
        $data['geojson_kelurahan']=$file;
    }
    if ($_POST['id_kelurahan'] == "") {
        $data['kd_kelurahan'] = $_POST['kd_kelurahan'];
        $data['nm_kelurahan'] = $_POST['nm_kelurahan'];
        $db->insert("tb_kelurahan", $data);
?>
        <script type="text/javascript">
            window.alert('Berhasil Disimpan');
            window.location.href = "<?= url('kelurahan') ?>";
        </script>
    <?php
    } else {
        $data['kd_kelurahan'] = $_POST['kd_kelurahan'];
        $data['nm_kelurahan'] = $_POST['nm_kelurahan'];
        $db->where('id_kelurahan', $_POST['id_kelurahan']);
        $db->update("tb_kelurahan", $data);
    ?>
        <script type="text/javascript">
            window.alert('Berhasil Diubah');
            window.location.href = "<?= url('kelurahan') ?>";
        </script>
    <?php }
}

if (isset($_GET['hapus'])) {
    $db->where('id_kelurahan', $_GET['id']);
    $db->delete("tb_kelurahan"); ?>
    <script type="text/javascript">
        window.alert('Berhasil Dihapus');
        window.location.href = "<?= url('kelurahan') ?>";
    </script>
<?php }

if (isset($_GET['tambah']) or isset($_GET['ubah'])) {
    $id_kelurahan = "";
    $kd_kelurahan = "";
    $nm_kelurahan = "";
    $geojson_kelurahan = "";

    if (isset($_GET['ubah']) and isset($_GET['id'])) {
        $db->where('id_kelurahan', $_GET['id']);
        $row = $db->ObjectBuilder()->getOne('tb_kelurahan');
        if ($db->count > 0) {
            $id_kelurahan = $row->id_kelurahan;
            $kd_kelurahan = $row->kd_kelurahan;
            $nm_kelurahan = $row->nm_kelurahan;
            $geojson_kelurahan = $row->geojson_kelurahan;
        }
    }
?>

    <?= content_open('Form Kelurahan') ?>
    <form method="post" enctype="multipart/form-data">
        <?= input_hidden('id_kelurahan', $id_kelurahan) ?>
        <div class="form-group">
            <label>Kode Kelurahan</label>
            <?= input_text('kd_kelurahan', $kd_kelurahan) ?>
        </div>
        <div class="form-group">
            <label>Nama Kelurahan</label>
            <?= input_text('nm_kelurahan', $nm_kelurahan) ?>
        </div>
        <div class="form-group">
            <label>GeoJSON</label>
            <?= input_file('geojson_kelurahan', $geojson_kelurahan) ?>
        </div>
        <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-info"> <i class="fa fa-save"></i>Simpan</button>
            <a href="<?= url($url) ?>" class="btn btn-danger"> <i class="fa fa-reply"></i>Kembali</a>
        </div>
    </form>
    <?= content_close() ?>
<?php } else { ?>

    <?= content_open('Data Kelurahan') ?>
    <a href="<?= url($url . '&tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i>Tambah</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kelurahan</th>
                <th>Nama Kelurahan</th>
                <th>GeoJSON</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $get = $db->ObjectBuilder()->get('tb_kelurahan');
            foreach ($get as $row) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row->kd_kelurahan ?></td>
                    <td><?= $row->nm_kelurahan ?></td>
                    <td><a href="<?=assets('unggah/geojson/'.$row->geojson_kelurahan)?>" target="_BLANK"><?=$row->geojson_kelurahan?></a></td>
                    <td>
                        <a href="<?= url($url . '&ubah&id=' . $row->id_kelurahan) ?>" class="btn btn-info"> <i class="fa fa-edit"></i>Ubah</a>
                        <a href="<?= url($url . '&hapus&id=' . $row->id_kelurahan) ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')"> <i class="fa fa-trash"></i>Hapus</a>
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