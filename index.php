<?php
    session_start();
    $submitted = false;
    if(isset($_POST['submit'])){
        $submitted = true;
        $email = $_POST['email'];
        $pass = $_POST['password'];
        unset($_SESSION['err']);
        if(empty($email) or empty($pass)){
            $msg = "All Fields are Required";
        }else if(isset($_SESSION['email']) and isset($_SESSION['password'])){
            $s_email = $_SESSION['email'];
            $s_pass = $_SESSION['password'];
            if(!empty($s_email) and !empty($s_pass)){
                if($email == $s_email and $pass == $s_pass){
                    $_SESSION['status'] = "in";
                    header("Location:dashboard.php");
                }else{
                    $msg = "Invalid Email/Password";
                }
            }
        }else{
            $msg = "No Record found, Kindly Register";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form">
        <h1>Login</h1>
        <p>Login with your email and password</p>

        <?php if($submitted){ ?>
            <div class="out">
                <h4 class="text-red"><?php echo @$msg ?></h4>
            </div>
        <?php } ?>
        <?php if(isset($_SESSION['err'])){ ?>
            <div class="out">
                <h4 class="text-red"><?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : "" ?></h4>
            </div>
        <?php } ?>

        <form action="index.php" method="post">
            <input type="email" name="email" placeholder="Enter Email Address" class="input">
            <input type="password" name="password" placeholder="Enter Password" class="input">
            <input type="submit" name="submit" class="submit" value="Submit">
            <p>Kindly Register if you dont have an account</p>
            <a href="register.php" class="">Register</a>
        </form>
    </div>
</body>
</html>