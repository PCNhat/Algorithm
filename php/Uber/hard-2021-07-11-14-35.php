<?php
	/*
	Give an array of integers, return a new array such that each element at index i of the new arraysis the product of all the numbers in the original array except the one at i.
	For example, if our input was [1, 2, 3, 4, 5], the expected output would be [120, 60, 40, 30, 24]. If out input was [3, 2, 1], the expected output would be [2, 3, 6].
	*/
	$arrayInput = [1, 2, 3, 4, 5];
	$arrayInputCount = count($arrayInput);
	$arrayOutput = [];
	for ($i = 0; $i < $arrayInputCount; $i++) {
		$temp = $arrayInput[0];
		$arrayInput[0] = $arrayInput[$i];
		$arrayInput[$i] = $temp;
		$mul = 1;
		for ($j = 1; $j < $arrayInputCount; $j++) {
			$mul *= $arrayInput[$j];
		}	
		
		$arrayOutput[] = $mul; 
	}
	print_r($arrayOutput);
?>
