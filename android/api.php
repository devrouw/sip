<?php
set_time_limit(0);
date_default_timezone_set("Asia/Makassar");
include_once './conn.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// mysqli_set_charset('utf8');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(json_decode(file_get_contents('php://input'), true)){
        $_POST = json_decode(file_get_contents('php://input'), true);
    };
    $date=date("Ymd-h_i_s");
    $case=$_POST['case'];
    switch($case){

#----------------------------------------------------------------------------------------------------------------------------------------
case "login":
    $type_query = "show";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM tb_warga WHERE username='$username' AND password='$password'";
    $message = 'Data Ada!';
    
    include './res.php';
die();
break;

#----------------------------------------------------------------------------------------------------------------------------------------
case "input_penghuni":
    $type_query = "input";
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $status_kawin = $_POST['status_kawin'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pekerjaan = $_POST['pekerjaan'];
    $goldar = $_POST['goldar'];
    $ket_tambahan = $_POST['ket_tambahan'];
    $id_bangunan_fk = $_POST['id_bangunan_fk'];

    $query = "INSERT INTO tb_penghuni(
        nik,nama_lengkap,tempat_lahir,tgl_lahir,status_kawin,kewarganegaraan,jenis_kelamin,pekerjaan,goldar,ket_tambahan,id_bangunan_fk
    ) VALUES(
        '$nik','$nama_lengkap','$tempat_lahir','$tgl_lahir','$status_kawin','$kewarganegaraan','$jenis_kelamin','$pekerjaan','$goldar','$ket_tambahan','$id_bangunan_fk'
    )";

    $message = 'Data Berhasil diinput!';
    
    include './res.php';
die();
break;

#----------------------------------------------------------------------------------------------------------------------------------------
case "show_penghuni":
    $type_query = "show";
    $id_bangunan = $_POST['id_bangunan'];

    $query = "SELECT * FROM tb_penghuni WHERE id_bangunan_fk='$id_bangunan'";
    $message = 'Data Ada!';
    
    include './res.php';
die();
break;

#----------------------------------------------------------------------------------------------------------------------------------------
case "show_bangunan_by_id":
    $type_query = "show";
    $id_bangunan = $_POST['id_bangunan'];
    
    $query = "SELECT * FROM tb_bangunan WHERE id_bangunan='$id_bangunan'";

    $message = 'Data Ada!';
    
    include './res.php';
die();
break;

#----------------------------------------------------------------------------------------------------------------------------------------
case "show_bangunan":
    $type_query = "show";
    $id_warga = $_POST['id_warga'];

    $query = "SELECT * FROM tb_bangunan WHERE id_warga='$id_warga'";
    $message = 'Data Ada!';
    
    include './res.php';
die();
break;

    }
}