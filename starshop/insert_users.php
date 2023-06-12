<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
  
  <label for="username">username:</label>
  <input type="text" id="username" name="username"><br>

  <label for="passwords">password:</label>
  <input type="password" id="passwords" name="passwords"><br>

  <label for="firstName">نام</label>
  <input type="text" id="firstName" name="firstName"><br>

  <label for="lasName">نام خانوادگی</label>
  <input type="text" id="lasName" name="lasName"><br>

  <label for="phone">شماره:</label>
  <input type="text" id="phone" name="phone"><br>

  <label for="adress">آدرس:</label>
  <input type="text" id="adress" name="adress"><br>

  <label for="userType">وضعیت دسترسی:</label>
  <select id="userType" name="userType">
    <option value="1">ادمین </option>
    <option value="0"> عادی </option> 
    <option value="2"> بن </option>
  </select>
  <br>
  

  
  <a href='index.php'>صفحه اصلی</a>
  <input type="submit" value="افزودن">
  
  
</form>

<?php

if (isset($_POST['username'])) {  
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
$usersname = $_POST['username'];
$passwords = $_POST['passwords'];
$firstName = $_POST['firstName'];
$lasName = $_POST['lasName'];
$phone = $_POST['phone'];
$adress = $_POST['adress'];
$userType=$_POST['userType'];


// افزودن به جدول
$sql = "INSERT INTO `user` ( username, `password`, firstName, lasName, phoneNumber, adress, userType)
VALUES ('$usersname', '$passwords', '$firstName', '$lasName', '$phone', '$adress','$userType')";

if(mysqli_query($conn, $sql)){
  echo "<script type='text/javascript'> window.alert('افزودن مشخصات انجام شد'); </script>";
  echo "<script> location.replace('select_users?id=$id'); </script>";
  }else{
      echo "اشکال در ویرایش مشخصات" . mysqli_error($conn);
  }

// قطع اتصال
mysqli_close($conn);
}

?>

</body>
</html>