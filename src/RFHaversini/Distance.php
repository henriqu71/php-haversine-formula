<?php 

namespace RFHaversini;

class Distance {

	private static function calculate($fromLat, $fromLon, $toLat, $toLon, $precision = 0) {
		$earth_radius = 6371;

		$dLat = deg2rad($toLat - $fromLat);
		$dLon = deg2rad($toLon - $fromLon);
		
		$a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($fromLat)) * cos(deg2rad($toLat)) * sin($dLon/2) * sin($dLon/2);
		$c = 2 * asin(sqrt($a));
		$d = $earth_radius * $c;
		
		return round($d, $precision);
	}
  
  public static function toKilometers($fromLat, $fromLon, $toLat, $toLon, $precision = 0) {
	  return self::calculate($fromLat, $fromLon, $toLat, $toLon);
	}

  public static function toMiles($fromLat, $fromLon, $toLat, $toLon, $precision = 0) {
    $distance = self::calculate($fromLat, $fromLon, $toLat, $toLon, $precision);
	  return round($distance * 0.621371192, $precision);
	}

}
