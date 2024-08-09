

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url("https://images.pexels.com/photos/326281/pexels-photo-326281.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2");
            height: 580px;
            background-position: center; 
             background-repeat: no-repeat;
            background-size: cover;
            /* position: relative; */
        }
        .container{
            position: fixed;
            border-radius: 4px;
            margin:140px 25px 120px 550px; 
            width:44%;
            padding:20px;
            color:rgb(248, 247, 246);
            background-color:#471f0e;
            box-shadow: 10px 9px 5px rgb(61, 30, 17);
        }
        [name=password]{
            width:350px;
            height:30px;
            border-radius: 05px;
            font-size: larger;
        }
        [name=para]{
            font-size: larger;
        }
        [name="enter"]{
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-color: #ead1d1;
            color : #401b0a;
            font-size: 21px;
            padding: 3px 8px 3px 8px;
            border-radius: 3px;
            border-color:#401b0a;
        }

    </style>
</head>
<body>
    <form action="pblpage32.php" method="post">
    <div class="container">
        <h1>LOGIN</h1>
        <p name="para">Enter the password</p>
        <input type="text" name="password" value="aditya">
        <button type="submit" name="enter">Submit</button>
    </div>
    </form>
</body>
</html>