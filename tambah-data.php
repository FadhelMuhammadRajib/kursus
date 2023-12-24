<?php
include 'koneksi.php';

include 'templates/header.php';
?>

<div class="container-fluid">
    <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h3">Form Tambah Data Kursus</h1>
            </div>
            <form action="proses.php?aksi=tambah" method="post">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="durasi">Durasi</label>
                    <input type="text" class="form-control" id="durasi" name="durasi" required>
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