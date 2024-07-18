<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class Utils{
  public static function SelectFormatter($data)
  {
    $model = [];
    foreach ($data as $key => $value) {
      $model[$value->id] = $value->name ?? $value->title;
    }
    return $model;
  }
  
  public static function Check()
  {
    $check = Auth::guard("company")->check();

    if (!$check) {
      return abort(403);
    }
  }

  public static function EmployCheck()
  {
    if (!auth()->guard("employ")->check()) {
      return response()->json([
          'status' => 403,
          'message' => 'Unauthorized',
          'data' => null
      ], 403);
    }
  }

  public static function EmployData()
  {
    return auth()->guard("employ")->user();
  }

  public static function pluckId($data)
  {
    if ($data != '' ){
      return $data->pluck('id')->toARray();
    }
    return [];
  }

  public static function CalculateDIstance($lat1, $lon1, $lat2, $lon2, $unit = "m")
  {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "M") {
        return round(($miles * 1.609344) * 1000, 2);
    } else if ($unit == "NM") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
  }

  public static function LocalDay($day)
  {
    $days = [
      "Monday" => "Senin",
      "Tuesday" => "Selasa",
      "Wednesday" => "Rabu",
      "Thursday" => "Kamis",
      "Friday" => "Jumat",
      "Saturday" => "Sabtu",
      "Sunday" => "Minggu",
    ];

    return $days[$day];
  }

  public static function CodeGenerator($length)
  {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }

}