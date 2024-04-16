<?php
// MySQL database connection settings
$servername = "localhost";
$username = "";
$password = "";
$dbname = "user";

// Create connection
$conn = new mysqli('localhost','root','','user');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $mobile_number = $_POST["mobile_number"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $connection_id = $_POST["connection_id"];

    // SQL query to update customer information
    $sql = "UPDATE customer SET mobile_number='$mobile_number', address='$address', email='$email' WHERE connection_id='$connection_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Customer information updated successfully";
    } else {
        echo "Error updating customer information: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Customer Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 5px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <header>
        <h1>Ganesh Cable Network</h1>
    </header>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="mobile_number">Mobile Number:</label>
        <input type="text" id="mobile_number" name="mobile_number"><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br><br>
        <input type="submit" value="Update Information">
        <a href="learn.html">Back to Home</a>
    </form>
    

</body>
</html>