<?php
$brush_price = 5;
$counter = 10; // Inisialisasi counter di luar perulangan

echo "<table border=\"1\" align=\"center\">";
echo "<tr><th>Quantity</th>";
echo "<th>Price</th></tr>";

while ($counter <= 100) {
    echo "<tr><td>";
    echo $counter;
    echo "</td><td>";
    echo $brush_price * $counter;
    echo "</td></tr>";
    
    $counter += 10; // Increment counter
}

echo "</table>";
?>