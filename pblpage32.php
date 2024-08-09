<?php 
$server = "localhost";
$database = "canteen";
$user = "root";
$password = "";

$flag=0;
if(isset($_POST["password"])){
    $pass=$_POST["password"];
    if($pass=='aditya'){
            $flag=1;
    }
    else{
        echo "enter the right password";
    }
}



if($flag==1){
            $conn = mysqli_connect($server, $user, $password, $database);
            if ($conn){

            }
            else{
                echo "Failed to connect";
            }

        if (isset($_POST['upload'])) {
            $foodname = $_POST["foodname"];
            $price = $_POST["price"];
            $img = $_FILES["img"]["name"];

            $q1 = "INSERT INTO `item` (`name`, `price`, `image`) VALUES ('$foodname', '$price', '$img')";
            $result = mysqli_query($conn, $q1);
        }

        if (isset($_POST['delete'])) {
            $foodId = $_POST['delete'];
            $q4 = "DELETE FROM `item` WHERE `id` = '$foodId'";
            $result1 = mysqli_query($conn, $q4);
        }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>menu</title>
    <style>
        
        body {
			font-family: Arial, sans-serif;
			background-color: #f8f8f8;
		}
		h1{
			text-align:center;
			text-transform: uppercase;
			font-family:Lucida Handwriting;
		}
        h3{
            text-align:center;
        }
        h4{
            text-align:center;
        }
        .grid-container {
            text-align:center;
            display:  grid;
            grid-template-columns: auto auto auto;
            padding: 40px;
            background: #8fb2ff;
            /* background-image: url('https://www.shutterstock.com/image-illustration/old-antique-vintage-paper-background-260nw-250538542.jpg'); */
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .center {
            margin-top: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .inputa{
            margin-top: 5px;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        [name="inputtext"]{
			font-size:20px;
			display:inline-block;
			background: MidnightBlue;
			color: lightblue;
			text-align:center;
			padding-left:5px;
			padding-right:5px;
			padding-top:3px;
			padding-bottom:3px;
			border-radius:8px;
		}
        [name="foodname"]{
            height: 35px;
            border-radius:8px;
            font-size:20px;
        }
        [name="price"]{
            height: 35px;
            border-radius:8px;
            font-size:20px;
        }
        [name="upload"]{
            height: 40px;
            width: 80px;
            text-align:center;
            font-size:20px;
            border-radius:8px;
            background: MidnightBlue;
			color: lightblue;
        }
        .foter{
            padding:20px;
            background:#bcd0f5;
        }
        [name="delete"]{
			border-radius:4px;
			font-size : 15px;
			margin-bottom:10px;
			background:red;
			color:yellow;
			/* padding-bottom:8px; */
		}
        [name="goback"]{
			border-radius:8px;
			font-size : 20px;
			margin:20px;
			background:red;
			color:yellow;
			padding-bottom:8px;
		}
    </style>
</head>
<body>
    <button onclick="window.location.href='pblpage14.php';" name="goback"><b>Log Out</b></button>
    <?php
    $q2 = "SELECT * FROM `item`";
    $result = mysqli_query($conn, $q2);
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="grid-container">
            <?php while ($food = mysqli_fetch_assoc($result)) { ?>
                <div class="center">
                        <img src="./images/<?php echo $food['image']; ?>" alt="<?php echo $food['name']; ?>" height="150" class="img-responsive">
                        <h3><?php echo $food['name']; ?></h3>
                        <h4>Rs.<?php echo $food['price']; ?> per plate</h4>
                    <button type="submit" id="<?php echo $food['id']; ?>" name="delete">Delete</button>
                    <input type="hidden" name="delete" value="<?php echo $food['id']; ?>">
                    <input type="hidden" name="password" value="aditya">
                </div>
            <?php } ?>
        </div>
    </form>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <div class="foter">
            <div class="inputa">
                <span name="inputtext">Item</span>
               
                <input type="text" name="foodname" id="foodname" ><br>
            </div>
            <div class="inputa">
                <span name="inputtext">Price:</span>
                <input type="number" name="price" id="price" value="0" min="10">
            </div>
            <div class="inputa">
                <input type="file" id="img" name="img" accept="image/*">
                <button type="submit" name="upload">Add</button>
                <input type="hidden" name="password" value="aditya">
            </div>
        </div>
    </form>
</body>
</html>
<?php
 }
 
else {
    echo "Password not set";
    exit;
}
?>
