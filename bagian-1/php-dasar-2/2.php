<?php

	function enkrip($input){
		$huruf = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	  
		$input = strtoupper($input);
		$arr_input = str_split($input);

		$plus = true;
		$hasil = '';
		$x = 1;
		$tmp = 0;
		for ($i=0; $i < count($arr_input); $i++) { 
			$tmp = array_search($arr_input[$i], $huruf);
			if ($plus == true) {
				$hasil .= $huruf[$tmp+$x];
				$plus = false;
			} else {
				$ne = $tmp-$x;
				if ($ne < 0) {
					$ne = count($huruf) + ($ne);
				}
				$hasil .= $huruf[$ne];
				$plus = true;
			}
			$x++;
		}
		
	  return $hasil;
	}

	echo enkrip('DFHKNQ');

?>