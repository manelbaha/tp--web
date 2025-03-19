function validateForm() {
    var name = document.getElementById("name").value.trim();
    var weight = document.getElementById("weight").value.trim();
    var height = document.getElementById("height").value.trim();

    // التحقق من الحقول الفارغة
    if (name === "" || height === "" || height === "") {
        alert("All fields are required.");
        return false;
    }

    // تحويل المدخلات إلى أرقام والتحقق من صحتها

    if (isNaN(weight) || isNaN(height)){
        alert("Weight and Height must be positive numbers.");
        return false;
    }

    return true;
}