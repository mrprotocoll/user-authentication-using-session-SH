<?php
    session_start();
    if (!isset($_SESSION['status']) or $_SESSION['status'] == "out"){
        $_SESSION["msg"] = "Login to Proceed";
        $_SESSION["err"] = true;
        header("Location:./");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="form">
        <h1>Dashboard</h1>
        <hr>
        <h3>Welcome! <?php echo @$_SESSION['name'] ?></h3>
        <p>Your information are stated below</p>
        <div class="out">
            <h1>Profile</h1>
            
            <p><span>Name: </span> <?php echo $_SESSION['name']?></p>
            <p><span>Email: </span> <?php echo $_SESSION['email']?></p>
            <p><span>Telephone: </span> <?php echo $_SESSION['phone']?></p>
            <p><span>Address: </span> <?php echo $_SESSION['address']?></p>
            <p><span>Password: </span> <?php echo $_SESSION['password']?></p>
            <a href="logout.php" class="submit">Logout</a>
        </div>
       
    </div>
</body>
</html>