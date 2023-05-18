<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/signup.css">
    <title>Bloggers | Sign Up</title>
</head>
<body>
    <div id="d1">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h2>Welcome, To Bloggers World!</h2><br>
        Enter Your Name : 
        <input type="text" name="name" id=""><br>
        Enter Your Email : 
        <input type="email" name="email" id=""><br>
        Enter Password : 
        <input type="password" name="pass" id=""><br>
        Enter Mobile No.:
        <input type="text" name="mobile" id=""><br>
        <input type="submit" name="submit" value="Submit"><br>
        <a href="login.php">Already,have an Account!</a>
    </form>
    </div>
    <?php
        session_start();
        if(isset($_POST['submit'])){
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['pass'] = $_POST['pass'];
            $_SESSION['mobile'] = $_POST['mobile'];
            $con = mysqli_connect("localhost","root","","bloggers");
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['pass'];
            // $hash = password_hash($password, PASSWORD_BCRYPT);
            $mobile = $_POST['mobile'];
            $q = "insert into signup(username,email,password,mobile) values('$name','$email','$password','$mobile')";
            // $q = "ALTER TABLE signup ADD COLUMN id INT NOT NULL AUTO_INCREMENT PRIMARY KEY";
            if(isset($con))
            {
                // echo "Connect to Mysql";
            }
            else{
                echo "Couldn't connect ".mysqli_error($con);
            }
            if(mysqli_query($con,$q))
            {
                // echo "<br>Data Inserted!";
                echo "<script>alert('Hii Data Inserted Successfully!');</script>";
            }
            mysqli_close($con);
            // header("location:login.php");
    }
    ?>
</body>
</html>