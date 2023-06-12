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
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
?>
<form action="" method="get">
    <input type="text" name="search" id="search" required placeholder="نام کاربر">
    <input type="submit" value="جستجو">
    <button onclick="window.location.href = 'select_users'">نمایش همه</button>
</form>
<?php
// چاپ خروجی
if(!isset($_GET['search'])){
if (mysqli_num_rows($result) > 0) {
    echo "
    <table border='solid 2px black'>
        <tr>
            <td>کد کاربر</td>
            <td>یوزر نیم</td>
            <td>پسورد</td>
            <td>نام</td>
            <td>نام خانوادگی</td>
            <td>شماره تلفن</td>
            <td> آدرس</td>
            <td>نوع دسترسی</td>
            <td>گزینه ها</td>
            
        </tr>
    ";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";

    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['firstName'] . "</td>";
    echo "<td>" . $row['lasName'] . "</td>";
    echo "<td>" . $row['phoneNumber'] . "</td>";
    echo "<td>" . $row['adress'] . "</td>";
    if($row['userType']==0){ echo "<td>" . "(".$row['userType'].")" ."عادی". "</td>";}
    elseif($row['userType']==1){ echo "<td>" ."(".$row['userType'].")"."ادمین". "</td>";}
    elseif($row['userType']==2){ echo "<td>" ."(".$row['userType'].")"."بن". "</td>";}
    else{ echo "<td>" . $row['userType'] ."مشخص نشده". "</td>";}

    echo "<td>" . "<a href='update_user?id=" . $row['ID'] . "'>ویرایش</a> 
    "."<span> | </span>"." <a href='delete_user?id=" . $row['ID'] . "'>حذف</a>". "</td>";
 

    
    


    echo "
    </tr>
    ";

  }
} else {
  echo "هیچ رکوردی در دیتابیس موجود نیست.";
}
echo "</table>";
}else{
  include("search_users.php");
}
echo "<a href='index.php'>صفحه اصلی</a>";

// قطع اتصال
mysqli_close($conn);

?>