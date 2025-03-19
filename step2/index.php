<?php
$result = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    if ($weight > 0 && $height > 0) {
        $bmi = $weight / ($height * $height);

        if ($bmi < 18.5) {
            $interpretation = "Underweight";
        } elseif ($bmi < 25) {
            $interpretation = "Normal weight";
        } elseif ($bmi < 30) {
            $interpretation = "Overweight";
        } else {
            $interpretation = "Obesity";
        }

        $result = "Hello, $name. Your BMI is " . number_format($bmi, 2) . " ($interpretation).";
    } else {
        $result = "Invalid input values.";
    }
}
?>
!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>BMI Calculator</h1>
    
    <?php if ($result != "") { echo "<p>$result</p>"; } ?>

    <form action="" method="post" onsubmit="return validateForm();">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" name="weight" step="0.1" required><br>

        <label for="height">Height (m):</label>
        <input type="number" id="height" name="height" step="0.01" required><br>

        <input type="submit" value="Calculate">
    </form>
</body>
</html>