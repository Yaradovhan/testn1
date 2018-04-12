<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title;?></title>
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
        foreach ($cities as $k => $name) {
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
    <?php foreach($cities as $k=>$name): ?>
        <tr>
            <td><?php echo $k; ?></td>
            <td><?php echo $name['lat']; ?></td>
            <td><?php echo $name['long']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>