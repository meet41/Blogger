<!DOCTYPE html>
<html>
    <head>
        <title>Bloggers</title>
        <link rel="stylesheet" href="styles/index.css">
        <style>
      #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}

#i1{
  width: 70%;
  position: relative;
  margin: auto;
  height: 70%;
  border: 3px solid black;
  background-color: #53ff80;
  padding: 3em;
  margin-top: 15%;
  border-radius: 33px;
  box-shadow: 10px 11px 10px -1px rgba(0,0,0,0.65);

}


    </style>
    </head>

    <body>
        <?php
            // if(isset($_COOKIE["loggedInUser"])) {
            //     header("location:home.php");
            //     echo "Yeah, I remember you";
            // }
            // else {
            //     echo "Nope, I dont remember you.";
            // }
        ?>

<!-- <video autoplay muted loop id="myVideo"> -->
  <!-- <source src="drone.mp4" type="video/mp4"> -->
</video>

        <div id="i1">
        <h1>Welcome to Bloggers!</h1>
        <p>Welcome, to the world of Bloggers<br>Create your own Blogs and Explore more such Blogs!</p>
        <button type="button" onClick="document.location.href='login.php'">Log In</button>
        <button type="button" onClick="document.location.href='signup.php'">Sign Up </button></div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
    </body>
</html>