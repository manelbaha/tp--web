<?php
header("Content-Type: application/json");

// التحقق من استقبال البيانات
if (isset($_POST['name'], $_POST['weight'], $_POST['height'])) {
    $name = htmlspecialchars($_POST['name']);
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']);

    // التحقق من القيم المدخلة
    if ($weight <= 0 || $height <= 0) {
        echo json_encode([
            "success" => false,
            "message" => "Invalid input values. Weight and height must be greater than zero."
        ]);
        exit;
    }

    // حساب مؤشر كتلة الجسم (BMI)
    $bmi = $weight / ($height * $height);
    $interpretation = "";

    if ($bmi < 18.5) {
        $interpretation = "Underweight";
    } elseif ($bmi < 25) {
        $interpretation = "Normal weight";
    } elseif ($bmi < 30) {
        $interpretation = "Overweight";
    } else {
        $interpretation = "Obesity";
    }

    // تحضير الرسالة
    $message = "Hello, $name. Your BMI is " . number_format($bmi, 2) . " ($interpretation).";

    // إرجاع النتيجة بصيغة JSON
    echo json_encode([
        "success" => true,
        "bmi" => round($bmi, 2),
        "message" => $message
    ]);
    exit;
}

// إذا لم يتم استقبال البيانات
echo json_encode([
    "success" => false,
    "message" => "Data not received."
]);
exit;
?>