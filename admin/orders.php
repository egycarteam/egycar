<?php
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "egycar";
    // Create connection
    $con = mysqli_connect($servername, $username,$password,$db );
    session_start();
    $admin_id_s = $_SESSION['admin_id'];
    if(!isset($_SESSION['admin_id']))
        header('LOCATION: ../index.php');
?>
<?php
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($con, "DELETE FROM orders WHERE o_id  ='$delete_id'");
     }
     if(isset($_GET['update'])){
        $update_id = $_GET['update'];
        $update = "UPDATE orders SET `o_status` = '1' WHERE o_id = '$update_id'";
        mysqli_query($con, $update );
    if(true){
        header('LOCATION: orders.php');
        
    }
     }
    if(true){
    // Get Data from Sql database
    $sql_sel_teacher = "SELECT * FROM admin WHERE admin_id = '$admin_id_s'";
    $res = mysqli_query($con, $sql_sel_teacher);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $admin_name     = $row['username'];
    }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title> الطلبات </title> 
</head>
<body dir="rtl">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/logo.png" alt="">
                </span>

                <div class="text logo-text">
                <span class="name"><?php echo $admin_name ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-left toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">الرئيسية</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="cars.php">
                            <i class='bx bx-car icon' ></i>
                            <span class="text nav-text">السيارات</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="orders.php">
                            <i class='bx bx-cart icon'></i>
                            <span class="text nav-text">الطلبات</span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                <a href="../logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">خروج</span>
                    </a>
                </li>



                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
    <div class="student-data">
            <h4> الاسم  : <span class="data-style">  <?php echo $admin_name ?> </span></h4>
            <h4> اللقب : <span class="data-style"> ايجي كار  </span></h4>
        </div>

        <table class="showquetion">
<thead >
    <th colspan="6" class="head-table"> الطلبات </th><br>
</thead>
<thead>
  <tr>
    <th>اسم العميل</th>
    <th>الرقم</th>
    <th>السياره</th>
    <th>الفرع</th>
    <th colspan="2" >النشاط</th>
  </tr>
  
<?php
if(true){
// Get Data from Sql database
$sql_sel = "SELECT * FROM orders WHERE o_status = 0 ";
$res = mysqli_query($con, $sql_sel);
//  loop to get all data 
while($row = mysqli_fetch_assoc($res)){
$id   = $row['o_id'];
$car_name  = $row['car_name'];
$car_type  = $row['car_type'];
$car_id = $row['car_id'];
$user_id = $row['user_id'];
$branch = $row['branch'];
$phone = $row['phone'];
$date = $row['date'];

$sql_sel_user = "SELECT * FROM users WHERE id = '$user_id' ";
$res_user = mysqli_query($con, $sql_sel_user);

while($row = mysqli_fetch_assoc($res_user)){
    $username  = $row['username'];
    $phone = $row['phone'];
    $adress = $row['adress'];


echo '<tr>';
echo '<td>'. $username .'</td>';
echo '<td>'. $phone .'</td>';
echo '<td>'. $car_name . ' '. $car_type . '</td>';
echo '<td>'. $branch .'</td>';
echo '<td><a style="color:green;" href="orders.php?update='.$id.'">تم التسليم</a></td>';
echo '<td><a style="color:red;" href="orders.php?delete='.$id.'">حذف</a></td>';
echo '</tr>';
}
}
} 
?>
      
      
      
  </tr>
</thead>
<tbody>    
</tbody>
</table>
</section>

<script>
      const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click" , () =>{
        sidebar.classList.toggle("close");
    })

    searchBtn.addEventListener("click" , () =>{
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");

    if(body.classList.contains("dark")){
        modeText.innerText = "الوضع النهاري";
    }else{
        modeText.innerText = "الوضع الليلي";
        
    }
});
    </script>
</body>
</html>