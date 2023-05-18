<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Bloggers | Login</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h1>Welcome to Bloggers World!</h1><br>
        <div class="cont">
          Email : 
            <input type="email" placeholder="abc@email.com" max-length="" name="email" id="" required><br>
          Password : 
            <input type="password" name="pass" placeholder="Enter Password" id="" required><br>
            <input type="checkbox" name="remember" id=""> Remember Me<br>
            <input type="submit" value="Login" name="submit"><br>
            <!-- <input type="button" value="Continue with Google"> -->
            <a href="signup.php">Register Here!</a>
        </div>
    </form>
    <?php
        // if(isset($_POST['Login']))
        // {
            //     // echo "Session Stored<br>!";
            //     // echo "<a href=''></a>"
            //     // header("location:home.php");
            // }
            // if(isset($_SESSION['name']))
            // {
                //     // header("location:home.php");
                // }
                // $q = "Create Database Bloggers";
                // $b = "create table signup(id int(10),username varchar(50),email varchar(50),password varchar(20),mobile varchar(10))";
                // $a = "create table blogs(username varchar(50) references signup(username),title varchar(50),`desc` varchar(150),images varchar(100))";
                // $a = "create table blogs(username VARCHAR(50) REFERENCES signup(username),title VARCHAR(50),desc VARCHAR(150),images VARCHAR(100))";
            session_start();
                if(isset($_POST['submit'])){
            $_SESSION['name'] = $_POST['email'];
            $con = mysqli_connect("localhost","root","","bloggers");
        
        $email = $_POST['email'];
        $password = $_POST['pass'];
        // $hash = password_hash($password, PASSWORD_BCRYPT);

        // hashing the password is left!
        // $q = "select * from signup where email='$email' and password='$password'";
        // $stored_hash = $row['pass'];
        // if (password_verify($password, $stored_hash)) {
            // Password is correct
        
        $res = mysqli_query($con,"select * from signup where email='$email' and password='$password'");
        if(mysqli_num_rows($res) > 0)
        {
            // User exists, login successful
            echo "<script>alert('You already have an account!');</script>";
            header("location:home.php");
        }
        else
        {
            // User does not exist, login failed
            echo "<script>alert('Please SignUp First to Login!');</script>";
            header("location:signup.php");
        }
        $remember = isset($_POST['remember']);
            if (isset($_POST['email'])&&isset($_POST['pass'])){ 
                $username = $_POST['email'];
                $password = $_POST['pass'];    
            if ($remember) {
                // Set a cookie that expires in 30 days
                setcookie('username', $username, time() + (30 * 24 * 60 * 60));
                setcookie('password', $password, time() + (30 * 24 * 60 * 60));
                echo "<script>alert('Remember me is clicked!');</script>";
                header('location: home.php');
              }
            //   echo "<script>alert('Remember me is clicked!');</script>";
              // Redirect the user to the home page
              exit;}
        // }
        // else {
        //     // Password is incorrect
        // }        
        if(isset($con))
        {
            // echo "Connect to Mysql";
        }
        else{
            echo "Couldn't connect ".mysqli_error($con);
        }
        // if(mysqli_query($con,$q))
        // {
            //     // echo "<br>Data Inserted!";
        //     echo "<script>alert('Hii');</script>";
        // }
        mysqli_close($con);
    }
    ?>
</body>
</html>