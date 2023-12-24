<?php
include 'koneksi.php';

if (isset($_GET['id_materi'])) {
    $id_materi = $_GET['id_materi'];

    $queryHapusKursus = "DELETE FROM materi WHERE id_materi = $id_materi";
    $resultHapusKursus = $conn->query($queryHapusKursus);

    header("Location: kursus.php");
    exit();
} else {
    echo "ID kursus tidak valid.";
}
