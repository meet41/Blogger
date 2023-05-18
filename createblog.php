<html>
<body>
    <style>
        form {
          margin: 14% auto;
    max-width: 600px;
    font-size: 17px;
    padding: 20px;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    border-radius: 21px;
    box-shadow: black 10px 15px 17px -12px;
    font-family: cursive;
}

body{
  background-color:#dfdfdf;
}


h2 {
  text-align: center;
  font-size: 2em;
  margin-top: 0;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

a {
  color: #0066ff;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

    </style>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <h2>Let's Add New Blog!</h2><br>
                <!-- Display user name -->
        <!-- <select name="uname" id=""><option name="username" placeholder="username">Meet</option></select><br> -->
        User Name : <p name="name"><?php session_start(); 
        if(isset($_SESSION['name'])){
          $name = $_SESSION['name'];
          $db = mysqli_connect("localhost","root","","bloggers");
          $sql = "SELECT * FROM signup WHERE email='$name'";
          $a = mysqli_query($db,$sql);
          if(mysqli_num_rows($a) > 0){
              while($row = mysqli_fetch_assoc($a)){
                  echo "Welcome " . $row['username'];
                  $user = $row['username'];
              }
          } else {
              echo "No user found!";
          }
          } else {
              echo "Please log in to view this page!";
          }
        ?></p>
        Enter Blog Title : 
        <input type="text" name="title" id="" required maxlength="50" placeholder="Enter Title"><br>
        Enter Blog Description : 
        <textarea name="desc" id="" cols="30" rows="10" max-length="200" required placeholder="Enter Description"></textarea><br>
        Select Images : 
        <input type="file" name="file" accept="images/*" multiple><br>
        <input type="submit" value="CREATE" name="create"><br>
        <a href='home.php'>Home</a><br>
        <a href='logout.php'>Log out</a>
    </form>
    <?php
        // session_start();
        // if(isset($_SESSION['name']))
        // {
        //     $_POST['name']=$_SESSION['name'];
        // }
        if(isset($_POST['create']))
        {
            // header("location:home.php");
            $con = mysqli_connect("localhost","root","","bloggers");
            $name = $_SESSION['name'];
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $file = $_FILES['file']['name'];
            $image = $_FILES['file']['tmp_name'];
            $folder = "./images/".$file;
            $a = "insert into blogs(username,title,`desc`,images) values('$name','$title','$desc','$file')";
            if(mysqli_query($con,$a))
            {
                echo "<script>alert('Data inserted!');</script>";
            }
            if (move_uploaded_file($image, $folder)) {
              echo "<script>alert('Image uploaded successfully!');</script>";
            }
            else {
              echo "<script>alert('Failed to upload image!');</script>";
            }
            header("location:home.php");
        }
            // $_POST['name'] = $_SESSION['name'];
            // need to expand size for data storing in database!
        // $a = "create table blogs(username varchar(50),title varchar(50),desc varchar(150),images )"
        // $b = "insert into blogs values('$_POST['name'],$_POST['title'],$_POST['desc'],$_POST['file']')";
    ?>
</body>
</html>