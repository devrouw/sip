<?php
$title = 'Data Penghuni';
$judul = $title;
$url = 'penghuni';
$setTemplate = true;

if (isset($_POST['simpan'])) {
    if ($_POST['nik'] == "") {
        $data['nama_lengkap'] = $_POST['nama_lengkap'];
        $data['tempat_lahir'] = $_POST['tempat_lahir'];
        $data['tgl_lahir'] = $_POST['tgl_lahir'];
        $data['status_kawin'] = $_POST['status_kawin'];
        $data['kewarganegaraan'] = $_POST['kewarganegaraan'];
        $data['jenis_kelamin'] = $_POST['jenis_kelamin'];
        $data['pekerjaan'] = $_POST['pekerjaan'];
        $data['goldar'] = $_POST['goldar'];
        $data['ket_tambahan'] = $_POST['ket_tambahan'];
        $db->insert("tb_penghuni", $data);
?>
        <script type="text/javascript">
            window.alert('Berhasil Disimpan');
            window.location.href = "<?= url('penghuni') ?>";
        </script>
    <?php
    } else {
        $data['nama_lengkap'] = $_POST['nama_lengkap'];
        $data['tempat_lahir'] = $_POST['tempat_lahir'];
        $data['tgl_lahir'] = $_POST['tgl_lahir'];
        $data['status_kawin'] = $_POST['status_kawin'];
        $data['kewarganegaraan'] = $_POST['kewarganegaraan'];
        $data['jenis_kelamin'] = $_POST['jenis_kelamin'];
        $data['pekerjaan'] = $_POST['pekerjaan'];
        $data['goldar'] = $_POST['goldar'];
        $data['ket_tambahan'] = $_POST['ket_tambahan'];
        $db->where('nik', $_POST['nik']);
        $db->update("tb_penghuni", $data);
    ?>
        <script type="text/javascript">
            window.alert('Berhasil Diubah');
            window.location.href = "<?= url('penghuni') ?>";
        </script>
    <?php }
}

if (isset($_GET['hapus'])) {
    $db->where('nik', $_GET['nik']);
    $db->delete("tb_penghuni"); ?>
    <script type="text/javascript">
        window.alert('Berhasil Dihapus');
        window.location.href = "<?= url('penghuni') ?>";
    </script>
<?php }

if (isset($_GET['tambah']) or isset($_GET['ubah'])) {
    $nama_lengkap = "";
    $tempat_lahir = "";
    $tgl_lahir = "";
    $status_kawin = "";
    $kewarganegaraan = "";
    $jenis_kelamin = "";
    $pekerjaan = "";
    $goldar = "";
    $ket_tambahan = "";

    if (isset($_GET['ubah']) and isset($_GET['nik'])) {
        $db->where('nik', $_GET['nik']);
        $row = $db->ObjectBuilder()->getOne('tb_penghuni');
        if ($db->count > 0) {
            $nik = $row->nik;
            $nama_lengkap =$row->nama_lengkap;
            $tempat_lahir = $row->tempat_lahir;
            $tgl_lahir = $row->tgl_lahir;
            $status_kawin = $row->status_kawin;
            $kewarganegaraan = $row->kewarganegaraan;
            $jenis_kelamin = $row->jenis_kelamin;
            $pekerjaan = $row->pekerjaan;
            $goldar = $row->goldar;
            $ket_tambahan = $row->ket_tambahan;
        }
    }
?>

    <?= content_open('Form Data Penghuni') ?>
    <form method="post" enctype="multipart/form-data">
        <?= input_hidden('nik', $nik) ?>
        <div class="form-group" class="">
            <label>Nama Lengkap</label>
            <div class="row">
            <div class="col-md-6">
            <?= input_text('nama_lengkap', $nama_lengkap) ?>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <div class="row">
            <div class="col-md-6">
            <?= input_text('tempat_lahir', $tempat_lahir) ?>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="row">
            <div class="col-md-6">
            <?= input_text('tgl_lahir', $tgl_lahir) ?>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label>Status Kawin</label>
            <div class="row">
            <div class="col-md-6">
            <?= input_text('status_kawin', $status_kawin) ?>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label>Kewarganegaraan</label>
            <div class="row">
            <div class="col-md-6">
            <?= input_text('kewarganegaraan', $kewarganegaraan) ?>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="row">
            <div class="col-md-6">
            <?= input_text('jenis_kelamin', $jenis_kelamin) ?>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <div class="row">
            <div class="col-md-6">
            <?= input_text('pekerjaan', $pekerjaan) ?>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label>Golongan Darah</label>
            <div class="row">
            <div class="col-md-6">
            <?= input_text('goldar', $goldar) ?>
            </div>
            </div>
        </div>
        <div class="form-group">
            <label>Keterangan Tambahan</label>
            <div class="row">
            <div class="col-md-6">
            <?= input_text('ket_tambahan', $ket_tambahan) ?>
            </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-info"> <i class="fa fa-save"></i>Simpan</button>
            <a href="<?= url($url) ?>" class="btn btn-danger"> <i class="fa fa-reply"></i>Kembali</a>
        </div>
    </form>
    <?= content_close() ?>
<?php } else { ?>

    <?= content_open('Data Penghuni') ?>
    <hr>
    <table class="table table-bordered table-striped" id="example">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>TTL</th>
                <th>Status</th>
                <th>Kewarganegaraan</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
                <th>Goldar</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $get = $db->ObjectBuilder()->get('tb_penghuni');
            foreach ($get as $row) { ?>
                <tr>
                    <td><?= $row->nik ?></td>
                    <td><?= $row->nama_lengkap ?></td>
                    <td><?= $row->tempat_lahir, $row->tgl_lahir ?></td>
                    <td><?= $row->status_kawin ?></td>
                    <td><?= $row->kewarganegaraan ?></td>
                    <td><?= $row->jenis_kelamin ?></td>
                    <td><?= $row->pekerjaan ?></td>
                    <td><?= $row->goldar ?></td>
                    <td><?= $row->ket_tambahan ?></td>
                    <td>
                        <a href="<?= url($url . '&ubah&id=' . $row->id_warga) ?>" class="btn btn-info"> <i class="fa fa-edit"></i></a>
                        <a href="<?= url($url . '&hapus&id=' . $row->id_warga) ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?')"> <i class="fa fa-trash"></i></a>
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