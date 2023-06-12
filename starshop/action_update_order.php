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

$sql = "SELECT * FROM orders WHERE ID = $id";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

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


if($row['stat'] == 0){
    $sql = "UPDATE `orders` SET
    `stat` = 1
    WHERE `ID` = $id";
}else if ($row['stat'] == 1){
    $sql = "UPDATE `orders` SET
    `stat` = 0
    WHERE `ID` = $id";
}
    
    if(mysqli_query($conn, $sql)){
    echo "<script type='text/javascript'> window.alert('ویرایش مشخصات انجام شد'); </script>";
    echo "<script> location.replace('select_order?id=$id'); </script>";
    }else{
        echo "اشکال در ویرایش مشخصات" . mysqli_error($conn);
    }



// قطع اتصال
mysqli_close($conn);


?>
</body>
</html>