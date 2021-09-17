<?php

const PREDEFINED_PARAM = 365.2425;
const DAYS_OF_MONTH_YEAR = [1 => 31, 2 => 28, 3 => 31, 4 => 30, 5 => 31, 6 => 30, 7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31];
const DAYS_OF_MONTH_LEAP_YEAR = [1 => 31, 2 => 29, 3 => 31, 4 => 30, 5 => 31, 6 => 30, 7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31];

function getTotalLeapYears($year)
{
    $year = $year - 1;
    $year400 = floor($year / 400);
    $year4 = floor($year / 4);
    $year100 = floor($year / 100);
    return $year400 + $year4 - $year100;
}

function checkLeapYear($year)
{
    if (($year !== 0) && (!($year / 400) || (($year / 100) && !($year / 4)))) {
        return true;
    }

    return false;
}

function getMonthAndDate($year, $surplusDays, &$month, &$date)
{
    $daysOfMonth = checkLeapYear($year) ? DAYS_OF_MONTH_LEAP_YEAR : DAYS_OF_MONTH_YEAR;
    foreach ($daysOfMonth as $key => $value){
        if ($surplusDays > 0) {
            $month++;
            if ($surplusDays < $daysOfMonth[$key + 1]) {
                $date = $surplusDays;
                break;
            }

            $surplusDays -= $daysOfMonth[$key];
        }
    }
}

// Get number from keyboard
echo "Nhap so tu nhien bat ky: ";
$totalDays = (int)fgets(fopen('php://stdin', 'r'));

$year = floor($totalDays / PREDEFINED_PARAM) + 1;
$totalLeapYears = getTotalLeapYears($year);

$surplusDays = $totalDays - $totalLeapYears - ($year - 1) * 365;

getMonthAndDate($year, $surplusDays, $month, $date);

echo "Ngay/Thang/Nam: " . $date . '/' . $month . '/' . $year . "\n";

?>
