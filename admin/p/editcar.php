<?php
    ob_start();

    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "egycar";
    // Create connection
    $con = mysqli_connect($servername, $username,$password,$db );
    
    session_start();
    $admin_id_s = $_SESSION['admin_id'];
    $stucent_id_edit = $_GET['edit']; 
    if(!isset($_SESSION['admin_id']))
        header('LOCATION: ../../../index.html');
?>
<?php
    if(isset($_GET['edit'])){
        $stucent_id_edit = $_GET['edit']; 
    }else{
        header('LOCATION: ../index.php');
    }
    if(true){
    // Get Data from Sql database
    $sql_sel_teacher = "SELECT * FROM admin WHERE admin_id = '$admin_id_s'";
    $res = mysqli_query($con, $sql_sel_teacher);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res)){
        $admin_name    = $row['username'];
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
<title> تعديل سياره </title> 
<style>
    .showquetion{
        position: absolute;
        bottom: -135%;
        right: 5%;
        width: 90%;
        margin: auto;
        box-shadow: 0 10px 25px rgb(144 163 179 / 20%);
        border-spacing: 0;
}
</style>
</head>
<body dir="rtl">
<nav class="sidebar close">
    <header>
        <div class="image-text">
            <span class="image">
                <img src="../img/logo.png" alt="">
            </span>

            <div class="text logo-text">
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
                        <span class="text nav-text">السيارات</span>
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
<form method="post">
<div class="addexam">
        <center>
        <?php
if(true){
// Get Data from Sql database
$sql_sel = "SELECT * FROM cars WHERE id = '$stucent_id_edit'";
$res = mysqli_query($con, $sql_sel);
//  loop to get all data 
while($row = mysqli_fetch_assoc($res)){
    $id  = $row['id'];
    $car_name = $row['car_name'];
    $model = $row['model'];
    $price = $row['price'];
    $type = $row['type'];
    $power  = $row['power'];
}
} 
?>
        <label for="">تعديل بيانات سياره : </label><br>
        <input type="text" placeholder="اسم السياره" name="fname" value="<?php echo $car_name?>" >
        <input type="text" placeholder="سنة الاصدار" name="lname" value="<?php echo $model?>" >
        <input type="text" placeholder="السعر" name="nidtext" value="<?php echo $price?>" >
        <input type="text" placeholder="" name="phtext" value="<?php echo $power?>" >

        <select name="typecar" id="" class="selection" >
            <option  style="display: none;" >نوع السياره : </option>
            <option value="hundi">hundi</option>
            <option value="BMW">BMW</option>
            <option value="MG">MG</option>
            <option value="KIA">KIA</option>
        </select>
        <br>    
        <input type="submit" value="تعديل" name="editstudentbtn">
        </center>
        <br>
    </div>

<?php
if(isset($_POST['editstudentbtn'])){
    $fname  = $_POST['fname'];

    $sntext = $_POST['sntext'];
    $phtext = $_POST['phtext'];
    $department = $_POST['department'];
    $band = $_POST['band'];

$update = "UPDATE student SET `f_name`='$fname',`l_name`='$lname',`sn_id`='$nidtext',`snumber`='$sntext',`department`='$department',`band`='$band',`dateofbirth`='$dateofbirth',`phone`='$phtext' WHERE st_id = '$stucent_id_edit'";
mysqli_query($con, $update);

header('LOCATION: editstudent.php?edit='.$stucent_id_edit.'');
}
?>
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