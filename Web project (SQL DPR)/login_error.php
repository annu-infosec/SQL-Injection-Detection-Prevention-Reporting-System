<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f9;
    margin: 0;
    margin: 0;
    font-family: Arial, sans-serif;
    color: #fff;
}

div.login-container {
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
    color: red;
}
.redirect-button {
    margin-top: 20px;
    height: 25px;
    width: 65px;
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 7px;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.redirect-button:hover {
    background-color: blue;
}

</style>
<div>

<?php
// Start the session to handle redirection after login
session_start();

// Database connection parameters
$host = 'localhost'; 
$dbname = 'Web project (SQL DPR)';
$username = 'root'; 
$password = ''; 
$charstring = [ "'", "select", "and", "or", "1=1", "--" ];
$malicious_user = "";
$malicious_pass = "";
$secure = true;

// Create a connection to the MySQL database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if POST data is received
//isset return true is not null
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Retrieve and escape the input values to prevent XSS and other issues

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    
    for ($j = 0; $j < count($charstring); $j++)
        {
            if (strpos($username, $charstring[$j]) !== false) {
                $malicious_user = $malicious_user . $charstring[$j] . ", ";
            }

        }

    for ($j = 0; $j < count($charstring); $j++)
        {
            if (strpos($password, $charstring[$j]) !== false) {
                $malicious_pass = $malicious_pass . $charstring[$j] . ", ";          
            }
                        
        }


    if ((strlen($malicious_user) != 0) || (strlen($malicious_pass) != 0))  
        {   
            $secure = false;

            ?> <div class="login-container"> <?php echo "Malicious activity detected";

            echo "<pre>";
            print_r($malicious_user);
            print_r("\n");
            print_r($malicious_pass);
            echo "</pre>";

            shell_exec("python report.py " . escapeshellarg($malicious_user) . " " . escapeshellarg($malicious_pass));

                
        }

    if ($secure == true)
        {
            // Construct the SQL query to check for matching username and password
            $sql = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if the query was successful and if a user was found
            if ($result && mysqli_num_rows($result) > 0) {
                // User found, login successful, redirect to the next page
                $_SESSION['username'] = $username; // Store the username in session
                header("Location: admin_panel.php"); // Redirect to the next page (e.g., welcome.php)
                exit();
            } else {
                // Invalid credentials, show an error
                ?> <div class="login-container"> <?php echo "Error: Invalid username or password. Please re-enter !!"; 
                                                 ?> 
                                                 <a href="login.php" class="redirect-button">Re-enter</a>
                                                 </div>
        
                <?php
            }

            // Free the result set
            mysqli_free_result($result);
        }
        
} else {
    // If the username or password is not set, show an error
    echo "Error: Please enter both username and password.";
}

// Close the database connection
mysqli_close($conn);
?>

</div>
</body>
</html>
