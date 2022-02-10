<?php

/*

This problem was asked by Facebook.

Given the mapping a = 1, b = 2, ... z = 26, and an encoded message, count the number of ways it can be decoded.

For example, the message '111' would give 3, since it could be decoded as 'aaa', 'ka', and 'ak'.

You can assume that the messages are decodable. For example, '001' is not allowed.

 */


/**
 * Check if each item of array is in [1..26] or not
 *
 * @param array $explodedMessage
 *
 * @return bool
 */
function validateExplodeMessage(array $explodedMessage): bool
{
    foreach ($explodedMessage as $item) {
        if ($item[0] === '0') {
            return false;
        }

        $item = (int)$item;
        if ($item < 1 || $item > 26) {
            return false;
        }
    }

    return true;
}

/**
 * Create exploded messages by number of clusters
 *
 * @param array$smallestItems
 * @param array $allExplodedMessages
 * @param array $firstBatchItems
 */
function createExplodedMessages(array $smallestItems, array &$allExplodedMessages, array $firstBatchItems = [])
{
    $totalItems = count($smallestItems);
    $totalFirstBatchItems = count($firstBatchItems);
    if ($totalItems <= 1) {
        return;
    }

    for ($i = 0; $i < $totalItems - 1; $i++) {
        $newExplodeMessage = $smallestItems;
        $newExplodeMessage[$i] = $newExplodeMessage[$i] . $newExplodeMessage[$i + 1];
        unset($newExplodeMessage[$i+1]);
        $newExplodeMessage = array_merge($firstBatchItems, $newExplodeMessage);
        if (validateExplodeMessage($newExplodeMessage)) {
            $allExplodedMessages[] = $newExplodeMessage;
        }
        $newFirstBatchItems = array_slice($newExplodeMessage, 0, $totalFirstBatchItems + $i + 1);
        $newSmallestItems = array_slice($newExplodeMessage, $totalFirstBatchItems + $i + 1);

        createExplodedMessages($newSmallestItems, $allExplodedMessages, $newFirstBatchItems);
    }
}

/**
 * Decode message
 *
 * @param array $explodedMessage
 * @return string
 */
function decodeMessage(array $explodedMessage): string
{
    $message = '';
    foreach ($explodedMessage as $item) {
        switch ($item) {
            case 1:
                $message .= 'a';
                break;

            case 2:
                $message .= 'b';
                break;

            case 3:
                $message .= 'c';
                break;

            case 4:
                $message .= 'd';
                break;

            case 5:
                $message .= 'e';
                break;

            case 6:
                $message .= 'f';
                break;

            case 7:
                $message .= 'g';
                break;

            case 8:
                $message .= 'h';
                break;

            case 9:
                $message .= 'i';
                break;

            case 10:
                $message .= 'j';
                break;

            case 11:
                $message .= 'k';
                break;

            case 12:
                $message .= 'l';
                break;

            case 13:
                $message .= 'm';
                break;

            case 14:
                $message .= 'n';
                break;

            case 15:
                $message .= 'o';
                break;

            case 16:
                $message .= 'p';
                break;

            case 17:
                $message .= 'q';
                break;

            case 18:
                $message .= 'r';
                break;

            case 19:
                $message .= 's';
                break;

            case 20:
                $message .= 't';
                break;

            case 21:
                $message .= 'u';
                break;

            case 22:
                $message .= 'v';
                break;

            case 23:
                $message .= 'w';
                break;

            case 24:
                $message .= 'x';
                break;

            case 25:
                $message .= 'y';
                break;

            default:
                $message .= 'z';
                break;
        }
    }

    return $message;
}


/**
 * Requires properly formatted input
 */
do {
    $encodedMessage = readline('Enter encoded message: ');
    if (is_numeric($encodedMessage)) {
        break;
    }
    echo "An encoded message is only allowed to contain numeric characters!\n";
} while(true);

$allExplodedMessages = [];

$smallestItems = str_split($encodedMessage);
if (validateExplodeMessage($smallestItems)) {
    $allExplodedMessages[] = $smallestItems;
}

createExplodedMessages($smallestItems, $allExplodedMessages);

foreach ($allExplodedMessages as $explodedMessage) {
    $message = decodeMessage($explodedMessage);
    echo $message . "\n";
}









