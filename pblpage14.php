<?php 
	$servername="localhost";
	$username="root";
	$password="";
	$database="canteen";     //name of database already created
	

	$conn= mysqli_connect($servername,$username,$password,$database);
	if($conn){
		
	}
	else{
		echo "failed";
	}
    $sql= "SELECT * FROM `item`";
    $result= mysqli_query($conn,$sql);

    $num= mysqli_num_rows($result);
?>



<!DOCTYPE html>
<html>
<head>
	<title>AADA CATERING SERVICES | IsquareIT Pune</title>
	<style>
		
		body {
			font-family: Arial, sans-serif;
			background-color: rgb(197, 248, 217) ;
		}
		h1{
			padding:15px;
			text-align:center;
			text-transform: uppercase;
			font-family:Lucida Handwriting;
			/* background-color:rgb(1, 1, 74); */
			background-color:rgb(49, 31, 100)	;
			margin-bottom:10px;
			color:white;
		}
		
		.slider {
			background-image: url('https://www.shutterstock.com/image-photo/blur-restaurant-cafe-interior-background-260nw-598319711.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			padding-bottom:20px;
		}
		.a {
			display: inline-block;
			font-size: 24px;
			cursor: pointer;
			text-align: center;
			text-decoration: none;
			outline: none;
			color: yellow;
			background-color: #4CAF50;
			border: 2px solid darkgreen;
			border-radius: 15px;
			margin-left: 43%;
		}

		.a:hover {background-color: #3e8e41}

		.a:active {
			background-color: #3e8e41;
			transform: translateY(4px);
		}
		.b {
			color: white;
			display: inline-block;
			font-size: 24px;
			cursor: pointer;
			text-align: center;
			text-decoration: none;
			outline: none;
			color: #fff;
			background-color: #4CAF50;
			border: 2px solid darkgreen;
			border-radius: 15px;
		}

		.b:hover {background-color: #3e8e41}

		.b:active {
			background-color: #3e8e41;
			transform: translateY(4px);
		}
		.c {
			background-image: url('https://t4.ftcdn.net/jpg/05/62/17/79/360_F_562177976_dH3SgNcJBPjkvonJIyBvemkNCvPfOEKB.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			text-align:center;
			text-transform: uppercase;
			font-family:Lucida Handwriting;
			color:white;
			background-color: green;
			padding: 5px;
						
		}
		.grid-container {
			display:  grid;
			grid-template-columns: auto auto auto;
			padding: 25px 25px 25px 80px;
			background-image: url('https://thumbs.dreamstime.com/b/%CE%BA%CE%B1%CF%84%CE%AC%CE%BB%CE%BF%CE%B3%CE%BF%CF%82-%CE%B5%CF%80%CE%B9%CE%BB%CE%BF%CE%B3%CE%AE%CF%82-%CE%B1%CE%BD%CE%B1%CF%83%CE%BA%CF%8C%CF%80%CE%B7%CF%83%CE%B7%CF%82-25233558.jpg');
			/* background-image: url("https://cdn.vectorstock.com/i/1000x1000/86/66/background-for-menu-vector-908666.webp"); */
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;

		}

		.grid-item {
			background-color: rgba(255, 255, 255, 0.8);
			border: 1px solid rgba(0, 0, 0, 0.8);
			padding: 20px;
			font-size: 30px;
			text-align: center;
		}
		.header{
			text-align:center;
			/* background-image: url('https://www.shutterstock.com/image-illustration/website-internet-contact-us-icons-260nw-761250151.jpg'); */
			background-image: url('https://img.freepik.com/premium-photo/website-internet-contact-us-page-concept-with-phone-chat-email-icons-symbol-telephone-mail-mobile-phone-website-page-contact-us-wide-web-banner-copy-space-blue-background_256259-2730.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		
		.banner-top, .banner-top1 {
			padding: 10px 0;
			text-align: center;
		}
		
		h3 {
			font-size: 30px;
			margin-bottom: 20px;
			text-transform: uppercase;
			font-family:Lucida Handwriting;
		}

		.banner-top span, .banner-top1 span {
			color: #ed1c24;
		}
		
		p {
			font-size: 18px;
			line-height: 1.5;
			margin-bottom: 15px;
			margin-top: 0;
			padding: 0 15px;
			font-family:Lucida Handwriting;
		}
		
		.scroll {
			padding: 10px 20px;
			border-radius: 5px;
			text-decoration: none;
			margin-top: 15px;
			display: inline-block;
			font-size: 20px;
			transition: background-color 0.3s ease-in-out;
		}
		.about {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 400px;
			margin-bottom: 20px;
			
			background-size: cover;
			background-position: center;
			position: relative;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		}
		
		.about:before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			z-index: -1;
		}
		
		.about h3 {
			color: #fff;
			font-size: 36px;
			font-weight: bold;
			margin-bottom: 0;
		}
		
		.about-right_agileits {
			
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
			padding: 40px;
			margin-left: 20px;
			width: 50%;
			text-align: justify;
		}
		
		.about-right_agileits h3 {
			font-size: 32px;
			margin-bottom: 20
        }

		.rep-text1{
				text-align: center;
				box-sizing: border-box; 
				float: left;
				width: 33%;
				padding:5px;
				padding-left: 6%;
		}
		.grid-container img {
			transition: all 0.2s ease-in;
		}

		.grid-container img:hover {
			transform: scale(1.1);
		}

		.addtocart{
				font-size:larger;
				text-align:center;
				color:white;
				background-color: rgb(1, 1, 74); 
				padding:15px;

		}
		.btn{
			padding: 15px;
			background-color: lightblue;
		}   
		
		[name="login"]{
			padding: 10px 20px 10px 20px;
			background-color: #4CAF50;
			border: 2px solid darkgreen;
			font-size: 20px;
			border-radius:7px;
			margin-left:230px;
		}
		
		</style>


</head>

<body>
					
<div class="slider">
<div class=heading>
<h1>International Institute of Information Technology, Hinjewadi</h1>
</div>

<div class="banner-top">
<h3>Come hungry. <span>Leave</span> happy.</h3>
<p>Small change,Big differences.</p>
</div>

<div class="banner-top1">
<h3>Better Ingredients. <span> Better</span> Food.</h3>
<p>Small change,Big differences.</p>
</div>
<div class="a">
<a href="#menu" class="scroll"><b>Menu</b><i class="fa fa-caret-right" aria-hidden="true"></i></a>
</div>
<div class="b">
<a href="#cd" class="scroll"><b>Contact</b><i class="fa fa-caret-right" aria-hidden="true"></i></a>
</div>
<button onclick="window.location.href='pbllogin.php';" name="login" ><b>Login</b></button>
</div>

<div class="c" id="about_one">
<h3>MENU</h3>
<br>
</div>

<div class="menu" id="menu"></div>


<form action="pblpage21.php" method="GET">
<div class="grid-container">
	<?php while($food = mysqli_fetch_assoc($result)){?>
	<div class="grid-item1">
		<label for="<?php echo $food['id'] ?>">
		<img src="./images/<?php echo $food['image'];?>" alt="<?php echo $food['name']; ?>" height="150" class="img-responsive">
		<h3><?php echo $food['name'] ?></h3>
		<h4>Rs.<?php echo $food['price'];?> per plate</h4></label>
		<input type="checkbox" id="<?php echo $food['id'] ?>" name="<?php echo $food['id'] ?>" value="<?php echo $food['id'] ?>">
	</div>
	<?php } ?>
</div>
<div class="btn">
	<button type="submit" class="addtocart" ><b>Add to Cart</b></button>
</div>
</form>

				
					

<div class="mail" id="cd"></div>
<div class="header">
<h3>Contact Us</h3>

<h5>Contact Info</h5>


<h4>Visit us</h4>
<p>IsquareIT Campus</p>


<h4>Mail us</h4>
<p><a href="mailto:info@example.com">info@IsquareIT.com</a></p>

<h4>Call us</h4>
<p>Phone: +91 20 2293 3441/2/3<br>
Fax: +91 20 2293 4191</p>


<h4>Work hours</h4>
<p>24 X 7</p>
</div>
</div>	

</body>

</html>