<?php

namespace App;

use PDO;

class Buku
{
    public function __construct(
        private PDO $db
    ) {} // dependency injection: sebuah class yang bergantung dengan class lain di dalam constructornya

    public function semua()
    {
        $stmt = $this->db->query(
            "SELECT * from buku ORDER BY penulis"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // menggunakan konstanta variabel PDO = 2
    }

    // public function bukuAndre(){}

    // Function query where penulis Andrea Hirata
    // bukuAndrea

    public function tambah(
        string $judul,
        string $penulis,
        int $tahun,
        int $stok
    ) {
        $stmt = $this->db->prepare(
            "INSERT INTO buku (judul, penulis, tahun, stok) 
            VALUES (?,?,?,?)"
        ); // Tidak boleh isi query langsung dari parameter agar tidak ada SQL Injection

        $stmt->execute(
            [$judul, $penulis, $tahun, $stok]
        ); // mengeksekusi query sekaligus menjaga query dari injection
    }
}
