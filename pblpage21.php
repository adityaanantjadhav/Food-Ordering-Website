<?php

    $server="localhost";
    $database="canteen";
    $username="root";
    $password="";

    $conn= mysqli_connect($server,$username,$password,$database);
	$q1="SELECT * FROM `item`";
    $result= mysqli_query($conn,$q1); 

        $items = array();
		$id= array();
        $price= array();
        $quantity=array();
        $totalprice=0;
        $x = 0;

	while($food=mysqli_fetch_assoc($result)){
		if(isset($_GET[$food['id']])){
			$id[$x]=$food['id'];
            $price[$x]=$food['price'];
            $items[$x] = $food['name'];
            $x++;
        }
	}
        $arrlength = count($items);
    ?>

<?php
$telegram_api_token = "5965358748:AAHepoeoFi9TuxWU2CJvzE9GBxLuhdi0kIE";
$telegram_chat_id = "-1001689047912";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  	if(isset($_POST["name"])){

    	$name = $_POST["name"];

	}else{

		$name = "0";

	}
    for($r = 0; $r < $arrlength; $r++) {
		if(isset($_POST[$id[$r]])){

			$quantity[$r] = $_POST[$id[$r]];
			//$totalprice= $quantity[$r]*$price[$r]+$totalprice;
		}else{

			$quantity[$r]= "0";

		}
	}	
	
	$message = "New order received:\n\n"
			. "Name: $name\n";


	for($s = 0; $s < $arrlength; $s++) {
		$message = $message."$items[$s]:$quantity[$s]\n";
	}

	
	$telegram_url = "https://api.telegram.org/bot$telegram_api_token/sendMessage";
	$telegram_params = [
		"chat_id" => $telegram_chat_id,
		"text" => $message
	];
	$telegram_query = http_build_query($telegram_params);
	$telegram_response = file_get_contents("$telegram_url?$telegram_query");

	$telegram_data = json_decode($telegram_response, true);
	if ($telegram_data["ok"]) {
		echo "Your order has been received. We will contact you shortly.";
	} else {
		echo "There was an error sending your order. Please try again later.";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<?php error_reporting(0); ?> 
<head>
    <meta charset="UTF-8">
    <title>Canteen Ordering System</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <meta http-equiv="X-UA-Compatible"
        content="IE=edge">
    <meta name="viewport" content=
	"width=device-width, initial-scale=1.0">
		<link href=
	"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
			rel="stylesheet" integrity=
	"sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
			crossorigin="anonymous">    
    <style>


        @import "../node_modules/bootstrap/scss/bootstrap";

		h1{
			display:inline-block;
			border-radius:20px;
			color:MidnightBlue ;
			margin-top:10px;
            text-align: center;
			padding-left:15px;
			padding-right:15px;
			padding-top:10px;
			padding-bottom:10px;
  			background: lightblue;
		}
        
		.titl{
            text-align: center;
		}
        .table {
            text-align:center;
        }
		.price{
			font-size:25px;
		}
		.item{
			font-size:25px;
		}
		.headi{
			color:lightblue;
			background-color:darkblue;
			font-size:20px;
		}
		.row1{
			background-color:LightSkyBlue;
			color:DarkBlue ;
		}
		.row2{
			background-color:DeepSkyBlue;
			color:DarkBlue ;
		}
		.entries{
			font-size:20px;
			width:100px;
			background-color:lightblue ;
			color:Maroon ;
			border-radius:10px;
			border-color:DeepSkyBlue
		}
		.inputgroup{
			
			text-align:center;
			padding-top:10px;
			padding-bottom:8px;
			background:lightblue;
		}
		[name="nameinput"]{
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
		[name="name"]{
			border-radius:8px;
			height:37px;
		}
		.col-12{
			text-align:center;
			background:lightblue;
			padding-bottom:8px;
		}
		.col-13{
			
			text-align:left;
			color:yellow;
			padding-bottom:8px;
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
	<button onclick="window.location.href='pblpage14.php';" name="goback"><b>Go Back</b></button>
	<div class="titl"> 
    <h1>CANTEEN ORDERING SYSTEM</h1></div>
	<form action="" method="post">
	<table class="table">
		<thead>
			<tr class="headi">
                <!-- <th>image</th> -->
				<th><b>Item</b></th>
				<th><b>Price</b></th>
				<th><b>Quantity</b></th>
			</tr>
		</thead>
		<tbody>
            <?php
                    for($p = 0; $p < $arrlength; $p++) {?>
                        <tr class="row1">
                            <td>
                                <p class="item"><?php echo $items[$p];?></p>
                            </td>
                            <td><p class="price">Rs.<?php echo $price[$p];?></p></td>
                            <td><span class="entries"><input type="number" name="<?php echo $id[$p];?>" value="1" min="0" max="5"></span></td>
                        </tr>
                    <?php }
                ?>
		</tbody>
	</table>
	
		<div class="inputgroup">
			<span name="nameinput" >Name</span>
			<input type="text" name="name" required><br>
		</div>
		<div class="col-12">
    		<button type="submit" class="btn btn-primary" onclick="placeOrder()">ORDER</button>
  		</div>
		<script>
			function placeOrder() {
				let order = {};
				let items = document.getElementsByTagName('input');
				for (let i = 0; i < items.length; i++) {
					if (items[i].type === 'number' && items[i].value > 0) {
						order[items[i].name] = items[i].value;
					}
				}
				if (Object.keys(order).length === 0) {
					alert('Please enter at least one item quantity.');
				} else {
					console.log(order);
					alert('Order placed. Your total bill is:' );
				}
			}
		</script>
	</form>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
