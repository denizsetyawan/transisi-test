<?php

	$arr = [
    ['f', 'g', 'h', 'i'],
    ['j', 'k', 'p', 'q'],
    ['r', 's', 't', 'u']
  ];
  
  $dd = var_dump($arr);
  
  function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
  }
  
  $input = 'fghi';
  $cek = print_r (str_split($input));
  $input = in_array_r($cek, $arr) ? 'true' : 'false';
  echo $input;

?>