<?php
include 'koneksi.php';

// Ambil ID materi dari parameter URL
$id_materi = $_GET['id_materi'];

// Query untuk mengambil data materi dari database berdasarkan ID
$result_materi = mysqli_query($conn, "SELECT * FROM materi WHERE id_materi = '$id_materi'");
$datamateri = mysqli_fetch_assoc($result_materi);

if (isset($_POST["submit"])) {
    // Ambil nilai dari formulir
    $judul = $_POST["judul"];
    $deskripsi = $_POST["deskripsi"];
    $link = $_POST["link"];

    // Query untuk mengupdate data materi ke database
    $edit = mysqli_query($conn, "UPDATE materi SET judul='$judul', deskripsi='$deskripsi', link='$link' WHERE id_materi='$id_materi'");

    // Redirect ke halaman utama setelah mengedit data
    if ($edit) {
        echo "<script>alert('Data Berhasil Diubah');window.location='index.php'</script>";
    }
    exit();
}

// Periksa apakah data ditemukan
if (!$datamateri) {
    echo "Data tidak ditemukan.";
    exit();
}

include 'templates/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h3">Form Edit Data materi</h1>
            </div>

            <form method="post" target="">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $datamateri['judul']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $datamateri['deskripsi']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="link">link</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?php echo $datamateri['link']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                <a href="materi.php" class="btn btn-warning">Cancel</a>
            </form>
        </main>
    </div>
</div>

<?php
include 'templates/footer.php';
?>