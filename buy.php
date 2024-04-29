<?php
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "egycar";

    // Create connection
    $con = mysqli_connect($servername, $username,$password,$db );

    session_start();
	$car_id = $_GET['carid'];
    if(isset($_SESSION['user_id'])){
		$sid =  $_SESSION['user_id'];
	}
	else
		header('LOCATION: include/login.php ');

?>


<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
        <!-- title of site -->
        <title>ايجي كار</title>
        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!--linear icon css-->
		<link rel="stylesheet" href="assets/css/linearicons.css">
        <!--flaticon.css-->
		<link rel="stylesheet" href="assets/css/flaticon.css">
		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- bootsnav -->
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <style>
            .buytxt
{
    width: 80%;
    border: 1px solid #000;
    padding: 10px;
    border-radius: 10px;
    margin: 10px;
}
.buybtn
{
    width: 30%;
    border: 1px solid #2288ff;
    padding: 10px;
    color: #2288ff;
    background-color: #2289ff33;
    border-radius: 10px;
    margin: 10px;
}

        </style>
    </head>
	
	<body dir="rtl">
	<?php     
	if(isset($_SESSION['user_id'])){
		echo '  
		<center>
		<a style="color: red ; margin :10px ; display:inline-block;  border: 1px solid; padding: 5px 20px;"  href="./logout.php">
		تسجيل خروج</a>
		<i class="fa-solid fa-phone" style="color: #2288ff ; padding :10px 30% 10px 10px; text-align:center;" > 01032807955 </i>  
		</center>
		'; 
	}
	else
	{
		echo '
		<center>
		<a style="color: #2288ff ; margin :10px ; display:inline-block;  border: 1px solid; padding: 5px 20px;"  href="./include/login.php">
		تسجيل</a>
		<i class="fa-solid fa-cart-shopping" style="color: #2288ff ;
		 padding :10px 30% 10px 10px; text-align:center; font-family: "Changa", sans-serif !important; " > اطلب دلوقتي وسيب الباقي علينا </i>  
		<i class="fa-solid fa-phone" style="color: #2288ff ; padding :10px 30% 10px 10px; text-align:center;" > 01032807955 </i>  
		</center>
		';
	}
	?>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
	
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <div class="container">

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="index.html"> ايجي كار <span></span></a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu" dir="rtl">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
									<li><a href="./contactus.html">تواصل معنا</a></li>
									<li class="scroll"><a href="#featured-cars">السيارات</a></li>
									<li><a href="./myorder.php">طلباتي</a></li>
									<li class="scroll"><a href="#service">الخدمات</a></li>
				                    <li><a href="./index.php">الرئيسيه</a></li>
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</div><!-- /.top-area-->
			<!-- top-area End -->

			<div class="container">
				<div class="welcome-hero-txt">
					<h2> اشتري دلوقتي والحق الخصومات  </h2>
					<p>
						ايجي كار عاملالك خصومات تصل الي 30% اشتري دلوقتي والحق الخصم
					</p>
					<button class="welcome-btn" onclick="window.location.href='./contactus.html'">تواصل معنا</button>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-12">



					</div>
				</div>
			</div>

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->


		</section><!--/.service-->
		<!--service end-->


		<!--featured-cars start -->
		<section id="featured-cars" class="featured-cars">
			<div class="container">
				<div class="section-header">
					<h2> شراء الان </h2>
				</div><!--/.section-header-->
				<div class="featured-cars-content">

				<?php
    // When click on login do this code
    if(true){
    // Get Data from Sql database
    $sql_sel_order = "SELECT * FROM cars where id = '$car_id' ";
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

        echo '
		<center>
		<div class="row">
		<div class="col">
			<div class="single-featured-cars">

				<div class="featured-img-box">
					<div class="featured-cars-img">
						<img src="admin/img/'. $img .'" width="200px" alt="cars">
					</div>
					<div class="featured-model-info">
						<p>
						model :  '. $model .'
						<span class="featured-hp-span">'. $power . 'HP</span>
						<br>
						<span class="featured-hp-span">color : red - green - blue   </span>
						 
					</p>
				</div>
			</div>

			<div class="featured-cars-txt">
				<h2><a href="#">'. $type .'  '. $car_name .'</a></h2>
				<h3>$'.$price.'</h3>

		';

    }
    }   
?>

                <form action="" method="post">
					<hr>
					<hr>
                    <h1>بيانات الشراء</h1><br>
                    <input type="text" placeholder="الاسم ثلاثي" required class="buytxt" name='nametxt' >
                    <input type="email" placeholder="البريد الالكتروني" required  class="buytxt" name='emailtxt'><br>
                    <input type="text" placeholder="رقم الهاتف" required name="phonetxt" class="buytxt">
                    <input type="hidden" value="<?php echo $type  ?>" name="typetxt" class="buytxt">
                    <input type="text" placeholder="العنوان" required name="addrtxt" class="buytxt"><br>
                    <select name="branch" id="" class="buytxt">
                        <option value="" selected disabled >فرع الاستلام</option>
                        <option value="دسوق">دسوق</option>
                        <option value="كفرالشيخ">كفرالشيخ</option>
                    </select><br>
					<select name="color" id="" class="buytxt">
                        <option value="" selected disabled >لون السياره</option>
                        <option value="red">احمر</option>
                        <option value="green">اخضر</option>
                        <option value="blue">ازرق</option>
                    </select><br>
                    <label for="">ملاحظات : </label><br>
                    <textarea name="notetxt" id="" cols="50" rows="10"  class="buytxt"></textarea>
                    <input type="submit" value="طلب السياره" name="btnbuy" class="buybtn"> 
                </form>
									
                                        </center>
										<?php
        if(isset($_POST['btnbuy'])){
        // get value from input
         $nametxt  =  $_POST['nametxt'];
         $typetxt  =  $_POST['typetxt'];
         $emailtxt  =  $_POST['emailtxt'];
         $phonetxt  =  $_POST['phonetxt'];
         $branch  =  $_POST['branch'];
         $notetxt   =  $_POST['notetxt'];
         $user_id   =  $_SESSION['user_id'] ;
         $color   =  $_POST['color'] ;

          // Check connection
          if ($con->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $sql = "INSERT INTO orders (car_name, car_type, car_id, branch, color , email , note,phone,user_id )
          VALUES ('$car_name', '$typetxt', '$car_id',  '$branch', '$color',  '$emailtxt', '$notetxt', '$phonetxt', '$user_id')";

          if ($con->query($sql) === TRUE) {
            header('location: myorder.php');
          }
          $con->close();

    }            
             ?>
								</div>
							</div>
						</div>
					<!-- buy card -->


						


					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.featured-cars-->
		<!--featured-cars end -->

	
		<!--contact start-->
		<footer id="contact"  class="contact">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col">
							<div class="single-footer-widget">
								<div class="footer-logo">
									<a href="index.html">ايجي كار </a>
								</div>
								<p>
								ايجي كار شركه مصريه 100% نشأت بالقاهره منذ عام 2001 نحن هنا ديما لمساعدتك لاختيار الافضل.
								</p>
								<div class="footer-contact">
									<p>info@egycar.com</p>
									<p>+2010000000</p>
								</div>
							</div>
						</div>
						
						

				</div>
				<div class="footer-copyright">
					<div class="row">
						<div class="col-sm-6">
							<p>
								&copy;
								<a href="./team.html">HIMIT Team Project</a>
								&copy;
							</p><!--/p-->
						</div>
						<div class="col-sm-6">
							<div class="footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>	
							</div>
						</div>
					</div>
				</div><!--/.footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.contact-->
		<!--contact end-->


		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
        
    </body>
	
</html>