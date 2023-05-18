<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="styles/profile.css">
</head>
<body>
<?php
            session_start();
            $user1 = $_SESSION['name'];  
            $db = mysqli_connect("localhost","root","","bloggers");
            $q = "select * from signup where email='$user1'";
            $a = mysqli_query($db,$q);
            ?>


<div class="card">
        <div class="card_background_img"></div>
        <div class="card_profile_img"></div>
        <div class="user_details">
        <?php while($row = mysqli_fetch_assoc($a)) { ?>
            <h3><?php echo $row["username"] ?></h3>
        </div>
        <div class="card_count">
            <div class="count">
                <div class="fans">
                    <h3>Email id:</h3>
                    <p><?php echo $row["email"] ?></p>
                </div>
                <div class="following"> 
                    <h3>Mobile no:</h3>
                    <p><?php echo $row["mobile"] ?></p>
                </div>
                <div class="post">
                    <h3>password:</h3>
                    <p><?php  echo $row["password"] ?></p>
                </div>
            </div>
             <?php } ?>
             <a href='home.php' id="btn">Home</a>
         <a href='logout.php' id="btn1">Logout</a>
        </div>

        </div>
    <div class="content">
        <?php
            $db = mysqli_connect("localhost","root","","bloggers");
            //$user = $_SESSION['name'];
            if(isset($_SESSION['name'])){
            $name = $_SESSION['name'];
            $db = mysqli_connect("localhost","root","","bloggers");
            $sql = "SELECT * FROM signup WHERE email='$name'";
            $a = mysqli_query($db,$sql);
            if(mysqli_num_rows($a) > 0){
                while($row = mysqli_fetch_assoc($a)){
                    $user = $row['username'];
                } 
            } else {
                echo "No user found!";
            }
        }
            $qu = "select * from blogs where username='ram'";
            $a = mysqli_query($db,$qu);
                while($row = mysqli_fetch_assoc($a)) {
                    echo "<div class='blogs'>";
                    echo "<div class='header'>";
                    echo '<img height="200" src="./images/' . $row["images"] . '">';
                    echo "<div class='details'>";
                    echo "<h1 class='mhead'>Posted by</h1><p class='d1'>".$row["username"]."</p>";
                    echo "<h1 class='mhead'>Title</h1><p class='d1'>".$row["title"]."</p>";
                    echo "<h1 class='mhead'>Description</h1><p class='d1'>".$row["desc"]."</p>";
                    echo "</div>";
                    echo "<div class='dbtn'>";
                    echo "<a class='fbtn' href='edit.php?id={$row['id']}'>Edit</a>";
                    echo "<a class='fbtn' href='delete.php?id={$row['id']}'>Delete</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    ?>
                    <?php
                    }
        ?>
  
    </div>
</body>
</html>