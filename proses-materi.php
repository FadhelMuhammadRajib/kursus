<?php
// Include file koneksi database
include 'koneksi.php';

// Ambil tipe aksi (tambah, edit, atau hapus)
$aksi = $_GET['aksi'];

// Proses tambah data
if ($aksi == 'tambah') {
    $id_kursus = $_POST['id_kursus'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];

    // Query untuk menambah data kursus ke database
    $queryTambahMateri = "INSERT INTO materi (id_kursus, judul, deskripsi, link) VALUES ('$id_kursus', '$judul', '$deskripsi', '$link')";
    $resultTambahMateri = mysqli_query($conn, $queryTambahMateri);

    // Redirect ke halaman utama setelah menambah data
    if ($aksi) {
        echo "<script>alert('Data Berhasil Disimpan');window.location='index.php'</script>";
    }
    exit();
}
