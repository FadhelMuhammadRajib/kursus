<?php
include 'koneksi.php';

// Periksa apakah parameter id_kursus ada dalam URL
if (isset($_GET['id_kursus'])) {
    $id_kursus = $_GET['id_kursus'];

    // Query untuk mengambil data kursus dari database berdasarkan ID
    $queryKursus = "SELECT * FROM data_kursus WHERE id_kursus = $id_kursus";
    $resultKursus = $conn->query($queryKursus);

    // Periksa apakah data kursus ditemukan
    if ($resultKursus->num_rows > 0) {
        $dataKursus = $resultKursus->fetch_assoc();
    } else {
        echo "Data kursus tidak ditemukan.";
        exit();
    }
}

include 'templates/header.php';
?>

<div class="container-fluid">
    <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Daftar Kursus</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <a href="tambah-data.php" class="btn btn-sm btn-outline-success">Tambah Data</a>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Durasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Tampilkan data kursus dalam tabel
                    $sql = "SELECT * FROM data_kursus";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['judul'] . "</td>";
                        echo "<td>" . $row['deskripsi'] . "</td>";
                        echo "<td>" . $row['durasi'] . "</td>";
                        echo "<td>
                            <a href='materi.php?id_kursus=" . $row['id_kursus'] . "' class='btn btn-sm btn-outline-info'>Pilih</a>
                            <a href='edit.php?id_kursus=" . $row['id_kursus'] . "' class='btn btn-sm btn-outline-secondary'>Edit</a>
                            <button class='btn btn-sm btn-outline-danger' onclick='konfirmasiHapus(" . $row['id_kursus'] . ")'>Hapus</button>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <script>
                function konfirmasiHapus(idKursus) {
                    var konfirmasi = confirm("Apakah Anda yakin ingin menghapus kursus ini?");
                    if (konfirmasi) {
                        window.location.href = 'proses-hapus.php?id_kursus=' + idKursus;
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