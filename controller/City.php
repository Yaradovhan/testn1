<?php

require_once 'AController.php';

//
//if (isset($_GET['city'])) {
//
//    class City extends AController
//    {
//        public $data = [];
//
//        public function execute()
//        {
//            $array = Areas::city();
//            $currentCity = $_GET['city'];
//
//            foreach ($array as $k => $item) {
//                if ($currentCity === $k) {
//                    $lat = $item['lat'];
//                    $long = $item['long'];
//                }
//
//                    $lat2 = $item['lat'];
//                    $long2 = $item['long'];
//
//
////                    $lat1 = $φA * M_PI / 180;
////                    $lat2 = $φB * M_PI / 180;
////                    $long1 = $λA * M_PI / 180;
////                    $long2 = $λB * M_PI / 180;
//
//// косинусы и синусы широт и разницы долгот
//                    $cl1 = cos($lat);
//                    $cl2 = cos($lat2);
//                    $sl1 = sin($lat);
//                    $sl2 = sin($lat2);
//                    $delta = $long2 - $long;
//                    $cdelta = cos($delta);
//                    $sdelta = sin($delta);
//
//// вычисления длины большого круга
//                    $y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
//                    $x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;
//
////
//                    $ad = atan2($y, $x);
//                    $dist = $ad * EARTH_RADIUS;
//
//                    $data[] = $dist;
//                }
//                return $this->render('City', ['title' => 'Choose city',
//                    'curCity' => $currentCity,
//                    'cities' => $array,
//                    'lat' => $lat,
//                    'long' => $long,
//                    'data' => $data]);
//            }
//
//
//        }
//
//
//}

//include "../config.php";
//include "../model/areas.php";
//$array = Areas::city();
//$data = [];
//foreach ($array as $k => $item) {
//    if ('Abbotsford' === $k) {
//        $lat = $item['lat'];
//        $long = $item['long'];
//    }
//
//    $lat2 = $item['lat'];
//    $long2 = $item['long'];
//
//
////                    $lat1 = $φA * M_PI / 180;
////                    $lat2 = $φB * M_PI / 180;
////                    $long1 = $λA * M_PI / 180;
////                    $long2 = $λB * M_PI / 180;
//
//// косинусы и синусы широт и разницы долгот
//    $cl1 = cos($lat);
//    $cl2 = cos($lat2);
//    $sl1 = sin($lat);
//    $sl2 = sin($lat2);
//    $delta = $long2 - $long;
//    $cdelta = cos($delta);
//    $sdelta = sin($delta);
//
//// вычисления длины большого круга
//    $y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
//    $x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;
//
////
//    $ad = atan2($y, $x);
//    $dist = $ad * EARTH_RADIUS;
//
//    $data[] = $dist;
//}
//echo "<pre>";
//print_r($data);
class City extends AController
{
    public function execute()
    {
    }

    public function getDistance($lat1, $lon1, $lat2, $lon2)
    {
        $array = Areas::city();
        foreach ($array as $k => $item) {
            if ('Abbotsford' === $k) {
                $lat1 = $item['lat'];
                $lon1 = $item['long'];
            }

            $lat2 = $item['lat'];
            $lon2 = $item['long'];

            $lat1 *= M_PI / 180;
            $lat2 *= M_PI / 180;
            $lon1 *= M_PI / 180;
            $lon2 *= M_PI / 180;

            $d_lon = $lon1 - $lon2;

            $slat1 = sin($lat1);
            $slat2 = sin($lat2);
            $clat1 = cos($lat1);
            $clat2 = cos($lat2);
            $sdelt = sin($d_lon);
            $cdelt = cos($d_lon);

            $y = pow($clat2 * $sdelt, 2) + pow($clat1 * $slat2 - $slat1 * $clat2 * $cdelt, 2);
            $x = $slat1 * $slat2 + $clat1 * $clat2 * $cdelt;

            $data[] = atan2(sqrt($y), $x) * 6372795;

            var_dump($data);
        }
    }
}



