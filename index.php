index.php code: <?php
include 'calculation.php';
?>

<html>
<head>
    <title>Calculate House Electricity Bill</title>

    <style>
    body {
        font-family: "Times New Roman", serif;
        margin: 20px;
    }

    h1 {
        font-size: 30px;
    }

    table {
        border-collapse: separate;
        border-spacing: 2px;
        width: 600px;
    }

    table, th, td {
        border: 1px solid black;
    }

    th, td {
        padding: 5px;
    }

    th {
        text-align: center;
    }

    input[type="number"] {
        width: 180px;
        padding: 3px;
    }

    input[type="submit"],
    input[type="reset"] {
        padding: 3px 8px;
    }

    .form-row {
        margin-top: 12px;
    }

    hr {
        margin-top: 20px;
    }
    </style>
</head>

<body>

<h1>Calculate House Electricity Bill</h1>

<table>
    <tr>
        <th>Block Tariff (per month)</th>
        <th>Unit</th>
        <th>Rate</th>
    </tr>

    <tr>
        <td>For the first 200 kWh (1 - 200 kWh) per month</td>
        <td>1 - 200 kWh</td>
        <td>0.218</td>
    </tr>

    <tr>
        <td>For the first 100 kWh (201 - 300 kWh) per month</td>
        <td>201 - 300 kWh</td>
        <td>0.344</td>
    </tr>

    <tr>
        <td>For the first 300 kWh (301 - 600 kWh) per month</td>
        <td>301 - 600 kWh</td>
        <td>0.516</td>
    </tr>

    <tr>
        <td>For the first 300 kWh (601 - 900 kWh) per month</td>
        <td>601 - 900 kWh</td>
        <td>0.546</td>
    </tr>

    <tr>
        <td>For the first 300 kWh (901 kWh onwards) per month</td>
        <td>901 kWh onwards</td>
        <td>0.571</td>
    </tr>

    <tr>
        <td colspan="3">
            The minimum monthly charge is RM3.00. Usage more than 600kWh is charged 6% SST
        </td>
    </tr>
</table>

<br>

<form method="post">

    Enter first 200 KWh (1 - 200 KWh) per month:
    <input type="text" name="block1" value="<?php echo $block1; ?>">
    <br>

    Enter next 100 KWh (201 - 300 KWh) per month:
    <input type="text" name="block2" value="<?php echo $block2; ?>">
    <br>

    Enter next 300 KWh (301 - 600 KWh) per month:
    <input type="text" name="block3" value="<?php echo $block3; ?>">
    <br>

    Enter next 300 KWh (601 - 900 KWh) per month:
    <input type="text" name="block4" value="<?php echo $block4; ?>">
    <br>

    Enter next KWh (901 KWh onwards) per month:
    <input type="text" name="block5" value="<?php echo $block5; ?>">
    <br>

    <br>

    <input type="submit" name="calculate" value="Calculate Bill">
    <input type="reset" value="Reset">

</form>

<hr>

<h2>Your Electricity Bill</h2>

<?php

if (isset($_POST['calculate'])) {

    echo "1 - 200 KWh : " . $block1 . " KWh x 0.218 = RM "
        . number_format($charge1, 2) . "<br>";

    echo "201 - 300 KWh : " . $block2 . " KWh x 0.344 = RM "
        . number_format($charge2, 2) . "<br>";

    echo "301 - 600 KWh : " . $block3 . " KWh x 0.516 = RM "
        . number_format($charge3, 2) . "<br>";

    echo "601 - 900 KWh : " . $block4 . " KWh x 0.546 = RM "
        . number_format($charge4, 2) . "<br>";

    echo "901 KWh onwards : " . $block5 . " KWh x 0.571 = RM "
        . number_format($charge5, 2) . "<br>";

    echo "<br>";

    // Summary
    echo "Total electricity consumption : " . $totalKwh . " KWh<br>";

    echo "Total consumption : RM "
        . number_format($totalCharge, 2) . "<br>";

    echo "SST 6% : RM "
        . number_format($sst, 2) . "<br>";

    echo "<b>Total Current Bill : RM "
        . number_format($totalBill, 2)
        . "</b><br>";
}

?>

</body>
</html>