<?php
if (isset($_POST['name'], $_POST['weight'], $_POST['height'])) {
    $name = htmlspecialchars($_POST['name']);
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    if ($weight <= 0 || $height <= 0) {
        echo "Invalid input values.";
        exit;
    }

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

    echo "Hello, $name. Your BMI is " . number_format($bmi, 2) . " ($interpretation).";
} else {
    echo "Data not received.";
}
?>