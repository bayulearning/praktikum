<?php
$kendaraan = array("Mobil", "Bus", "Truk", "Sepeda Motor", "Sepeda", "Becak", "Andong");

sort($kendaraan);
echo "<ul>"; // Mulai daftar tidak terurut
for ($i = 0; $i < count($kendaraan); $i++) {
    echo "<li>" . $kendaraan[$i] . "</li>"; // Menampilkan elemen array
}
echo "</ul>"; // Tutup daftar
?>
