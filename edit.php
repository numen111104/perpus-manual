<?php

require_once "vendor/autoload.php";

use App\Database;
use App\Buku;

$database = new Database(
    'localhost',
    'pustaka-manual',
    'root',
    ''
);

$db = $database->connect();

$buku = new Buku($db);

$id = (int) ($_GET["id"] ?? 0);
$judulBuku = (string) ($_GET['judul'] ?? "");

$dataBuku = $buku->cariBuku($id);

if (!$dataBuku) {
    die('Buku tidak ditemukan');
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $buku->ubah(
        $id,
        $_POST['judul'],
        $_POST['penulis'],
        (int) $_POST['tahun'],
        (int) $_POST['stok']
    );

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/numen111104/nide-ui-default@v1.0.0/css/default-ui.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;700;800&display=swap">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Edit Buku <?= $judulBuku ?></h1>
    <form method="POST">
        <label for="judul">Judul</label>
        <input
            type="text"
            name="judul"
            id="judul"
            value="<?= $dataBuku['judul'] ?>">

        <label for="penulis">Penulis</label>
        <input
            type="text"
            name="penulis"
            id="penulis"
            value="<?= $dataBuku['penulis'] ?>">

        <label for="tahun">Tahun</label>
        <input
            type="number"
            name="tahun"
            id="tahun"
            value="<?= $dataBuku['tahun'] ?>">

        <label for="stok">Stok</label>
        <input
            type="number"
            id="stok"
            name="stok"
            value="<?= $dataBuku['stok'] ?>">

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>

</html>