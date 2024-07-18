<?php

namespace App\Helpers;

use DateTime;
use DateTimeZone;

function LocalTime($time, $format = 'd/M/Y H:i:s', $time_zone = null){
  $date = new DateTime('@' . ($time / 1000));

  $current_timezone = "Asia/Jakarta";
  
  // if ($time_zone == null) {

  //   if (auth()->guard("employ")->check()){
  //     $timeZones =[
  //       "WIB (UTC+7)" => "Asia/Jakarta",
  //       "WITA (UTC+8)" => "Asia/Ujung_Pandang",
  //       "WIT (UTC+9)" => "Asia/Jayapura",
  //     ];
  //     $current_timezone = $timeZones[auth()->guard("employ")->user()->time_zone];
  //   }
  
  //   if (auth()->guard("company")->check()){
  //     $timeZones =[
  //       "WIB (UTC+7)" => "Asia/Jakarta",
  //       "WITA (UTC+8)" => "Asia/Ujung_Pandang",
  //       "WIT (UTC+9)" => "Asia/Jayapura",
  //     ];
  //     $current_timezone = $timeZones[auth()->guard("company")->user()->company->time_zone];
  //   }
  // }else{
  //   $timeZones =[
  //     "WIB (UTC+7)" => "Asia/Jakarta",
  //     "WITA (UTC+8)" => "Asia/Ujung_Pandang",
  //     "WIT (UTC+9)" => "Asia/Jayapura",
  //   ];
  //   $current_timezone = $timeZones[$time_zone];
  // }

  $date->setTimezone(new DateTimeZone($current_timezone));

  // Format the date
  $formatted_date = $date->format($format);

  return $formatted_date;
}

function CurrentMicroTime()
{
  return round(microtime(true) * 1000);
}

function ParseMicroTime($date, $time_zone = null){
  if ($time_zone == null) {
    $date = new DateTime($date);
  }

  if ($time_zone != null) {
    $date = new DateTime($date, new DateTimeZone($time_zone));
  }

  $microtime = $date->format('U.u') * 1000;

  return $microtime;
}

function CheckTimeZone($time_zone){
  $timeZones =[
    "WIB (UTC+7)" => "Asia/Jakarta",
    "WITA (UTC+8)" => "Asia/Ujung_Pandang",
    "WIT (UTC+9)" => "Asia/Jayapura",
  ];
  
  return $timeZones[$time_zone];
}


function DiffTime($minute){
  $jam = intdiv($minute, 60);
  $menit = $minute % 60;

  return "{$jam} jam, {$menit} menit";
}