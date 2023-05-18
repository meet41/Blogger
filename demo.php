<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog User Profile</title>
    <link rel="stylesheet" href="styles/profile.css">
</head>
<body>




  <header>
    <h1>Blog User Profile</h1>
  </header>
  <main>
    <section class="user-profile">
      <div class="user-details">
        <img src="https://th.bing.com/th?q=Best+Avatar+Profile+Icon&w=120&h=120&c=1&rs=1&qlt=90&cb=1&dpr=1.3&pid=InlineBlock&mkt=en-IN&cc=IN&setlang=en&adlt=moderate&t=1&mw=247" alt="Profile Picture">

        <?php
            session_start();
            $user1 = $_SESSION['name'];
            $db = mysqli_connect("localhost","root","","bloggers");
            $q = "select * from signup where email='$user1'";
            $a = mysqli_query($db,$q);
            while($row = mysqli_fetch_assoc($a)) {
            echo "<h2>"John Doe"</h2>";
        echo "<h4>". $row["email"] ."</h4>";
        echo "<h4>"Mobile number"</h4>";
        ech "<h4>"Password"</h4>";
    }

?>
        

      </div>
      <div class="user-bio">
        <h3>About Me</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod elit sit amet justo blandit sagittis. Donec eu velit magna. Morbi quis sem eros. Donec vitae faucibus enim. Fusce eget ligula nec turpis tincidunt luctus vel non ipsum. Integer non sapien dolor. Sed vel fermentum lectus.</p>
      </div>
    </section>




    <!-- <section class="user-posts">
      <h3>Recent Posts</h3>
      <ul class="post-list">
        <li>
          <h4>Post Title</h4>
          <p class="post-date">April 20, 2023</p>
          <p class="post-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod elit sit amet justo blandit sagittis.</p>
        </li>
        <li>
          <h4>Post Title</h4>
          <p class="post-date">April 18, 2023</p>
          <p class="post-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod elit sit amet justo blandit sagittis.</p>
        </li>
        <li>
          <h4>Post Title</h4>
          <p class="post-date">April 16, 2023</p>
          <p class="post-excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod elit sit amet justo blandit sagittis.</p>
        </li>
      </ul>
    </section>
  </main> -->


</body>
</html>