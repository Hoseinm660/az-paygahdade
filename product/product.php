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
