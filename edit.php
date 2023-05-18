<?php
    $con = mysqli_connect("localhost","root","","bloggers") or die('cannot connect'.mysqli_error($con));
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    $a = "select * from blogs where id='$id'";
    $res = mysqli_query($con,$a);
    $row = mysqli_fetch_assoc($res);
    ?>
<html>
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
            padding: 14px 16px;
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
            font-size:24px;
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

        .footer{
            background-color: #918184;
    padding: 1px;
    border-radius: 16px;
            margin: auto;
    position: relative;
    align-items: center;
    top: 53%;
    box-shadow: 9px 9px 18px -13px;
        }
        #dd1{
            width: 100%;
    height: 100%;
    margin: 149px 0px -232px 0px;
    text-align: center;
        }

        #t1{
            background-color: #00f7ff;
    padding: 19px;
    width: 58%;
    margin: 22px -39px 15px 13px;
    border: 2px solid;
    border-radius: 13px;
}
        

        #btn{
            background-color: #e4e4e4;
    padding: 14px;
    margin: 30px -66px 12px 12px;
    border: 2px solid;
    border-radius: 12px;
    font-size: 17px;
    font-family: monospace;
        }

        #btn:hover{
            background-color: #AAFF00;
            cursor: pointer;
        }

        form{
            display: inline;
    font-family: math;
    font-size: 19px;
        }

        body{
            background-color: #e4e4e4;
        }

        #t4{
            background-color: #00f7ff;
    padding: 19px;
    width: 58%;
    margin: 22px 19px 15px 13px;
    border: 2px solid;
    border-radius: 13px;
        }
        </style>
    </head>
    <body>
    <!-- <h1>Home Page</h1> -->
    <div class="navbar">
    <!-- <img src="blog.jpg" style="width: 40px;height:40px;border-radius:20%;"></img> -->
        <li><a href="#" class="logo">Bloggers</a></li>
        <a href="home.php" class="active">Home</a>
        <a href="createblog.php" >Create Blog</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Log Out</a>
    </div><br>
    <div id="dd1">
        <form action="" method="post">
            Enter Blog Title :
            <input type="text" name="title" id="t1" max-length="50" value="<?php echo $row["title"]; ?>"><br>
            <!-- <input type="text" name="desc" max-length="200" value=""><br> -->
            Enter Blog Description : 
            <textarea name="desc" id="t4" cols="15" rows="8"><?php echo $row["desc"]; ?></textarea><br>
            <input type="submit" value="UPDATE" id="btn" name="update">
        </form>
        </div>
        <?php
            if(isset($_POST['update'])){
                // echo "Update<br>";
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $q = "update blogs set title='$title',`desc`='$desc' where id='$id'";
                if(mysqli_query($con,$q)){
                    // echo "Updated!";
                    header("location:profile.php");
                }
                else {
                    echo "Error updating record: " . mysqli_error($con);
                }
            }
        }
            mysqli_close($con);
        ?>


<footer class="footer">
        <h1 style="text-align: center; color:yellow;font-size: 30px;">Copyright 2023</h1>
    </footer><br>
    </body>
</html>