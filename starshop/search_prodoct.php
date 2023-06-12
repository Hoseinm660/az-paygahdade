<?php
if(isset($_GET['search'])){
$search = $_GET['search'];
$sql = "SELECT * FROM prodoct WHERE prodoctName LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
// چاپ خروجی

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
}



// قطع اتصال


?>