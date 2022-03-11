<?php

/*

This problem was asked by Amazon.

There exists a staircase with N steps, and you can climb up either 1 or 2 steps at a time.
Given N, write a function that returns the number of unique ways you can climb the staircase.
The order of the steps matters.

For example, if N is 4, then there are 5 unique ways:

1, 1, 1, 1
2, 1, 1
1, 2, 1
1, 1, 2
2, 2
What if, instead of being able to climb 1 or 2 steps at a time, you could climb any number from a set of positive integers X?
For example, if X = {1, 3, 5}, you could climb 1, 3, or 5 steps at a time.

 */


function calculate(int $steps, array $listStepsAtATime): int
{
    $recursiveListStepsAtATime = [];
    foreach ($listStepsAtATime as $stepsAtATime) {
        if ($stepsAtATime <= $steps) {
            $recursiveListStepsAtATime[] = $stepsAtATime;
        }
    }

    if (empty($recursiveListStepsAtATime)) {
        return 0;
    }

    if (count($recursiveListStepsAtATime) == 1) {
        if ($steps % $recursiveListStepsAtATime[0] == 0) {
            return 1;
        } else {
            return 0;
        }
    }

    $totalWays = 0;
    foreach ($recursiveListStepsAtATime as $stepsAtATime) {
        $recursiveSteps = $steps - $stepsAtATime;
        if ($recursiveSteps == 0) {
            $totalWays += 1;
        } else {
            $totalWays += calculate($recursiveSteps, $recursiveListStepsAtATime);
        }
    }

    return $totalWays;
}

$steps = (int)readline('Enter the number of steps of the staircase: ');
$listStepsAtATime = readline('Enter list of steps at a time (example: 1, 3, 5): ');
$listStepsAtATime = (array)explode(', ', $listStepsAtATime);
$listStepsAtATime = array_unique($listStepsAtATime);
sort($listStepsAtATime);

$uniqueWays = calculate($steps, $listStepsAtATime);

echo "Number of unique ways: " . $uniqueWays;


