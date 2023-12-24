<?php
include 'koneksi.php';

// Ambil ID kursus dari parameter URL
$id_kursus = $_GET['id_kursus'];

// Query untuk mengambil data kursus dari database berdasarkan ID
$result_kursus = mysqli_query($conn, "SELECT * FROM data_kursus WHERE id_kursus = '$id_kursus'");
$dataKursus = mysqli_fetch_assoc($result_kursus);

if (isset($_POST["submit"])) {
    // Ambil nilai dari formulir
    $judul = $_POST["judul"];
    $deskripsi = $_POST["deskripsi"];
    $durasi = $_POST["durasi"];

    // Query untuk mengupdate data kursus ke database
    $edit = mysqli_query($conn, "UPDATE data_kursus SET judul='$judul', deskripsi='$deskripsi', durasi='$durasi' WHERE id_kursus='$id_kursus'");

    // Redirect ke halaman utama setelah mengedit data
    header("Location: kursus.php");
    exit();
}

// Periksa apakah data ditemukan
if (!$dataKursus) {
    echo "Data tidak ditemukan.";
    exit();
}

include 'templates/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h3">Form Edit Data Kursus</h1>
            </div>

            <form method="post" target="">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $dataKursus['judul']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $dataKursus['deskripsi']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="durasi">Durasi</label>
                    <input type="text" class="form-control" id="durasi" name="durasi" value="<?php echo $dataKursus['durasi']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                <a href="kursus.php" class="btn btn-warning">Cancel</a>
            </form>
        </main>
    </div>
</div>

<?php
include 'templates/footer.php';
?>