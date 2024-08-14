<?php

  session_start();
  $ip = $_SERVER['REMOTE_ADDR'];
  $password = "Dank420";
  $warning_ips = array('150.253.72.8', '2600:387:1:804::7','2607:fb90:d921:90f7:1b1e:4bb7:5fcd:592c');
  $blocked_ips = array('2600:387:15:2e10::c','150.253.72.8','2607:fb90:d921:90f7:1b1e:4bb7:5fcd:592c');
  
  
  if (in_array($ip, $blocked_ips)) {
    header("HTTP/1.0 403 Forbidden");
    exit;
}
  
  // Get the username entered by the user
  $username = $_POST["username"];

  // Get the IP of the user
  $ip_address = $_SERVER["REMOTE_ADDR"];

  // Get the password entered by the user
  $enteredPassword = $_POST["password"];

  // Set the log file name
  $log_file = "log.html";

  // Check if the entered password is correct
  if ($enteredPassword == $password) {
    // Start the session
    $_SESSION["loggedIn"] = true;
    
    $file = fopen($log_file, "a");

    // Write the user's details to the log file in a readable format
    date_default_timezone_set('America/Chicago');
    $date = date('m/d/Y h:i:s a', time());
    fwrite($file, "<hr><br>" . $date . " - " . $ip_address . "<br> Username: <b>" . $username . "</b> Access Password: <b>" . $enteredPassword . "</b>");

    // Close the log file
    fclose($file);
  
    
    // Redirect user to main.php
    header("Location: main.php");
    exit();
  } else {
    // Open the log file for writing
    echo '<p1>wrong password</p1>';
    $file = fopen($log_file, "a");

    // Write the user's details to the log file in a readable format
    $date = date('m/d/Y h:i:s a', time());
    fwrite($file, "<hr><br>" . $date . " - " . $ip_address . "<br> Username: <b>" . $username . "</b> Access Password: <b>" . $enteredPassword . "</b>");

    // Close the log file
    fclose($file);
  }
?>