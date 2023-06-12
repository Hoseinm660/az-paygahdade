<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php



$servername = "localhost";
$usernamee = "root";
$password = "";
$dbname = "starshop";

// ایجاد اتصال
$conn = mysqli_connect($servername, $usernamee, $password, $dbname);

// بررسی اتصال
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "SELECT * FROM user WHERE ID = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


?>

<form action="" method="post">
  
<label for="username"> username:</label>
  <input type="text" id="username" name="username" value="<?php echo $row['username'] ?>"><br>

  <label for="passwords"> password:</label>
  <input type="text" id="passwords" name="passwords" value="<?php echo $row['password'] ?>"><br>

  <label for="firstName">نام:</label>
  <input type="text" id="firstName" name="firstName" value="<?php echo $row['firstName'] ?>"><br>

  <label for="lasName">نام خانوادگی:</label>
  <input type="text" id="lasName" name="lasName" value="<?php echo $row['lasName'] ?>"><br>

  <label for="phoneNumber">شماره تلفن:</label>
  <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $row['phoneNumber'] ?>"><br>

  <label for="adress"> آدرس:</label>
  <input type="text" id="adress" name="adress" value="<?php echo $row['adress'] ?>"><br>

  <!-- <label for="userType"> نوع کاربر:</label> -->
  <!-- <input type="text" id="userType" name="userType" value=""><br> -->
  <!-- <label for="adress">وضعیت دسترسی:</label>
  <select valuee="<?php echo $row['userType'] ?>"id="userType" name="userType">
  <option value="0"> عادی </option>
    <option value="1">ادمین </option> 
    <option value="2"> بن </option>x`
  </select> -->
  <?php 
  if($row['userType']==0)
  {
  ?>
  <label for="adress">وضعیت دسترسی:</label>
  <select id="userType" name="userType">
  <option value="0"> عادی </option>
    <option value="1">ادمین </option> 
    <option value="2"> بن </option>
  </select>
  <?php
  }elseif($row['userType']==1){
  ?>
  <label for="adress">وضعیت دسترسی:</label>
  <select id="userType" name="userType">
    <option value="1">ادمین </option> 
    <option value="0"> عادی </option>
    <option value="2"> بن </option>
  </select>
  <?php
  }elseif($row['userType']==2){
    ?>
    <label for="adress">وضعیت دسترسی:</label>
    <select id="userType" name="userType">
      <option value="2"> بن </option>
      <option value="0"> عادی </option>
      <option value="1">ادمین </option> 
    </select>
    <?php
    }
    ?>
  
  
  
  

  

<?php



?>

  

  <input type="submit" value="ثبت">
</form>

<?php

if (isset($_POST['firstName'])) {
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
$usernames = $_POST['username'];
$passwords = $_POST['passwords'];
$firstName = $_POST['firstName'];
$lasName = $_POST['lasName'];
$phoneNumber = $_POST['phoneNumber'];
$adress = $_POST['adress'];
$userType=$_POST['userType'];


$sql = "UPDATE `user`
SET `username`='$usernames',`password`='$passwords',`firstName`='$firstName',`lasName`='$lasName',`phoneNumber`='$phoneNumber',`adress`='$adress',`userType`='$userType'
WHERE ID = $id";


    
    if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'> window.alert('ویرایش مشخصات انجام شد'); </script>";
    echo "<script> location.replace('select_users?id=$id'); </script>";
    }else{
        echo "اشکال در ویرایش مشخصات" . mysqli_error($conn);
    }


} else {
 
}

// قطع اتصال
mysqli_close($conn);


?>
</body>
</html>