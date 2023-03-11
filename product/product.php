<?php
// برقراری اتصال به دیتابیس MySQL
$con = mysqli_connect("localhost","username","password","database_name");

// در صورت بروز خطا، پیغام خطا را چاپ کنید
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// دریافت اطلاعات فرم و ذخیره آنها در دیتابیس
if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  $sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$description')";

  mysqli_query($con, $sql);
}

// بازیابی اطلاعات محصولات از دیتابیس و نمایش آنها
$sql = "SELECT * FROM products";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>محصولات</title>
</head>
<body>
  <!-- فرم ایجاد محصولات -->
  <h2>ایجاد محصولات</h2>
  <form method="POST" action="">
    <label>نام محصول:</label>
    <input type="text" name="name"><br><br>

    <label>قیمت:</label>
    <input type="text" name="price"><br><br>

    <label>توضیحات:</label>
    <textarea name="description"></textarea><br><br>

    <button type="submit" name="submit">ذخیره</button>
  </form>

  <hr>

  <!-- لیست محصولات -->
  <h2>لیست محصولات</h2>
  <table>
    <tr>
      <th>نام محصول</th>
      <th>قیمت</th>
      <th>توضیحات</th>
    </tr>

    <?php while($row = mysqli_fetch_array($result)):?>
      <tr>
        <td><?=$row['name']?></td>
        <td><?=$row['price']?> تومان</td>
        <td><?=$row['description']?></td>
      </tr>
    <?php endwhile;?>
  </table>

</body>
</html>

این کد شامل فرم ایجاد محصولات است که با استفاده از دستور INSERT INTO به دیتابیس اضافه می شود. همچنین اطلاعات موجود در دیتابیس با استفاده از دستور SELECT بازیابی شده و در صفحه لیست محصولات نمایش داده می شود.

لطفا این کد را با دیتابیس خود تنظیم کنید و به شرط اتصال درست به دیتابیس، باید بتوانید محصولات جدید را ایجاد کنید و لیست محصولات موجود را مشاهده کنید.



$sql = "SELECT * FROM products"; 
این کد چیکار میکنه

این کد یک دستور SELECT برای بازیابی اطلاعات محصولات از جدول products ایجاد می‌کند. * در این کد به معنی تمامی ستون‌ها است. یعنی با استفاده از این دستور SELECT، تمامی ستون‌های موجود در جدول products بازیابی خواهند شد.

در واقع، این دستور برای بازیابی اطلاعات از دیتابیس استفاده می‌شود و در این کد، به منظور بازیابی اطلاعات محصولات از جدول products استفاده می‌شود.



مرسی عزیزم

خواهش می‌کنم. همیشه آماده کمک به شما هستم. در صورت داشتن سوال یا مشکل دیگر، خوشحال می‌شوم که به شما کمک کنم.




