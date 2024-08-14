<?php
  session_start();
  
  // Check if the user is logged in
  if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true) {
    // User is not logged in, redirect to index.php
    header("Location: index.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main Page</title>
  </head>
  <body>
      <style>
          .frog {
              height: 100vh;
              width: 100vh;
          }
      </style>
    <center>
      <h1>Welcome to the Main Page</h1>
      <iframe class="frog" src="https://docs.google.com/document/d/10bpoMyZK3ZwoFK_MeWewmo5mt_FRGDFMj4Irh5SlC4s"></iframe>
    </center>
  </body>
</html>