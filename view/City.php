<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
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
<p>Your current place: <span><?php echo $curCity; ?></span></p>
<?php echo $lat; ?>
<br>
<?php print_r($long); ?>
<br>
<table>
    <tr>
        <th>Area</th>
        <th>Distance, kms</th>
    </tr>

    <?php foreach ($cities as $k=>$name): ?>
        <tr>
            <td>
                <?php echo $k; ?>
            </td>
            <td>
                <?php echo $name; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>