<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloggers | Home</title>
    <style>
        .navbar {
          overflow: hidden;
          border-radius: 16px;
    box-shadow: 9px 9px 18px -13px;
          background-color: #333;
          font-family: Arial, sans-serif;
        }
        .navbar a{
          float: left;
          display: block;
          color: #f2f2f2;
          text-align: center;
          padding: 10px 10px;
          text-decoration: none;
        }
        .navbar a:hover {
          background-color: #ddd;
          text-align: center;
          display: block;
          color: black;
        }
        .navbar .active {
          background-color: #4CAF50;
          color: white;
        }
        .navbar li{
            font-size:20px;
            list-style-type: none;
        }
        .navbar .logo {
          font-size: 25px;
          font-weight: bold;
        }
        .navbar #name {
          float: right;
          color: #f2f2f2;
          text-align: right;
          margin: 0;
          padding: 14px 16px;
        }
        .blogs {
          background-color: #fff;
          border: 1px solid #ddd;
          border-radius: 5px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
          margin-bottom: 20px;
          overflow: hidden;
          box-sizing: border-box;
        }

        .header {
          display: flex;
          align-items: center;
        }

        .header img {
          width: 200px;
          height: 150px;
          object-fit: cover;
          margin-right: 20px;
        }

        .details {
          width: 100%;
          padding: 20px;
          box-sizing: border-box;
        }

        .details p {
          margin: 0;
          line-height: 1.4;
        }

        .details .username {
          font-weight: bold;
          color: #4CAF50;
          font-size: 20px;
          margin-bottom: 5px;
        }

        .details .title {
          font-weight: bold;
          font-size: 18px;
          margin-bottom: 10px;
        }

        .details .description {
          font-size: 16px;
        }


        body{
          background-color: #ccc8c8;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <li><a href="#" class="logo">Bloggers</a></li>
        <a href="home.php" class="active">Home</a>
        <a href="createblog.php" >Create Blog</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Log Out</a>
        <p id="name"><?php session_start();
        if(isset($_SESSION['name'])){
        $name = $_SESSION['name'];
        $db = mysqli_connect("localhost","root","","bloggers");
        $sql = "SELECT * FROM signup WHERE email='$name'";
        $a = mysqli_query($db,$sql);
        if(mysqli_num_rows($a) > 0){
            while($row = mysqli_fetch_assoc($a)){
                echo $row['username'];
                $user = $row['username'];
            }
        } else {
            echo "No user found!";
        }
        } else {
            echo "Please log in to view this page!";
            header("location:login.php");
        }
        ?></p>
    </div><br>
    <div class="content">
        <!--  -->
        <div class="blogs">
            <?php
                $db = mysqli_connect("localhost","root","","Bloggers");
                $q = "select * from blogs order by id desc";
                $a = mysqli_query($db,$q);
                while($row = mysqli_fetch_assoc($a)) {
                    echo "<div class='blogs'>";
                    echo "<div class='header'>";
                    echo '<img height="200" src="./images/' . $row["images"] . '">';
                    echo "<div class='details'>";
                    echo "<p class='username'>".$row["username"]."</p>";
                    echo "<p class='title'>".$row["title"]."</p>";
                    echo "<p class='description'>".$row["desc"]."</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</body>
<?php
    // require('');
    //     if(isset($_SESSION['name'])){
    //     // echo "Welcome, ".$_SESSION['name'];
    //     $db = mysqli_connect("localhost","root","","Bloggers");
    //     $q = "select * from signup order by id desc";
    //     $a = mysqli_query($db,$q);
    //     $row = mysqli_fetch_assoc($a);
    //     if($row['email'] == $_SESSION['name'])
    //     {
    //         echo "Welcome, ".$row['username'];
    //         $user = $row['username'];
    //     }
    // }

    function allpost(){
    $db = mysqli_connect("localhost","root","","Bloggers");
    $q = "select * from blogs order by id desc";
    $a = mysqli_query($db,$q);
    $data = array();
    while($b=mysqli_fetch_assoc($a)){
        $data[]=$b;
    }
    return $data;
    }

    // if (mysqli_num_rows($result) > 0) {
    //     // Output data of each row
    //     while($row = mysqli_fetch_assoc($result)) {
    //         echo "<tr>";
    //         echo "<td>" . $row["id"] . "</td>";
    //         echo "<td>" . $row["name"] . "</td>";
    //         echo "<td>" . $row["email"] . "</td>";
    //         echo "<td>" . $row["phone"] . "</td>";
    //         echo "</tr>";
    //     }
    // }
?>


<div class="navbar">
        <h1 style="text-align: center; color:yellow;font-size: 30px;">Copyright 2023</h1>
    </div><br>
</html>