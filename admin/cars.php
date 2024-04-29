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
        header('LOCATION: ../../index.html');
?>
<?php
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
    <link rel="stylesheet" href="css/news.css">
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>اخر الاخبار</title> 
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
                        <a href="./orders.php">
                            <i class='bx bx-cart icon'></i>
                            <span class="text nav-text">الأشعارات</span>
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
       
        <!-- News -->
        <div class="news">
            <h1 class="header-news">السيارات</h1>
<?php
    // When click on login do this code
    if(true){
    // Get Data from Sql database
    $sql_sel_order = "SELECT * FROM cars";
    $res_news = mysqli_query($con, $sql_sel_order);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res_news)){
        //  get data in Variable s
        $order_id = $row['id'];
        $car_name = $row['car_name'];
        $model = $row['model'];
        $price = $row['price'];
        $img = $row['img'];
        $type = $row['type'];

        echo '<hr><br>';
        echo '<center>';
        echo '<img src="./img/'. $img .'" width="150" >';  
        echo '<br>';
        echo '<span class="time"> Car Name : '. $type  . ' '.$car_name.'</span>';
        echo '<span> | </span>';
        echo '<span class="date"> Model : '.$model.'</span>';
        echo '<br>';

        echo '<h3 class="article"> عن السياره : <br>'.$car_name.'</h3>';
        echo '</center>';
        echo '<br>';

    }
    }   
?>
        </div>
        </section>
        <!-- / News -->
    






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
