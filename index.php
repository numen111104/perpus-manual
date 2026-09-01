<?php

use App\Buku;
use App\Database;

require_once "vendor/autoload.php";

$database = new Database(
    "localhost",
    "pustaka-manual",
    "root",
    ""
);

$db = $database->connect();

$buku = new Buku($db);

$semuaBuku = $buku->semua();

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/numen111104/nide-ui-default@v1.0.0/css/default-ui.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;700;800&display=swap">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpus Manual</title>
</head>

<body>
    <h1>Perpustakaan</h1>
    <p>
        <a href="tambah.php">Tambah</a>
    </p>
    <table border="1" cellpading="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Stok</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($semuaBuku as $buku): ?>
                <tr>
                    <td><?php echo $buku['id'] ?></td>
                    <td><?= $buku['judul'] ?> </td>
                    <td><?= $buku['penulis'] ?></td>
                    <td><?= $buku['tahun'] ?></td>
                    <td><?= $buku['stok'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</body>

</html>