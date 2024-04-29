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
        header('LOCATION: ../../../index.php');
?>
<?php
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        mysqli_query($con, "DELETE FROM cars WHERE id  ='$delete_id'");
		header('LOCATION: showcar.php ');
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/inputstyle.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title> عرض السيارات </title> 
</head>
<body dir="rtl">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
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
                        <a href="../index.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">الرئيسية</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../cars.php">
                            <i class='bx bx-car icon' ></i>
                            <span class="text nav-text"> السيارات </span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../orders.php">
                            <i class='bx bx-cart icon'></i>
                            <span class="text nav-text">الطلبات</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                <a href="../../logout.php">
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
        <h4> اسم المستخدم  : <span class="data-style">  <?php echo $admin_name ?> </span></h4>
            <h4> شركة : <span class="data-style"> ايجي كار  </span></h4>
        </div>
<form action="" method="post">
        <table>
            <thead>
            <th colspan="6" class="head-table"> 
            <select name="typecar" id="" class="selection">
                        <option disabled selected>نوع السياره : </option>
                        <option value="forfour">smart forfour</option>
                        <option value="brabusforfour">smart brabus forfour</option>
                        <option value="brabustailor">smart brabus tailor</option>
                        <option value="brabusfotrwo">smart brabus fotrwo</option>
                        <option value="brabuscabrio">smart brabus cabrio</option>
                        <option value="brabuscabriotailor">smart  cabrio tailor </option>
                        <option value="teslamodel3">tesla model 3 </option>
                        <option value="chavyboltev">chavy bolt ev  </option>
                        <option value="audie-tronquattro">audi e-tron quattro </option>
                        <option value="a9e-tron">a9 e-tron</option>
                        <option value="mission e">mission e</option>
            </select>
            <br>
            <input type="submit" name="search" value='بحث ... ' >
            </th>
            </thead>
            <thead>
              <tr>
                  <th>النوع</th>
                <th>اسم السياره</th>
                <th>الموديل</th>
                <th>السعر</th>
                <th colspan="2" >النشاط</th>
              </tr>
              
<?php
if(isset($_POST['search'])){

    $typecar = $_POST['typecar'];

    $sql_sel = "SELECT * FROM cars WHERE type ='$typecar' ";
    $res = mysqli_query($con, $sql_sel);

    while($row = mysqli_fetch_assoc($res)){

        $id  = $row['id'];
        $car_name = $row['car_name'];
        $model = $row['model'];
        $price = $row['price'];
        $type = $row['type'];


        echo '<tr>';
        echo '<td>'. $type .'</td>';
        echo '<td>'. $car_name .'</td>';
        echo '<td>'. $model .'</td>';
        echo '<td>'. $price .'</td>';
        echo '<td><a href="editcar.php?edit='.$id.'">تعديل</a></td>';
        echo '<td><a style="color:red;" href="showcar.php?delete='.$id.'">حذف</a></td>';
        echo '</tr>';

    }

    } 
?>
                  
                  
                  
              </tr>
            </thead>
    </table>    
    </form>
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