<?php

require_once 'AController.php';

class Index extends AController
{
    /**
     * @return string
     */
    public function execute()
    {

        $array = Areas::city();

        function cmp($a, $b)
        {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        }

        uksort($array, 'cmp');

        return $this->render(
            'Index',
            [
                'title' => 'Index Page',
                'cities' => $array
            ]
        );
    }
}
