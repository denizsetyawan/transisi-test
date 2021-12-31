<?php

$arr = [
  ['f', 'g', 'h', 'i'],
  ['j', 'k', 'p', 'q'],
  ['r', 's', 't', 'u']
];

function cari(array $arr, string $kata)
{
  $current_position = [];
  $kata_split = str_split($kata);

  foreach ($kata_split as $ks) {
    foreach ($arr as $outer => $value) {
      $inner = array_search($ks, array_column($value, null));
      if ($inner !== false) {
        if (! is_sibling($current_position, [$outer, $inner])) {
          return false;
        }
        $current_position = [$outer, $inner];
      }
    }
  }
  return true;
}

function is_sibling(array $current, array $next) {
  if (empty($current)) {
    return true;
  }

  if ([$current[0], $current[1]+1] == $next) {
    return true;
  }
  
  if ([$current[0], $current[1]-1] == $next) {
    return true;
  }
  
  if ([$current[0]-1, $current[1]] == $next) {
    return true;
  }
  
  if ([$current[0]+1, $current[1]] == $next) {
    return true;
  }
  
  return false;
}

$res = cari($arr, 'fghi');
// $res = cari($arr, 'fghp');
// $res = cari($arr, 'fjrstp');
// $res = cari($arr, 'fghq');
// $res = cari($arr, 'fst');
// $res = cari($arr, 'pqr');
// $res = cari($arr, 'fghh');

if($res == true) {
  echo "true";
} else {
  echo "false";
}