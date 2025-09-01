<?php
include 'koneksi.php';

$id = $_GET['id_data'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit();
}

$data = $koneksi->query("SELECT * FROM data_diri WHERE id_data=$id")->fetch_assoc();

if (!$data) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['simpan'])) {
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $alamat = $koneksi->real_escape_string($_POST['alamat']);
    $jk = $koneksi->real_escape_string($_POST['jk']);
    $nope = (int) $_POST['nope'];

    $query = "UPDATE data_diri SET
                nama='$nama',
                alamat='$alamat',
                jk='$jk',
                nope=$nope
              WHERE id_data=$id";

    if ($koneksi->query($query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<div class='alert alert-danger mt-3'>Gagal update: " . $koneksi->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Hewan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Data Diri</h2>
    <form method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" 
                   required value="<?= htmlspecialchars($data['nama']) ?>">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" 
                   required value="<?= htmlspecialchars($data['alamat']) ?>">
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <input type="text" name="jk" id="jk" class="form-control" 
                   required value="<?= htmlspecialchars($data['jk']) ?>">
        </div>
        <div class="mb-3">
            <label for="nope" class="form-label">No Handphone</label>
            <input type="number" name="nope" id="nope" class="form-control" 
                   required value="<?= htmlspecialchars($data['nope']) ?>">
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
