<?php 
	ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "egycar";

    // Create connection
    $con = mysqli_connect($servername, $username,$password,$db );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Egy Car</title>
	<!-- link to css  -->
	<link rel="stylesheet" href="./page/css/style.css">
	<!-- box icon  -->
	<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>
<body>
	<!-- navbar -->
	<header>
		<div class="nav-container">
			<!-- logo -->
			<a href="index.html" class="logo"><i class='bx bx-car'></i>EgyCar</a>
			<!-- menu icon -->
			<input type="checkbox" name="" id="menu">
			<label for="menu" i class='bx bx-menu'  id="menu-icon"></i></label>
			<!-- nav list -->
			<ul class="navbar" dir="rtl">
				<li><a href="./index.php">الرئيسيه</a></li>
				<li><a href="#sales">الخدمات</a></li>
				<li><a href="./myorder.php">طلباتي</a></li>
				<li><a href="./contactus.html">تواصل معنا</a></li>
			</ul>
			<!-- log in button  -->
			
			<?php     
    session_start();

	if(isset($_SESSION['user_id'])){
		echo '  
		<a href="./logout.php"  style=" background-color: tomato;"   class="btn">خروج</a>
		'; 
	}
	else
	{
		echo '
		<a href="./include/login.php"class="btn">دخول</a>
		';
	}
	?>

		</div>
	</header>
	<!-- home  -->
	<section class="home-container" id="home">
		<div class="home-text">

		<form action="page/search.php" class="m-5" >
		<div class="input-group flex-wrap" dir="rtl" >
			<input type="text" style="    width: 80%;
    padding: 8px;
    margin: 15px;
    background: #ffffffc4;
    border: 0;
    border-radius: 9px;
	outline: none;" id="search" class="form-control" placeholder="ابحث عن السياره من هنا بالسعر او اللون او الاسم ..." 
			aria-label="Username" aria-describedby="addon-wrapping" name="search">
			<input type="submit" value="بحث" class="btn btn-info" >
		</div>
			</form>
			<h1> ابحث عن   السياره  المثاليه لك  ولعائلتك
			</h1>
			<?php     
	if(isset($_SESSION['user_id'])){
		echo '  
		<a href="#cars" class="btn-signup"> اشتري</a>		'; 
	}
	else
	{
		echo '
		<a href="./include/signup.php" class="btn-signup">سجل دلوقت</a>
		';
	}
	?>
		
		</div>
	</section>
	<!-- about  -->
	<section class="about-container" id="about">
		<div class="about-img">
			<img src="./page/imgs/12.jpg" alt="c200 2024">
		</div>
		<div class="about-text">
			<span>عننا</span>
			<h2>نحن نقدم <br>  لك أفضل <br> السيارات</h2>
			<p>
				<br> يسعدنا ان نقدم لكم  <br>هذه السيارات ونحن نقدم <br> لكم اجمل انواع السيارات  <br> والجديده وباحسن الاسعار </p>
				<a href="#cars" class="btn">اشتري</a>
		</div>
	</section>
	<!-- sales  -->
	<section class="sales-container" id="sales">
		
		<!-- box 1  -->
		<div class="box">
			<i class='bx bx-user' ></i>
			<h3>make your dream True <br> اجعل حلمك حقيقة</h3>
			<p>Take the opportunity and buy your dream car <br> انتهز الفرصه واشتري سيارت احلامك </p>
		</div>

		<!-- box 2  -->
		<div class="box">
			<i class='bx bx-desktop' ></i>
			<h3>Start Your Membership <br> ابدأ عضويتك</h3>
			<p>Start your membership  <br> with us and become <br>  a member of our family <br> ابدا بعضويتك معنا وكن فردا من عائلتنا 
			</p>
		</div>

		<!-- box 3  -->
		<div class="box">
			<i class='bx bxs-car' ></i>
			<h3>Enjoy Your New Car <br> استمتع بسيارتك الجديدة</h3>
			<p>We are pleased to see you enjoying your new cars <br> يسرنا ان نراكم مستمتعين بسياراتكم الجديده</p>
		</div>
	</section>
	<!-- properties  -->
	<section class="properties-contaier" id="properties">
		<div class="heading">
			<span>جديد </span>
			<h2> سياراتنا </h2>
			</p>
		</div>

		<div class="properties-container" id="cars" >
		<?php 
    if(true){
    // Get Data from Sql database
    $sql_sel_order = "SELECT * FROM cars";
    $res_news = mysqli_query($con, $sql_sel_order);
    //  loop to get all data 
    while($row = mysqli_fetch_assoc($res_news)){
        //  get data in Variable s
        $car_id = $row['id'];
        $car_name = $row['car_name'];
        $model = $row['model'];
        $price = $row['price'];
        $img = $row['img'];
        $type = $row['type'];
        $power = $row['power'];
        $color = $row['color'];

		echo 
		'
		
			<div class="box">
			<img src="admin/img/'. $img .'" alt="cars">

				<h3>$'. $price .'</h3>
				<div class="content">
					<div class="text">
						<h3> '. $type . $model .'	</h3>
			<br>
 
						<span class="featured-hp-span">'. $power . 'HP</span>
			<br>
			 
						<span class="featured-hp-span">Color : '. $color . '</span>
			<br>
						<a href="./buy.php?carid='. $car_id . '" >اشتري</a>
					</div>
				</div>
			</div>
		
		';

		 }
		}

		?>
			<!-- box 1  -->





		</div>
	</section>
	<!-- news letter -->
	<section class="newletter contaiher">
		<h2>
			ضع سؤالًا في الاعتبار  <br> دعنا نساعدك</h2>
			<form action="">
				<input type="email" name="" id="email-box" placeholder="yourmail@gmail.com" required>
				<input type="submit" value="send" class="btn">
			</form>
	</section>
	<!-- footer  -->
	<section class="footer">
		<div class="footer-container container">
			
			<div class="footer-box">
				<h3>Quick Links</h3>
				<a href="#">Agency</a>
				<a href="#">Cars</a>
				<a href="#">Rates</a>
			</div>

			<div class="footer-box">
				<h3>Locations</h3>
				<a href="#">Cairo</a>
				<a href="#">Dubay</a>
				<a href="#">Alex</a>

			</div>

			<div class="footer-box">
				<h3>Contace</h3>
				<a href="#">+20100101010</a>
				<a href="#">egycar@gmail.com</a>
				<div class="social">
					<a href="#"><i class='bx bxl-facebook-circle' ></i></a>
					<a href="#"><i class='bx bxl-instagram-alt' ></i></a>
					<a href="#"><i class='bx bxl-whatsapp-square' ></i></a>
				</div>
			</div>
		</div>
	</section>
	<!-- copyright -->
	<div class="copyright">
		<p><a href="./team.html">© EgyCar Team Project</a></p>
	</div>
</body>
</html>