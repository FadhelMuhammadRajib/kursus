<?php
include 'koneksi.php';

include 'templates/header.php';
?>

<div class="container-fluid">
    <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h3">Form Tambah Data Materi</h1>
            </div>
            <form action="proses-materi.php?aksi=tambah" method="post">
                <input type="hidden" name="id_kursus" value="<?php echo $id_kursus; ?>">
                <div class="form-group">
                    <label for="id_kursus">Pilih Kursus</label>
                    <select class="form-control" id="id_kursus" name="id_kursus" required>
                        <?php
                        $queryKursusSelect = "SELECT * FROM data_kursus";
                        $resultKursusSelect = $conn->query($queryKursusSelect);

                        if ($resultKursusSelect->num_rows > 0) {
                            while ($rowKursusSelect = $resultKursusSelect->fetch_assoc()) {
                                echo "<option value='" . $rowKursusSelect['id_kursus'] . "'>" . $rowKursusSelect['judul'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="link">Link Embed</label>
                    <input type="text" class="form-control" id="link" name="link" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="kursus.php" class="btn btn-warning">Cancel</a>
            </form>
        </main>
    </div>
</div>

<?php
// Include file footer
include 'templates/footer.php';
?>