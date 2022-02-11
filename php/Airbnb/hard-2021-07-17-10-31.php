<?php


/*
This problem was asked by Airbnb.

Given a list of integers, write a function that returns the largest sum of non-adjacent numbers. Numbers can be 0 or negative.

For example, [2, 4, 6, 2, 5] should return 13, since we pick 2, 6, and 5. [5, 1, 1, 5] should return 10, since we pick 5 and 5.

Follow-up: Can you do this in O(N) time and constant space?

 */



function findMaxSum($arr, $n)
{
    $incl = $arr[0];
    $excl = 0;
    for ($i = 1; $i <$n; $i++)
    {

        // current max excluding i
        $excl_new = ($incl > $excl)? $incl: $excl;

        // current max including i
        $incl = $excl + $arr[$i];
        $excl = $excl_new;
    }

// return max of incl and excl
    return (($incl > $excl)? $incl : $excl);
}

// Driver Code
$arr = array(5, 1, 1, 5);
$n = sizeof($arr);
echo findMaxSum($arr, $n);