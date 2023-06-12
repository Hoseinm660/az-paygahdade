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
$sql = "SELECT * , comment.ID AS comment_id FROM `comment`
INNER JOIN user ON user.ID = comment.userID";


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
            <td>کد پیام</td>
            <td>نام و نام خانوادگی کاربر</td>
            <td>عنوان</td>
            <td>متن</td>
            <td>وضعیت پیام</td>
            <td>عملیات</td>
        </tr>
    ";
  while($row = mysqli_fetch_assoc($result)) {
    $order_id = $row['comment_id'];
    echo "<tr>";
    echo "<td>" . $row['comment_id'] . "</td>";
    echo "<td>" . $row['firstName'] . ' ' . $row['lasName'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['descreption'] . "</td>";
    if($row['stat']==0){ echo "<td>" . "(".$row['stat'].")" ."خوانده نشد ". "</td>";}
    elseif($row['stat']==1){ echo "<td>" ."(".$row['stat'].")"."خوانده شد". "</td>";}
    else{ echo "<td>" . $row['stat'] ."مشخص نشده". "</td>";}
    //echo "<td>" . $row['stat'] . "</td>";
    echo "<td> <a href='action_update_comment.php?id=$order_id'>تغییر وضعیت</a></td>";
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