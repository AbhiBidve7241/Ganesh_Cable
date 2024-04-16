<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Create connection
$conn = new mysqli('localhost','root','','user');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Initialize variables to hold connection ID and recharge amount
$connection_id = "";
$recharge_amount = "";
$selected_plan = "";
$errors = array();

// Fetch recharge plans from database
$plan_query = "SELECT * FROM recharge_plans";
$plan_result = $conn->query($plan_query);
$plans = array();
if ($plan_result->num_rows > 0) {
    while ($row = $plan_result->fetch_assoc()) {
        $plans[] = $row;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $connection_id = mysqli_real_escape_string($conn, $_POST['connection_id']);
    $recharge_amount = mysqli_real_escape_string($conn, $_POST['recharge_amount']);
    $selected_plan = mysqli_real_escape_string($conn, $_POST['selected_plan']);

    // Check if connection ID, recharge amount, and plan are not empty
    if (empty($connection_id)) {
        $errors[] = "Connection ID is required";
    }
    if (empty($recharge_amount)) {
        $errors[] = "Recharge amount is required";
    }
    if (empty($selected_plan)) {
        $errors[] = "Please select a recharge plan";
    }

    // If no errors, insert data into database
    if (empty($errors)) {
        $sql = "INSERT INTO recharge_table (connection_id, recharge_amount, plan_id) VALUES ('$connection_id', '$recharge_amount', '$selected_plan')";

        if ($conn->query($sql) === TRUE) {
            echo "Recharge record created successfully";
        } else {
            echo "Error: ". $sql. "<br>". $conn->error;
        }
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>

    <title>Recharge Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        p {
            color: red;
            margin-bottom: 10px;
        }
    </style>
    <script>
        function updateRechargeAmount() {
            var selectedPlan = document.getElementById("selected_plan").value;
            var rechargeAmountField = document.getElementById("recharge_amount");
            // Logic to set recharge amount based on selected plan
            switch (selectedPlan) {
                case "1":
                    rechargeAmountField.value = "130";
                    break;
                case "2":
                    rechargeAmountField.value = "270";
                    break;
                case "3":
                    rechargeAmountField.value = "330";
                    break;
                case "4":
                    rechargeAmountField.value = "370";
                    break;
                default:
                    rechargeAmountField.value = "";
            }
        }
    </script>
   
</head>
<body>
<div style="background-color: #000000;
        color: #fff;
        padding: 10px;
        text-align: center;">
            <h1>GANESH CABLE TV</h1>
        </div>
         
         <hr>
    <h2>Recharge Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
        } ?>
        <label for="connection_id">Connection ID:</label>
        <input type="text" id="connection_id" name="connection_id" value="<?php echo htmlspecialchars($connection_id); ?>"><br>
        <label for="selected_plan">Select Recharge Plan:</label>
        <select id="selected_plan" name="selected_plan" onchange="updateRechargeAmount()">
            <option value="">Select Plan</option>
            <option value="1">MAHARASHTRA FTA (price=130₹)</option>
            <option value="2">HW MH SUPREME VALUE HD (price=270₹)</option>
            <option value="3">HW MH MAHARASHTRA JUMBO HD (price=330₹)</option>
            <option value="4">HW MH ROYAL VALUE PLUS (price=370₹)</option>
        </select><br>
        <label for="recharge_amount">Recharge Amount:</label>
        <input type="text" id="recharge_amount" name="recharge_amount" readonly><br>
        <input type="submit" value="Submit">
        <a id="submit" href="learn.html">Home<a>
    </form>
</body>
</html>
