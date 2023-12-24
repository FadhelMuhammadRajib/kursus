<?php
include 'koneksi.php';

// Periksa apakah parameter id_kursus ada dalam URL
if (isset($_GET['id_kursus'])) {
    $id_kursus = $_GET['id_kursus'];

    // Query untuk mengambil data kursus dari database berdasarkan ID
    $queryKursus = "SELECT * FROM data_kursus WHERE id_kursus = $id_kursus";
    $resultKursus = $conn->query($queryKursus);

    if ($resultKursus->num_rows > 0) {
        $dataKursus = $resultKursus->fetch_assoc();
    } else {
        echo "Parameter id_kursus tidak ditemukan.";
        exit();
    }


    $queryMateri = "SELECT * FROM materi WHERE id_kursus = $id_kursus";
    $resultMateri = $conn->query($queryMateri);

    // Periksa apakah query materi berhasil dijalankan
    if (!$resultMateri) {
        die("Query error: " . mysqli_errno($conn) . ' - ' . mysqli_error($conn));
    }
} else {
    echo "Data Berhasil Simpan";
    exit();
}

include 'templates/header.php';
?>

<div class="container-fluid">
    <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Materi Kursus: <?php echo $dataKursus['judul']; ?></h1>
            </div>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <a href="tambah-materi.php" class="btn btn-sm btn-outline-success">Tambah Data</a>
                </div>
            </div>
            <div class="btn-toolbar mb-2 mb-md-2">
                <div class="btn-group mr-2 mt-2">
                    <a href="kursus.php" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>
            </div>

            <?php if ($resultMateri->num_rows > 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Link Embed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($rowMateri = $resultMateri->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $rowMateri['judul']; ?></td>
                                <td><?php echo $rowMateri['deskripsi']; ?></td>
                                <td><?php echo $rowMateri['link']; ?></td>
                                <td>
                                    <a href='edit-materi.php?id_materi=<?php echo $rowMateri['id_materi']; ?>' class='btn btn-sm btn-outline-secondary'>Edit</a>
                                    <button class='btn btn-sm btn-outline-danger mt-2' onclick='konfirmasiHapusMateri(<?php echo $rowMateri['id_materi']; ?>)'>Hapus</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>Belum ada materi untuk kursus ini.</p>
            <?php } ?>

            <script>
                function konfirmasiHapusMateri(idMateri) {
                    var konfirmasi = confirm("Apakah Anda yakin ingin menghapus materi ini?");
                    if (konfirmasi) {
                        window.location.href = 'hapus-materi.php?id_materi=' + idMateri;
                    }
                }
            </script>
        </main>
    </div>
</div>

<?php
// Include file footer
include 'templates/footer.php';

// Tutup koneksi database
mysqli_close($conn);
?>