<?php

session_start();
// اتصال به پایگاه داده
$servername = "localhost"; // نام سرور
$username = "root"; // نام کاربری
$password = ""; // رمز عبور
$dbname = "starshop"; // نام پایگاه داده

// ایجاد اتصال
$conn = mysqli_connect($servername, $username, $password, $dbname);

// بررسی اتصال
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

// گرفتن خروجی از جدول کتاب‌ها

$sql = "DELETE FROM `prodoct` WHERE ID = $id";

if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'> window.alert('محصول با موفقیت حذف شد'); </script>";
    echo "<script> location.replace('select_prodoct.php'); </script>";
} else {
    echo "خطا: " . mysqli_error($conn);
}

// قطع اتصال
mysqli_close($conn);

?>