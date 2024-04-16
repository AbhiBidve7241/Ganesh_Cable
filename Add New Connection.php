<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user"; // Change this to your database name

// Create connection
$conn = new mysqli('localhost', 'root', '', 'user');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['Name'];
    $mobileNumber = $_POST['MobileNumber'];
    $address = $_POST['Address'];

    // Prepare and execute SQL statement to insert data into Connection_requests table
    $sql = "INSERT INTO Connection_requests (Name, MobileNumber, Address) VALUES ('$name', '$mobileNumber', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add New Connection</title>
        <style>
            
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
         
        }
        .form {
            
    
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   
    align: centre;
   
}

     
        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        } button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    
        </style>
        <hr>
    </head>
    <body>  
    <div style="background-color: #000000;
        color: #fff;
        padding: 10px;
        text-align: center;">
            <h1>GANESH CABLE TV</h1>
        </div>
         
         <hr>
         
        <h2>Add New Connection</h2>
        <hr>
        <form action="add_connection.php" method="post">

        
            <div class="form-group">
                <label for="Name"></label>
                <input type="text" id="Name" name="Name" placeholder="Name" required>
            </div><br><br>
            <div class="form-group">
                <label for="number"></label>
                <input type="text" id="number" name="Mobile Number" placeholder="Mobile number" required>
            </div><br><br>
            <div class="form-group">
                <label for="address"></label>
                <input type="text" id="address" name="Address" placeholder="Enter Address" required>
            </div><br><br>
<button>Submit details</button> 
<button> <a href="learn.html" >Go to Home</a> </button>

        </form>
<hr>
<div>
    

</div>
<footer>
    <div >
        We will Contact you for additional information.
        Thank you!
        
    </div>
</footer>
</body>
    </html>