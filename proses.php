<?php
// Include file koneksi database
include 'koneksi.php';

// Ambil tipe aksi (tambah, edit, atau hapus)
$aksi = $_GET['aksi'];

// Proses tambah data
if ($aksi == 'tambah') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $durasi = $_POST['durasi'];

    // Query untuk menambah data kursus ke database
    $queryTambahKursus = "INSERT INTO data_kursus (judul, deskripsi, durasi) VALUES ('$judul', '$deskripsi', '$durasi')";
    $resultTambahKursus = mysqli_query($conn, $queryTambahKursus);

    // Redirect ke halaman utama setelah menambah data
    header("Location: kursus.php");
    exit();
}

//if (isset($_POST["submit"])) {

//    $id_kursus = $_POST["id_kursus"];
//    $judul = $_POST["judul"];
//    $deskripsi = $_POST["deskripsi"];
//    $link = $_POST["link"];

//    $query = "INSERT INTO kursus SET id_kursus='$id_kursus',judul='$judul',deskripsi='$deskripsi',link='$link'";
//  mysqli_query($koneksi, $query);
//
//    header("Location: kursus.php");
//}
