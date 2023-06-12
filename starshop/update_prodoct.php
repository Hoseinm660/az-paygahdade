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
$username = "root";
$password = "";
$dbname = "starshop";

// ایجاد اتصال
$conn = mysqli_connect($servername, $username, $password, $dbname);

// بررسی اتصال
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "SELECT * FROM prodoct WHERE ID = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


?>

<form action="" method="post">
  
<label for="prodoctName">نام محصول:</label>
  <input type="text" id="prodoctName" name="prodoctName" value="<?php echo $row['prodoctName'] ?>"><br>

  <label for="prodoctType">نوع محصول:</label>
  <input type="text" id="prodoctType" name="prodoctType" value="<?php echo $row['prodoctType'] ?>"><br>

  <label for="descreption">توضیحات:</label>
  <input type="text" id="descreption" name="descreption" value="<?php echo $row['descreption'] ?>"><br>

  <label for="prodoctPrice">قیمت:</label>
  <input type="text" id="prodoctPrice" name="prodoctPrice" value="<?php echo $row['prodoctPrice'] ?>"><br>

  <label for="prodoctCountry">کشور:</label>
  <input type="text" id="prodoctCountry" name="prodoctCountry" value="<?php echo $row['prodoctCountry'] ?>"><br>

  <?php 
  if($row['state']==0)
  {
  ?>
  <label for="state">وضعیت محصول:</label>
  <select id="state" name="state">
  <option value="0"> غیر فعال </option>
    <option value="1">فعال </option> 
  </select>
  <?php
  }elseif($row['state']==1){
  ?>
  <label for="state">وضعیت محصول:</label>
  <select id="state" name="state">
    <option value="1">فعال </option> 
    <option value="0"> غیر فعال </option>
    
  </select>
  <?php
  }
  ?>

  

  

  <input type="submit" value="ثبت">
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


$sql = "UPDATE `prodoct`
SET `prodoctName`='$prodoctName',`prodoctType`='$prodoctType',`descreption`='$descreption',`prodoctPrice`='$prodoctPrice',`prodoctCountry`='$prodoctCountry',`state`=$state
WHERE ID = $id";


    
    if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'> window.alert('ویرایش مشخصات انجام شد'); </script>";
    echo "<script> location.replace('select_prodoct?id=$id'); </script>";
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