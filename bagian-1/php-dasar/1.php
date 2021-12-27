<?php
$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
$array = (explode(" ",$nilai));

// menampilkan rata-rata
$jml = array_filter($array);
$average = array_sum($jml)/count($jml);
echo "Rata-rata $average <br> <br>";

$jumlah = 7;

//menampilkan 7 nilai tertinggi
rsort($array);
echo "Tujuh nilai tertinggi <br>";
for($i = 0; $i < $jumlah; $i++) {
  echo $array[$i];
  echo "<br>";
}

//menampilkan 7 nilai terendah
echo "<br>";
sort($array);
echo "Tujuh nilai terendah <br>";
for($i = 0; $i < $jumlah; $i++) {
  echo $array[$i];
  echo "<br>";
}


?> 