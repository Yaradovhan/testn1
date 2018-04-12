<?php
//
//$array = array(
//    'Hastings Area' => array('lat' => '-39.639578', 'long' => '176.839232',),
//    'Auckland City and Suburbs' => array('lat' => '-36.862665', 'long' => '174.875860',),
//    'Waitakere City and Suburbs' => array('lat' => '-36.850424', 'long' => '174.542540',),
//    'Rodney Area' => array('lat' => '-36.618817', 'long' => '174.676880',),
//    'Christchurch City' => array('lat' => '-43.532054', 'long' => '172.636225',)
//);
$array = (include "areas.php");
function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

uksort($array, 'cmp');

?>

<!DOCTYPE html>
<html>
<head>
    <title>City</title>
    <style>
        table {
            font-family: arial, sans-serif;
            /*border-collapse: collapse;*/
            width: 50%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<p>Choose your current position</p>
<form action="" method="get">
    <select name="city" id="city">
        <?php
        foreach ($array as $k => $name) {
            echo '<option value="' . $k . '">' . $k . '</option>';
        }
        ?>
    </select>
    <input type="submit">
</form>

<table>
    <tr>
        <th>Area</th>
        <th>Latitude</th>
        <th>Longitude</th>
    </tr>
    <?php foreach($array as $k=>$name): ?>
    <tr>
        <td><?php echo $k; ?></td>
        <td><?php echo $name['lat']; ?></td>
        <td><?php echo $name['long']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>


