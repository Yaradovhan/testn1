<?php
require_once 'AController.php';

if (isset($_GET['city'])) {

    class City extends AController
    {
        public $data = [];

        public function execute()
        {
            $array = Areas::city();

            $currentCity = $_GET['city'];

            foreach ($array as $k => $item) {
                if ($currentCity === $k) {
                    $lat = $item['lat'];
                    $long = $item['long'];
                }

            }
            foreach ($array as $k => $item) {
                $lat2 = $item['lat'];
                $long2 = $item['long'];

                $latA = $lat * M_PI / 180;
                $latB = $lat2 * M_PI / 180;
                $longA = $long * M_PI / 180;
                $longB = $long2 * M_PI / 180;

                $cl1 = cos($latA);
                $cl2 = cos($latB);
                $sl1 = sin($latA);
                $sl2 = sin($latB);
                $delta = $long2 - $long;
                $cdelta = cos($delta);
                $sdelta = sin($delta);

                $y = sqrt(pow($cl2 * $sdelta, 2) + pow($cl1 * $sl2 - $sl1 * $cl2 * $cdelta, 2));
                $x = $sl1 * $sl2 + $cl1 * $cl2 * $cdelta;

                $ad = atan2($y, $x);
                $dist = $ad * EARTH_RADIUS/1000;
                $data[] = $dist;
            }

            foreach ($array as $k => $item) {
                $city[] = $k;
            }

            $combine = array_combine($city, $data);

            function cmp($a, $b)
            {
                if ($a == $b) {
                    return 0;
                }
                return ($a < $b) ? -1 : 1;
            }

            uasort($combine, 'cmp');

            return $this->render('City', ['title' => 'Choose city',
                'curCity' => $currentCity,
                'cities' => $combine,
                'lat' => $lat,
                'long' => $long,
                ]);
        }
    }
}
