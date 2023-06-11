<link rel="stylesheet" href="../css/style_calendar.css">
<?php

error_reporting(E_ALL & ~E_NOTICE);

error_reporting(0);

$before_date = strtotime("$year-$month-01  -1 month");
$start_date = mktime(0, 0, 0, $month, 1, $year);
$next_date = strtotime("$year-$month-01  +1 month");


$Month_r = array(
"1" => "январь",
"2" => "февраль",
"3" => "март",
"4" => "апрель",
"5" => "май",
"6" => "июнь",
"7" => "июль",
"8" => "август",
"9" => "сентябрь",
"10" => "октябрь",
"11" => "ноябрь",
"12" => "декабрь");



$day_headings = array('Sunday', 'Monday', 'Tuesday',
'Wednesday', 'Thursday', 'Friday', 'Saturday');

$maxdays = date('t', $start_date);

$calendar = "
<div class = 'calendar_month'>
<table class='calendar_month_table' style='width: 330px;'>
<tr style='background: #5A8EB5;'>
    <td colspan='7'>
        <a style='margin-right: 40px; color: #ffffff; font-size: 18px; padding: 10px;'
        href='?month=".date('m', $before_date)."&year=".date('Y', $before_date)."&start_date2={$start_date2}'><<</a>
        <span style='display: inline-block; width: 125px; font-size: 14px; font-weight: bold; font-family: Comic Sans MS;'>
       ".$Month_r[ (int)$month]." ".date('Y', $start_date)."
       </span>
        <a style='margin-left: 40px; color: #ffffff; font-size: 18px; padding: 10px;'
        href='?month=".date('m', $next_date)."&year=".date('Y', $next_date)."&start_date2={$start_date2}'>>></a>
    </td>
</tr>
<tr>
    <td>Пн</td>
    <td>Вт</td>
    <td>Ср</td>
    <td>Чт</td>
    <td>Пт</td>
    <td>Сб</td>
    <td>Вс</td>
</tr>
<tr>";


$weekday = date('w', $start_date);
$weekday = $weekday-1;
if($weekday == -1)
{
  $weekday=6;
}

$day = 1;

if($weekday > 0)
{
  $calendar .= "<td colspan='$weekday'> </td>";
}

$today_day = date(d);
$day_url = "?month={$month}&year={$year}&start_date2=".date('Y-m-d', $start_date-3600*24*$weekday);

while($day <= $maxdays)
{

    if($weekday == 7)
    {
      $calendar .= "</tr><tr>";
      $weekday = 0;
      $day_url = "?month={$month}&year={$year}&start_date2={$year}-{$month}-{$day}";
    }

$linkDate = mktime(0, 0, 0, $month, $day, $year);

    if($weekday == 5 || $weekday == 6)
      {
        $red='color: red';
      }
      else
      {
        $red='';
      }

$calendar .= "
    <td class='td_cl'><a href='{$day_url}'><div style='width: 100%; height: 100%; $red'>{$day}</div></a></td>";
    $day++;
  $weekday++;
}

if($weekday != 7)
$calendar .= "<td colspan='" . (7 - $weekday) . "'> </td>";

$calendar .= "</tr></table>
<div class='today_style'>
<a style='font-weight: bold;' href='?month=".date('m')."&year=".date('Y')."&start_date2={$start_date2}'>Сегодня</a></div></div>";
