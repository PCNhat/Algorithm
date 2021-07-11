<?php
	/*
	Given a list of numbers and a number k, return whether any two numbers from the list add up to k.
	For example, given [10, 15, 3, 7] and k of 17, truen true since 10 + 7 is 17.
	*/
	$data = [101, 15, 3, 7];
	$k = 17;
	$count = count($data);
	for ($i = 0; $i < $count; $i++) {
		for ($j = $i+1; $j < $count; $j++) {
			if (($data[$i] + $data[$j]) == $k) {
				print('true');
			}
		}
	}
	
	print('false');
?>
