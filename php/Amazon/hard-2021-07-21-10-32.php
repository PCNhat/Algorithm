<?php

/*

Given an integer k and a string s, find the length of the longest substring that contains at most k distinct characters.

For example, given s = "abcba" and k = 2, the longest substring with k distinct characters is "bcb".

 */

$s = readline("Enter your string s: ");
$k = (int)readline("Enter the number of distinct characters k: ");

$distinctChar[] = $s[0];
$currentDistinctCharNumber = 1;
$maxLength = 1;
$maxString = $s[0];
$offset = 0;

for ($i = 1; $i < strlen($s); $i++) {
    if (!in_array($s[$i], $distinctChar)) {
        $distinctChar[] = $s[$i];
        $currentDistinctCharNumber++;
        if ($currentDistinctCharNumber > $k) {
            $length  = $i - $offset;
            if ($length > $maxLength) {
                $maxLength = $length;
                $maxString = substr($s, $offset, $maxLength);
            }

            $removedChar = array_shift($distinctChar);
            $currentDistinctCharNumber--;
            while ($s[$offset] === $removedChar) {
                $offset++;
            }
        }
    }
}

echo $maxString;
echo "\n";
echo $maxLength;
