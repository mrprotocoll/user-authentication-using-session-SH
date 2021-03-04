<?php
    session_start();
    $submitted = false;
    if(isset($_POST['submit'])){
        $submitted = true;
        $email = $_POST['email'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $empty = false;
        foreach ($_POST as $key => $val) {
            if (empty($val)) {
               $_SESSION['error'] = "all fields are required";
               $empty = true;
            } 
        }
        if($email == @$_SESSION['email']){
            $msg = "Email Already Exist, Proceed to Login";
        }else if($empty){
            $msg = "All Fieds are Required";
        }else{
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
            $_SESSION['password'] = $password;
            $msg = "Registration Successful";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <div class="form">
        <h1>Registration Form</h1>

        <?php if($submitted){ ?>
            <div class="out">
                <h4><?php echo @$msg ?></h4>
                <a href="./" class="next">Login</a>
            </div>
        <?php } ?>

        <form action="register.php" method="post">
            <input type="text" required name="name" placeholder="Enter Fullname" class="input">
            <input type="email" required name="email" placeholder="Enter Email Address" class="input">
            <input type="text" required name="phone" placeholder="Enter Telephone Number" class="input">
            <input type="text" required name="address" placeholder="Enter Address" class="input">
            <input type="password" required name="password" placeholder="Enter Password" class="input">
            <input type="submit" name="submit" class="submit" value="Register">
        </form>
    </div>
</body>
</html>
