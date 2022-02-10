<?php

/**
 * Check year is leap years
 *
 * @param int $year
 * @return bool
 */
function checkLeapYear(int $year): bool
{
    return $year && !($year % 400) || (($year % 100) && !($year % 4));
}

/**
 * Count number of leap years up to current year
 *
 * @param int $currentYear
 * @return int
 */
function totalLeapYears(int $currentYear): int
{
    $currentYear -=1;
    $divisible400 = floor($currentYear / 400);
    $divisible4 = floor($currentYear / 4);
    $divisible100 = floor($currentYear / 100);

    return $divisible400 + $divisible4 - $divisible100;
}

/**
 * Get the number of days of the month
 *
 * @param int $month
 * @param int $year
 * @return int
 */
function getDaysOfMonth(int $month, int $year): int
{
    switch ($month) {
        // Months with 31 days
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            return 31;

        // February has 28 or 29 days
        case 2:
            if (checkLeapYear($year)) {
                return 29;
            }

            return 28;

        // Months with 30 days
        default:
            return 30;
    }
}

/**
 *
 * Get number of days up to current month
 * @param int $month
 * @param int $year
 * @return int
 */
function getTotalDaysUpToCurrentMonth(int $month, int $year): int
{
    $totalDays = 0;
    for ($i = 1; $i < $month; $i++) {
        $totalDays += getDaysOfMonth($i, $year);
    }

    return $totalDays;
}

// Main
echo "Nhap ngay: ";
$day = (int)fgets(fopen('php://stdin', 'r'));
echo "Nhap thang: ";
$month = (int)fgets(fopen('php://stdin', 'r'));
echo "Nhap nam: ";
$year = (int)fgets(fopen('php://stdin', 'r'));

$totalLeapYears = totalLeapYears($year);

echo "Days: " . $day . "\n"; 
echo "Days up to month: " . getTotalDaysUpToCurrentMonth($month, $year) . "\n";
echo "Total leap years: " . $totalLeapYears . "\n";

echo "Total days: " . ($day + getTotalDaysUpToCurrentMonth($month, $year) + ($totalLeapYears * 366) +  (($year - 1 - $totalLeapYears) * 365)) . "\n";
