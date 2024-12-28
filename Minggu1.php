<?php
// Daftar produk, harga, dan stok
$pakaian = array("Kemeja", "Celana", "Sepatu");
$harga = array(150000, 200000, 500000); 
$stok = array(10, 5, 7);  

// Menangani form yang disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produk_id = $_POST['produk_id']; 
    $jumlah = $_POST['jumlah']; 

    $total_harga = $harga[$produk_id - 1] * $jumlah;


    // Menghitung Jumlah
    if ($jumlah <= $stok[$produk_id - 1]) {

    $diskon = 0;

    if ($total_harga > 500000){
        $diskon = 10;
    
    }elseif ($total_harga > 250000){
        $diskon = 5;
    }
    $harga_final = $total_harga - ($total_harga*$diskon/100);
    $pajak = ($total_harga*10)/100;
    $harga_total = $harga_final + $pajak;
        
        //Format Struk Transaksi
        echo "<p style='color:red; text-align:center'>STRUK TRANSAKSI</P>";
        echo "<p style='color:red; text-align:center'>==================</p>";
        echo "<p style='text-align:center'>Nama produk : " . $pakaian[$produk_id - 1] . "</p>";
        echo "<p style='text-align:center'>Jumlah : " . $jumlah . "</p>";
        echo "<p style='text-align:center'>Total harga : Rp " . number_format($total_harga, 0, ',', '.') . "</p>";
    
        if ($diskon >0) {
        echo "<p style='text-align:center'>Diskon: ". $diskon. "%</p>";
        echo "<p style='text-align:center'>Setelah diskon: Rp ". number_format($harga_final,0,',','.'). "</p>";
        echo "<p style='text-align:center'>Pajak 10%: Rp". number_format($pajak,0,',','.'). "</p>";
        echo "<p style='text-align:center'>-------------------------------</p>";
        echo "<p style='color:red; text-align:center'>Harga Yang Harus Dibayar: Rp". number_format($harga_total,0,',','.')."</p>";
        echo "<p style='color:red; text-align:center'>==================</p>";    
    }
    //mengecek Stok
    } else {
        echo "<script type='text/javascript'>
        alert('Maaf, stok untuk " . $pakaian[$produk_id - 1] . " tidak mencukupi"."')</script>";
    }
}
    // Menampilkan tabel
    echo "<table border=\"1\" align=\"center\">";
    echo "<tr><th>ID Produk</th><th>Nama Produk</th><th>Harga (Rp)</th><th>Stok</th></tr>";

    for ($i = 0; $i < count($pakaian); $i++) {
        echo "<tr>";
        echo "<td>" . ($i + 1) . "</td>"; 
        echo "<td>" . $pakaian[$i] . "</td>";  
        echo "<td>" . number_format($harga[$i], 0, ',', '.') . "</td>";  
        echo "<td>" . $stok[$i] . "</td>"; 
        echo "</tr>";
    }

    echo "</table>";
    echo "<br>";

    // Form untuk memilih jumlah produk yang ingin dibeli
    echo "<form method=\"POST\" align=\"center\">";
    echo "<h3>Silakan pilih produk dan jumlah yang ingin dibeli:</h3>";
    echo "<label for=\"produk_id\">ID Produk:</label>";
    echo "<select name=\"produk_id\">";
    
    // Membuat dropdown dengan ID produk
    for ($i = 0; $i < count($pakaian); $i++) {
        echo "<option value=\"" . ($i + 1) . "\">" . ($i + 1) . " - " . $pakaian[$i] . "</option>";
    }
    
    echo "</select><br><br>";
    
    // Input untuk jumlah produk
    echo "<label for=\"jumlah\">Jumlah yang ingin dibeli:</label>";
    echo "<input type=\"number\" name=\"jumlah\" min=\"1\" required><br><br>";
    
    echo "<input type=\"submit\" value=\"Beli\">";
    echo "</form>";

?>