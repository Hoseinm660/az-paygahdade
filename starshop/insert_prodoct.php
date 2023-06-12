<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
  
  <label for="prodoctName">نام محصول:</label>
  <input type="text" id="prodoctName" name="prodoctName"><br>

  <label for="prodoctType">نوع محصول:</label>
  <select id="prodoctType" name="prodoctType">
    <option value="10$">10 دلاری </option>
    <option value="20$"> 20 دلاری </option> 
    <option value="3mounth"> 3ماهه</option>
  </select><br>

  <label for="descreption">توضیحات</label>
  <textarea type="textarea" id="descreption" name="descreption"></textarea><br>

  <label for="prodoctPrice">قیمت</label>
  <input type="text" id="prodoctPrice" name="prodoctPrice"><br>

  <label for="prodoctCountry">کشور:</label>
  <input type="text" id="prodoctCountry" name="prodoctCountry"><br>

  <label for="state">وضعیت فعال بودن:</label>
  <select id="state" name="state">
    <option value="1">فعال </option>
    <option value="0"> غیر فعال </option> 
  </select>
  <br>

  <a href='index.php'>صفحه اصلی</a>
  <input type="submit" value="افزودن">
  
  
</form>

<?php

if (isset($_POST['prodoctName'])) {  
// اتصال به پایگاه داده
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "starshop";

// ایجاد اتصال
$conn = mysqli_connect($servername, $username, $password, $dbname);

// بررسی اتصال
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// دریافت اطلاعات از فرم HTML
$prodoctName = $_POST['prodoctName'];
$prodoctType = $_POST['prodoctType'];
$descreption = $_POST['descreption'];
$prodoctPrice = $_POST['prodoctPrice'];
$prodoctCountry = $_POST['prodoctCountry'];
$state=$_POST['state'];



// افزودن به جدول
$sql = "INSERT INTO `prodoct` ( prodoctName, `prodoctType`, descreption, prodoctPrice, prodoctCountry,`state`)
VALUES ('$prodoctName', '$prodoctType', '$descreption', '$prodoctPrice', '$prodoctCountry','$state')";

if(mysqli_query($conn, $sql)){
  echo "<script type='text/javascript'> window.alert('افزودن مشخصات انجام شد'); </script>";
  echo "<script> location.replace('select_prodoct?id=$id'); </script>";
  }else{
      echo "اشکال در ویرایش مشخصات" . mysqli_error($conn);
  }

// قطع اتصال
mysqli_close($conn);
}

?>

</body>
</html>