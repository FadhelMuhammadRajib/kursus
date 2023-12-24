<?php
include 'koneksi.php';

if (isset($_GET['id_kursus'])) {
    $id_kursus = $_GET['id_kursus'];

    $queryHapusKursus = "DELETE FROM data_kursus WHERE id_kursus = $id_kursus";
    $resultHapusKursus = $conn->query($queryHapusKursus);

    header("Location: kursus.php");
    exit();
} else {
    echo "ID kursus tidak valid.";
}
