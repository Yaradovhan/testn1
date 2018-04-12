<?php

include "config.php";

include "model/areas.php";

if(isset($_GET['city']))
{
    include "controller/City.php";
    $init = new City();
} else {
    include "controller/Index.php";
    $init = new Index();
}

echo $init->execute();
