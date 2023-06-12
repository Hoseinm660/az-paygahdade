<?php
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

// گرفتن خروجی از جدول 
$sql = "SELECT * , orders.ID AS order_id FROM `orders`
INNER JOIN user ON user.ID = orders.userID
INNER JOIN prodoct ON prodoct.ID = orders.prodoctID";

// نام و نام خوانادگی کاربر
// نام محصول
// تعداد سفارش
// جمع کل
// شماره تماس مشتری
// آی دی سفارش
// وضعیت سفارش

echo "<a href='index.php'>بازگشت</a>";

$result = mysqli_query($conn, $sql);



// چاپ خروجی
if (mysqli_num_rows($result) > 0) {
    echo "
    <table border='solid 2px black'>
        <tr>
            <td>کد سفارش</td>
            <td>نام و نام خانوادگی کاربر</td>
            <td>نام محصول</td>
            <td>نوع محصول</td>
            <td>کشور محصول</td>
            <td>تعداد سفارش</td>
            <td>جمع کل</td>
            <td>شماره تماس مشتری</td>
            <td>وضعیت سفارش</td>
            <td>عملیات</td>
        </tr>
    ";
  while($row = mysqli_fetch_assoc($result)) {
    $order_id = $row['order_id'];
    echo "<tr>";
    echo "<td>" . $row['order_id'] . "</td>";
    echo "<td>" . $row['firstName'] . ' ' . $row['lasName'] . "</td>";
    echo "<td>" . $row['prodoctName'] . "</td>";
    echo "<td>" . $row['prodoctType'] . "</td>";
    echo "<td>" . $row['prodoctCountry'] . "</td>";
    echo "<td>" . $row['count'] . "</td>";
    echo "<td>" . $row['price'] * $row['count'] . "</td>";
    echo "<td>" . $row['phoneNumber'] . "</td>";
    if($row['stat']==0){ echo "<td>" . "(".$row['stat'].")" ."رسیدگی نشده". "</td>";}
    elseif($row['stat']==1){ echo "<td>" ."(".$row['stat'].")"."رسیدگی شد". "</td>";}
    else{ echo "<td>" . $row['stat'] ."مشخص نشده". "</td>";}
    //echo "<td>" . $row['stat'] . "</td>";
    echo "<td> <a href='action_update_order.php?id=$order_id'>تغییر وضعیت</a></td>";
    echo "
    </tr>
    ";

  }
} else {
  echo "هیچ رکوردی در دیتابیس موجود نیست.";
}
echo "</table>";

// قطع اتصال
mysqli_close($conn);

?>