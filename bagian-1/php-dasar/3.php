<?php
	
	function tampil($input)
	{
		$arr = explode(' ', $input);

		// menampilkan unigram
		$unigram = '';
		foreach ($arr as $a) {
			$unigram .= $a.', ';
		}
		$unigram = substr($unigram, 0, -2);

		// menampilkan bigram
		$x = 0;
		$bigram = '';
		foreach ($arr as $a) {
			if ($x < 1) {
				$bigram .= $a.' ';
				$x++;
			} else {
				$bigram .= $a.', ';
				$x = 0;
			}
		}
		$bigram = substr($bigram, 0, -2);

		// menampilkan trigram
		$y = 0;
		$trigram = '';
		foreach ($arr as $a) {
			if ($y < 2) {
				$trigram .= $a.' ';
				$y++;
			} else {
				$trigram .= $a.', ';
				$y = 0;
			}
		}
		$trigram = substr($trigram, 0, -2);


		$result = 'Unigram : '. $unigram . '<br>';
		$result .= 'Bigram : '. $bigram . '<br>';
		$result .= 'Trigram : '. $trigram;

		return $result;
	}

	echo tampil('Jakarta adalah ibukota negara Republik Indonesia');
?>