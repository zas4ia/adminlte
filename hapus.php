<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $koneksi->query("DELETE FROM data_diri WHERE id_data = $id");

    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>