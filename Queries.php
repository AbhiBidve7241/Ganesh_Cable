<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user"; // Change this to your database name

// Create connection
$conn = new mysqli('localhost','root', '', 'user');

// Check connection
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted       
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $query = $_POST['query'];

    // Prepare and execute SQL statement to insert data into customer_queries table
    $sql = "INSERT INTO customer_queries (name, email, query) VALUES ('$name', '$email', '$query')";

    if ($conn->query($sql) === TRUE) {
        echo "Query submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Query Form</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }
    
    .container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        display: block;
        font-weight: bold;
    }
    
    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    textarea {
        resize: vertical;
        min-height: 100px;
    }
    
    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    
    button:hover {
        background-color: #45a049;
    }
    </style>
</head>
<body>
<div style="background-color: #000000;
        color: #fff;
        padding: 10px;
        text-align: center;">
            <h1>GANESH CABLE TV</h1>
        </div>
         
         <hr>
    <div class="container">
        <h2>Customer Query Form</h2>
        <form action="learn.html" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="query">Query:</label>
                <textarea id="query" name="query" rows="5" required></textarea>
            </div>
            <button type="submit">Submit Query</button>
            
        </form>
        <br><hr>
            <button> <a href="learn.html">Back</button>
    </div>
</body>
</html>
