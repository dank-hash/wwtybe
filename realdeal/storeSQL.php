<?php
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$password = "Dank420";
$warning_ips = array('150.253.72.5', '2600:387:1:804::7');
$blocked_ips = array('150.253.7.85');

if (in_array($ip, $blocked_ips)) {
    header("HTTP/1.0 403 Forbidden");
    exit;
}

// Get the username entered by the user
$username = $_POST["username"];

// Get the IP address of the user
$ip_address = $_SERVER["REMOTE_ADDR"];

// Get the password entered by the user
$enteredPassword = $_POST["password"];

// Set the database credentials
$servername = "localhost";
$dbname = "id20980495_walterwhitevibes";
$usernameDB = "id20980495_walterwhitevibes";
$passwordDB = "@c1dr0ckS!";

try {
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernameDB, $passwordDB);
    
    // Set the error mode to throw exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if the username already exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE Username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        // Username already exists, update the user details
        $stmt = $conn->prepare("UPDATE users SET Password = :password, Granted = 'YES', IP = CONCAT(IP, ', ', :ip), Visited = Visited + 1 WHERE Username = :username");
    } else {
        // Username does not exist, insert a new user
        $stmt = $conn->prepare("INSERT INTO users (Username, Password, Granted, IP, Visited) VALUES (:username, :password, 'YES', :ip, 1)");
    }
    
    // Bind the parameters to the prepared statement
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $enteredPassword);
    $stmt->bindParam(':ip', $ip_address);
    
    // Execute the statement
    $stmt->execute();
    
    // Close the database connection
    $conn = null;
    
    // Start the session
    $_SESSION["loggedIn"] = true;
    
    // Redirect the user to main.php
    header("Location: main.php");
    exit();
} catch (PDOException $e) {
    // Handle any errors that occur
    echo "Error: " . $e->getMessage();
}
?>