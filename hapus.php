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

$id = (int) ($_GET['id'] ?? 0);
$judulBuku = (string) ($_GET['judul'] ?? '');

if ($id <= 0) {
    die('Buku tidak valid');
}

$buku->hapus($id);

header("Location: index.php");
exit;
?>