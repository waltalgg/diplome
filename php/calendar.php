<link rel="stylesheet" href="../css/style_calendar.css">
<?php

$self = $_SERVER['years_calendar'];

if($_GET['month'])
  $month = $_GET['month'];
elseif($_GET['viewmonth'])
  $month = $_GET['viewmonth'];
else $month = date('m');

if($_GET['year'])
  $year = $_GET['year'];
elseif($_GET['viewyear'])
  $year = $_GET['viewyear'];
else $year = date('Y');

if($month == '12')
{
  $next_year = $year + 1;
}
else
{
  $next_year = $year;
}

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

$first_month = mktime(0, 0, 0, $month, 1, $year);

$day_headings = array('Sunday', 'Monday', 'Tuesday',
'Wednesday', 'Thursday', 'Friday', 'Saturday');

$maxdays = date('t', $first_month);
$date_info = getdate($first_month);
$month = $date_info['mon'];
$year = $date_info['year'];
$today_month = date('m');
$today_year = date('y');

if($month == '1')
{
  $last_year = $year-1;
}
else
{
$last_year = $year;
}

$timestamp_last_month = $first_month - (86400);
$last_month = date("m", $timestamp_last_month);

if($month == '12')
{
  $next_month = '1';
}

else
{
  $next_month = $month+1;
}

$calendar = "
<div class = 'calendar_month'>
<table class='calendar_month_table'>
<tr style='background: #5A8EB5;'>
    <td colspan='7'>
        <a style='margin-right: 50px; color: #ffffff; font-size: 18px; padding: 10px;'
        href='$self?month=".$last_month."&year=".$last_year."'><<</a>
        <a style='font-size: 14px; font-weight: bold; font-family: Comic Sans MS;'>
       ".$Month_r[$month]." ".$year."
       </a>
        <a style='margin-left: 50px; color: #ffffff; font-size: 18px; padding: 10px;'
        href='$self?month=".$next_month."&year=".$next_year."'>>></a>
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


$weekday = $date_info['wday'];
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

while($day <= $maxdays)
{
    if($weekday == 7)
    {
      $calendar .= "</tr><tr>";
      $weekday = 0;
    }
    
$linkDate = mktime(0, 0, 0, $month, $day, $year);

    if($weekday == 5 || $weekday == 6)
      {
        $red='style="color: red" ';
      }
      else
      {
        $red='';
      }

$calendar .= "
    <td class='td_cl'><span ".$red.">{$day}</span>
    </td>";
    $day++;
  $weekday++;
}

if($weekday != 7)
$calendar .= "<td colspan='" . (7 - $weekday) . "'> </td>";

$calendar .= "</tr></table>
<div class='today_style'>
<a style='font-weight: bold;' href='$self?month=".$today_month."&year=".$today_year."'>Сегодня</a></div></div>";
