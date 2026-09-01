<?php

namespace App;

use PDO;

class Buku
{
    public function __construct(
        private PDO $db
    ) {} // dependency injection: sebuah class yang bergantung dengan class lain di dalam constructornya

    public function semua() {
        $stmt = $this->db->query(
            "SELECT * from buku ORDER BY id"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // menggunakan konstanta variabel PDO = 2
    }

    // public function bukuAndre(){}

    // Function query where penulis Andrea Hirata
    // bukuAndrea

    }
