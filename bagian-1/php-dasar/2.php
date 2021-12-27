<?php

function hitung($input) {
  $jml = preg_match_all("/[a-z]/", $input);
  echo "$input mengandung $jml buah huruf kecil.";
}

hitung("TranSISI");

?>
