<?php
if(isset($_GET['search'])){
$search = $_GET['search'];
$sql = "SELECT * FROM user WHERE username LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
// چاپ خروجی

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
}



// قطع اتصال


?>