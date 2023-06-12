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
$sql = "SELECT * FROM prodoct";
$result = mysqli_query($conn, $sql);
?>
<form action="" method="get">
    <input type="text" name="search" id="search" required placeholder="نام محصول">
    <input type="submit" value="جستجو">
    <button onclick="window.location.href = 'select_prodoct'">نمایش همه</button>
</form>
<?php
// چاپ خروجی
if(!isset($_GET['search'])){
if (mysqli_num_rows($result) > 0) {
    echo "
    <table border='solid 2px black'>
        <tr>
            <td>کد محصول</td>
            <td>عنوان</td>
            <td>نوع</td>
            <td>توضیحات</td>
            <td>قیمت</td>
            <td>کشور</td>
            <td>وضعیت فعال بودن</td>
            <td>گزینه ها</td>
            
        </tr>
    ";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";

    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['prodoctName'] . "</td>";
    echo "<td>" . $row['prodoctType'] . "</td>";
    echo "<td>" . $row['descreption'] . "</td>";
    echo "<td>" . $row['prodoctPrice'] . "</td>";
    echo "<td>" . $row['prodoctCountry'] . "</td>";
    if($row['state']==0){ echo "<td>" . "(".$row['state'].")" ."غیرفعال". "</td>";}
    elseif($row['state']==1){ echo "<td>" ."(".$row['state'].")"."فعال". "</td>";}
    else{ echo "<td>" . $row['state'] ."مشخص نشده". "</td>";}
    
    echo "<td>" . "<a href='update_prodoct?id=" . $row['ID'] . "'>ویرایش</a> 
   "."<span> | </span>"." <a href='delete_prodoct?id=" . $row['ID'] . "'>حذف</a>". "</td>";


    echo "
    </tr>
    ";

  }
} else {
  echo "هیچ رکوردی در دیتابیس موجود نیست.";
}
echo "</table>";
}else{
  include("search_prodoct.php");
}

echo "<a href='index.php'>صفحه اصلی</a>";

// قطع اتصال
mysqli_close($conn);

?>