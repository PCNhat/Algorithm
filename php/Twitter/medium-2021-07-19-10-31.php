<?php

/*

This problem was asked by Twitter.

Implement an autocomplete system. That is, given a query string s and a set of all possible query strings, return all strings in the set that have s as a prefix.

For example, given the query string de and the set of strings [dog, deer, deal], return [deer, deal].

Hint: Try preprocessing the dictionary into a more efficient data structure to speed up queries.

 */

$listWords = ['dog', 'deer', 'deal'];

$input = readline('Enter string: ');
echo "Suggested words: ";
foreach ($listWords as $word) {
    $result = strpos($word, $input);
    if ($result === 0) {
        echo $word . " ";
    }
}